<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Released') }}
        </h2>
    </x-slot>
    <div class="py-1 relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex justify-between">
            <div class="flex gap-2">
                <div class="px-2 py-2">
                    @if (isset($cars))
                        <p class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                            Total Unit/s:{{count($cars)}}
                        </p>
                    @endif
                </div>
            </div>
            <div class="flex ">
                <div class="pb-4 bg-white dark:bg-gray-900">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input wire:model.live.debounce.500ms="search" type="text" id="table-search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                    </div>
                </div>
                <div class="px-2 py-2">
                    <div class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                        <svg data-dropdown-toggle="dropdown" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 01.628.74v2.288a2.25 2.25 0 01-.659 1.59l-4.682 4.683a2.25 2.25 0 00-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 018 18.25v-5.757a2.25 2.25 0 00-.659-1.591L2.659 6.22A2.25 2.25 0 012 4.629V2.34a.75.75 0 01.628-.74z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                          </li>
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                          </li>
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                          </li>
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                          </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class=" px-6 py-3">
                        VIN
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Engine no.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CS no
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Client
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date / Time in
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Recieved By
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Blockings
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Invoice Blocking
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Moved By
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (isset($cars))
                    @foreach($cars as $car)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="w-4 p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="{{URL('unit/'.$car->id)}}">
                                    {{$car->vehicleidno}}
                                </a>
                            </th>
                            <td class="w-4 p-4">
                                {{$car->engineno}}
                            </td>
                            <td class="w-4 p-4">
                                {{$car->csno}}
                            </td>
                            <td class="w-4 p-4">
                                {{$car->modeldescription}}
                            </td>
                            <td class="w-4 p-4">
                                {{$car->client->clientName}}
                            </td>
                            <td class="w-4 p-4">
                                {{$car->dateIn}}
                            </td>
                            <td class="w-4 p-4">
                                {{$car->recieveBy}}
                            </td>
                            <td class="w-4 p-4">
                                @if ($car->blockings)
                                    {{$car->blocking->bloackname}}
                                @else
                                    ...
                                @endif
                            </td>
                            <td class="w-4 p-4 whitespace-nowrap">
                                @if ($car->invoiceBlock)
                                    {{$car->invblocking->bloackname}}
                                @else
                                    ---
                                @endif
                            </td>
                            <td class="w-4 p-4">
                                @if ($car->movedBy)
                                    {{$car->movedBy}}
                                @else
                                    ---
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="py-2">
        @if (isset($cars))
            {{$cars->links()}}
        @endif
    </div>
</div>
