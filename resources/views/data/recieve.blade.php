<x-app-layout>
    <div class="inline-flex">
        <x-navigation.nav-link :url="URL('recieve')">
            Unit List
        </x-navigation.nav-link>
        <x-navigation.nav-link :url="URL('batches')">
            Batches
        </x-navigation.nav-link>
    </div>
    <div class="p-2">
        <form action="search" method="post">
            @csrf
            <x-search-bar />
        </form>
    </div>
	<div class="py-1">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-3 py-3">

                    </th>
                    <th scope="col" class="px-3 py-3">
                        Unit ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Vehicle Identity No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Engine No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CS No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Model Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Vehicle Stock Yard
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (!is_null($data))
                <form action="{{URL('batchingUnit')}}" method="POST" >
                    @csrf
                    <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Select</button>
                    @foreach($data as $tableRow)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            @if (!$tableRow->status)
                                <th scope="row" class="flex items-center px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if (!$tableRow->batch)
                                        <input id="default-checkbox" type="checkbox" name="selected-{{$tableRow->id}}" value="{{$tableRow->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </th>
                                    @endif
                                <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$tableRow->id}}
                                </th>
                                <td class="px-6 py-4">
                                {{$tableRow->vehicleidno}}
                                </td>
                                <td class="px-6 py-4">
                                {{$tableRow->engineno}}
                                </td>
                                <td class="px-6 py-4">
                                {{$tableRow->csno}}
                                </td>
                                <td class="px-6 py-4">
                                {{$tableRow->modeldescription}}
                                </td>
                                <td class="px-6 py-4">
                                {{$tableRow->vehiclestockyard}}
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </form>
                @else
                    table are empty.......
                @endif
            </tbody>
        </table>
        <div id="config-button" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Configuration
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        <div class="py-2">
            @if (count($data)>1)
                {{$data->links('pagination::tailwind')}}
            @endif
        </div>


	</div>
    <script>

    <script/>

</x-app-layout>
