<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Invoice') }}
        </h2>
    </x-slot>
    @if (isset($selectedUnitforblocking) && $isEditBlocking == true)
        <div class="py-5 flex flex-col justify-start p-2 m-2">
            <p class="text-sm">Vin {{$vin}}</p>
             <div class="gap-2 inline-flex items-center" id="filtering-tab">
                <div class="">
                    <input wire:model="movedBy" type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="">
                    <select id="blockings" wire:model="selectedBlocking" name="blockings" class="block mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="">Blockings</option>
                        @if (isset($blockings))
                            @foreach ($blockings as $b)
                                <option  value="{{$b->id}}">{{$b->bloackname}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="inline-flex items-center">
                    <button wire:click="setInvoiceBlocking"  type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 block mt-1 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>
                    <button wire:click="setInvoiceBlocking"  type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 block mt-1 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</button>
                </div>
            </div>
        </div>
    @endif

    @if (isset($selectedUnitforblocking) && $ismovedBy == true)
        <div class="py-5 flex flex-col justify-start p-2 m-2">
            <p class="text-sm">Vin {{$vin->vehicleidno}}</p>
            <div class="gap-2 flex justify-start" id="filtering-tab">
                <form >
                    <div class="inline-flex items-center">
                        <button wire:click.prevent="setMovedBy" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 block mt-1 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>
                        <button wire:click="setInvoiceBlocking" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 block mt-1 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
            <div class="flex py-1 ">
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
        @if (isset($cars))
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
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
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
                            <button id="btnBlockings-{{$car->id}}" wire:click="selectedUnit({{$car->id}},1)" type="button" class="border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                @if ($car->invoiceBlock)
                                    {{$car->invblocking->bloackname}}
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M7.84 1.804A1 1 0 018.82 1h2.36a1 1 0 01.98.804l.331 1.652a6.993 6.993 0 011.929 1.115l1.598-.54a1 1 0 011.186.447l1.18 2.044a1 1 0 01-.205 1.251l-1.267 1.113a7.047 7.047 0 010 2.228l1.267 1.113a1 1 0 01.206 1.25l-1.18 2.045a1 1 0 01-1.187.447l-1.598-.54a6.993 6.993 0 01-1.929 1.115l-.33 1.652a1 1 0 01-.98.804H8.82a1 1 0 01-.98-.804l-.331-1.652a6.993 6.993 0 01-1.929-1.115l-1.598.54a1 1 0 01-1.186-.447l-1.18-2.044a1 1 0 01.205-1.251l1.267-1.114a7.05 7.05 0 010-2.227L1.821 7.773a1 1 0 01-.206-1.25l1.18-2.045a1 1 0 011.187-.447l1.598.54A6.993 6.993 0 017.51 3.456l.33-1.652zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </button>
                        </td>
                        <td class="w-4 p-4">
                            @if ($car->movedBy)
                                {{$car->movedBy}}
                            @else
                                ---
                            @endif
                        </td>
                        <td class="w-4 p-4">
                            @if ($car->invoiceBlock && $car->movedBy)
                                <a href="{{URL('releasing/'.$car->id)}}" >Releasing</a>
                            @else
                                ---
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            table are empty.......
        @endif
    </div>
    <div class="py-2">
        @if (isset($cars))
            {{$cars->links()}}
        @endif
    </div>
</div>
