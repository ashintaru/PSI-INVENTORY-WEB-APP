<x-app-layout>
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{url('invoice')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
                        <path d="M3 3.5A1.5 1.5 0 014.5 2h6.879a1.5 1.5 0 011.06.44l4.122 4.12A1.5 1.5 0 0117 7.622V16.5a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 013 16.5v-13z" />
                        </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap text-base font-extrabold">Invoice</span>
                </a>
            </li>
        </ol>
    </nav>
    <div class="p-2">
        <form action="{{URL('searchinventory')}}" method="post">
            @csrf
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="default-search" name="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Vehicle Identity No." required>
                <button type="submit" class="text-white absolute right-1.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
    </div>
    {{-- <ul class="flex">
        @if ($cars)
            @foreach ($cars as $car  )
                <li>
                    <a href="{{url('invoice')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
                            <path d="M3 3.5A1.5 1.5 0 014.5 2h6.879a1.5 1.5 0 011.06.44l4.122 4.12A1.5 1.5 0 0117 7.622V16.5a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 013 16.5v-13z" />
                        </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap text-xs font-mono">{{$car->modeldescription}}</span>
                    <span class="inline-flex items-center justify-center w-1 h-1 p-2 ml-2 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">{{$car->model_count}}</span>
                    </a>
                </li>
            @endforeach
        @else
        .....
        @endif
    </ul> --}}
    <div class="py-1">
        @if ($invoices)
            {{-- @include('invoice.partials.invoicetable',['invoices'=>$invoices]) --}}
            <section>
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
                        @if (!is_null($invoices))
                        @foreach($invoices as $tableRow)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="flex items-center px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if ($tableRow->blocking && $tableRow->receiveBy && $tableRow->receiveBy != "empty" )
                                        <form action="{{URL('default-approve/'.$tableRow->vehicleidno)}}" method="POST" >
                                            @csrf
                                            <button type="submit" class="flex items-center text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" />
                                                </svg>
                                            </button>
                                        </form>
                                    @else
                                        ...
                                    @endif
                                </th>
                                <td class="px-6 py-4">
                                    {{$tableRow->vehicleidno}}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($tableRow->blocking)
                                        {{$tableRow->blocking->bloackname}}
                                    @else
                                        Nothing..
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{$tableRow->receiveBy}}
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
                                <td class="px-6 py-4 flex ">
                                    <a href="{{URL('invoice-get/'.$tableRow->vehicleidno)}}"
                                        invoices-tooltip-target="config-button">
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
                    <div class="tooltip-arrow" invoices-popper-arrow></div>
                </div>
             </section>
        @else
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                NO invoices FOUND.....
            </div>
        @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @if ($invoices)
            @if (count($invoices)>1)
                {{$invoices->links()}}
            @endif
        @endif
        </div>
    </div>
</div>
</x-app-layout>
