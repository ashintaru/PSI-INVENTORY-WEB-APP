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
        <form action="{{URL("searchUnitList")}}" method="post">
            @csrf
            <x-search-bar />
        </form>
    </div>
    <div class="p-2">
        <form class="flex gap-4" action="{{URL('filter-recievedata')}}" method="POST">
            @csrf
            <div date-rangepicker class="flex items-center">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                        <input
                         @if ($start) value="{{$start}}"@endif
                         name="start"  type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                </div>
                    <span class="mx-4 text-gray-500">to</span>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                       <input
                        @if ($end) value="{{$end}}"@endif
                        name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                 </div>
            </div>
            {{-- <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                    </svg>
                </div>
                <select name="action" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="1" @if ($process == 1)
                        selected
                    @endif  >inventory</option>
                    <option value="2" @if ($process == 2)
                    selected
                @endif>Invoice</option>
                    <option value="3" @if ($process == 3)
                    selected
                @endif>Releasing</option>
                </select>
            </div> --}}
            <button name="process" value="Filter" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" >Filter</button>
            <button name="process" value="Reset" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Reset</button>
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
