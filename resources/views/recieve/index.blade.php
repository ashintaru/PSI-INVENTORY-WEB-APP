<x-app-layout>
    <x-navigation.nav-link :url="URL('recieve')">
        Recieve
    </x-navigation.nav-link>
    <div class="p-2">
        <form action="{{URL("searchRecieveUnit")}}" method="post">
            @csrf
            <x-search-bar />
        </form>
    </div>
    <x-alert-error></x-alert-error>
    <x-alert-success></x-alert-success>

    <div class="py-1">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-3 py-3">
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Vehicle Identity No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Blockings.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Recieved.
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
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (!is_null($data))
                @foreach($data as $tableRow)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="text-center">
                            @if ($tableRow->car->blocking && $tableRow->car->recieveBy)
                                <form action="{{URL('default-approve/'.$tableRow->vehicleidno)}}" method="POST" class="space-y-2">
                                    @csrf
                                    <div class="flex-col space-y-3">
                                        <button type="submit" name="approved" value="2" class="inline-flex items-center ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            @else
                                ...
                            @endif
                        </th>
                        <td class="px-6 py-4">
                                {{$tableRow->vehicleidno}}
                        </td>
                        <td class="px-6 py-4">
                            @if ($tableRow->car->blocking)
                                {{$tableRow->car->blocking->bloackname}}
                            @else
                                null..
                            @endif
                        </td>
                        <td class="px-6 py-4">
                           @if ($tableRow->car->recieveBy)
                                {{$tableRow->car->recieveBy}}
                           @else
                               null...
                           @endif
                        </td>
                        <td class="px-6 py-4">
                        {{$tableRow->car->engineno}}
                        </td>
                        <td class="px-6 py-4">
                        {{$tableRow->car->csno}}
                        </td>
                        <td class="px-6 py-4">
                        {{$tableRow->car->modeldescription}}
                        </td>
                        <td class="px-6 py-4">
                        {{$tableRow->car->vehiclestockyard}}
                        </td>
                        <td class="px-6 py-4 flex ">
                            <a href="{{URL('view-recieve-unit/'.$tableRow->vehicleidno)}}"
                                data-tooltip-target="config-button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                    <path fill-rule="evenodd" d="M14.5 10a4.5 4.5 0 004.284-5.882c-.105-.324-.51-.391-.752-.15L15.34 6.66a.454.454 0 01-.493.11 3.01 3.01 0 01-1.618-1.616.455.455 0 01.11-.494l2.694-2.692c.24-.241.174-.647-.15-.752a4.5 4.5 0 00-5.873 4.575c.055.873-.128 1.808-.8 2.368l-7.23 6.024a2.724 2.724 0 103.837 3.837l6.024-7.23c.56-.672 1.495-.855 2.368-.8.096.007.193.01.291.01zM5 16a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd" />
                                    <path d="M14.5 11.5c.173 0 .345-.007.514-.022l3.754 3.754a2.5 2.5 0 01-3.536 3.536l-4.41-4.41 2.172-2.607c.052-.063.147-.138.342-.196.202-.06.469-.087.777-.067.128.008.257.012.387.012zM6 4.586l2.33 2.33a.452.452 0 01-.08.09L6.8 8.214 4.586 6H3.309a.5.5 0 01-.447-.276l-1.7-3.402a.5.5 0 01.093-.577l.49-.49a.5.5 0 01.577-.094l3.402 1.7A.5.5 0 016 3.31v1.277z" />
                                </svg>
                            </a>
                        </td>
                </tr>
            @endforeach
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



</x-app-layout>
