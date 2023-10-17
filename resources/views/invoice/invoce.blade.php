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
                           <th scope="col" class="px-6 py-3">
                                <p class="flex items-center text-sm text-gray-500 dark:text-gray-400">Status
                                     <button data-popover-target="popover-description" data-popover-placement="right" type="button"><svg class="w-4 h-4 ml-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button></p>
                                <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                    <div class="p-3 space-y-2">
                                        <div class="flex flex-auto">
                                            <svg width="26px" height="26px" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet"><path fill="#77B255" d="M36 32a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4h28a4 4 0 0 1 4 4v28z"></path><path fill="#FFF" d="M29.28 6.362a2.502 2.502 0 0 0-3.458.736L14.936 23.877l-5.029-4.65a2.5 2.5 0 1 0-3.394 3.671l7.209 6.666c.48.445 1.09.665 1.696.665c.673 0 1.534-.282 2.099-1.139c.332-.506 12.5-19.27 12.5-19.27a2.5 2.5 0 0 0-.737-3.458z"></path></svg>
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Green Checked</h3>
                                        </div>
                                        <p>The car have Passed during receiving Inspection </p>
                                        <div class="flex flex-auto">
                                            <svg width="26px" height="26px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--emojione" preserveAspectRatio="xMidYMid meet"><path d="M62 52c0 5.5-4.5 10-10 10H12C6.5 62 2 57.5 2 52V12C2 6.5 6.5 2 12 2h40c5.5 0 10 4.5 10 10v40z" fill="#ff5a79"></path><path fill="#ffffff" d="M50 21.2L42.8 14L32 24.8L21.2 14L14 21.2L24.8 32L14 42.8l7.2 7.2L32 39.2L42.8 50l7.2-7.2L39.2 32z"></path></svg>
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Red Checked</h3>
                                        </div>
                                        <p>The car does not Passed during inspection and it will be wait for further inspection </p>
                                        <a href="#" class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read more <svg class="w-2 h-2 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg></a>
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                         </th>
                         <th scope="col" class="px-6 py-3">
                            Vehicle Identity No.
                        </th>
                         <th scope="col" class="px-6 py-3">
                            Engine No
                         </th>

                         <th scope="col" class="px-6 py-3">
                            CS No
                         </th>
                         <th scope="col" class="px-6 py-3">
                            Model Description
                         </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                       </tr>
                   </thead>
                   <tbody>
                        @if (!is_null($invoices))
                            @foreach($invoices as $invoice)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$invoice->car->id}}
                                    </th>
                                    <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$invoice->id}}
                                    </th>
                                    <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$invoice->car->blocking->bloackname}}
                                    </th>
                                    <td class="px-6 py-4">
                                        @if ($invoice->status)
                                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Invoice</span>
                                        @else
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Blockings</span>
                                        @endif
                                    </td>
                                     <td class="px-6 py-4">
                                        {{$invoice->car->vehicleidno}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$invoice->car->engineno}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$invoice->car->csno}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$invoice->car->modeldescription}}
                                    </td>
                                    <td class="px-6 py-4 flex justify-around">
                                        <a href="{{URL('view'."/".$invoice->car->id)}}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <x-config_icon></x-config_icon>
                                        </a>
                                        <a href="{{URL('/invoice-get'."/".$invoice->id)}}">
                                            <svg class="w-5 h-5"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 505 505" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle style="fill:#007bff;" cx="252.5" cy="252.5" r="252.5"></circle> <path style="fill:#FFD05B;" d="M410.5,114.6h-316c-2.2,0-4,1.8-4,4v74.7c0,2.2,1.8,4,4,4h316c2.2,0,4-1.8,4-4v-74.7 C414.5,116.4,412.7,114.6,410.5,114.6z"></path> <rect x="108.8" y="135" style="fill:#324A5E;" width="287.5" height="42"></rect> <polygon style="fill:#EDF2F2;" points="161.4,389.9 162.5,389.9 174.9,377.5 187.3,389.9 188.4,389.9 200.7,377.5 213.1,389.9 214.2,389.9 226.6,377.5 239,389.9 240.1,389.9 252.5,377.5 264.9,389.9 266,389.9 278.4,377.5 290.8,389.9 291.9,389.9 304.3,377.5 316.6,389.9 317.7,389.9 330.1,377.5 342.5,389.9 343.6,389.9 356,377.5 365.3,386.7 365.3,156 139.7,156 139.7,386.7 149,377.5 "></polygon> <g> <rect x="177.1" y="213.4" style="fill:#4CDBC4;" width="150.9" height="14"></rect> <rect x="177.1" y="257" style="fill:#4CDBC4;" width="150.9" height="14"></rect> <rect x="177.1" y="300.5" style="fill:#4CDBC4;" width="90.6" height="14"></rect> </g> </g></svg>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach
                        @else
                            table are empty.......
                        @endif
                   </tbody>
               </table>
             </section>
        @else
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                NO DATA FOUND.....
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
