<div>
    <div class="py-2">
        <div class="flex flex-shrink-0 justify-start gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375z" />
                <path fill-rule="evenodd" d="M3.087 9l.54 9.176A3 3 0 006.62 21h10.757a3 3 0 002.995-2.824L20.913 9H3.087zm6.163 3.75A.75.75 0 0110 12h4a.75.75 0 010 1.5h-4a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
              </svg>
              <p class="text-lg">Inventory</p>
        </div>
    </div>

    <div class="gap-2 flex justify-start" id="filtering-tab">
        <div class="py-2">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <input wire:model.live.debounce.500ms="search" type="search" id="default-search" class="block w-full p-3 pl-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Vehicle id No, Csno...">
            </div>
        </div>
        <div class="py-2">
            <select id="status" wire:model.live="status" class="block w-full p-3 pl-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" selected>Default</option>
                <option value="1">Good</option>
                <option value="2">Good w/ Findings</option>
            </select>
        </div>
        <div class="py-2">
            @if (isset($clients))
                <select id="clients" wire:model.live="clienttag" class="block w-full p-3 pl-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>Choose a Clients</option>
                    @foreach ($clients as $client)
                        <option value={{$client->id}}>{{$client->clientName}}</option>
                    @endforeach
                </select>
            @endif
        </div>
    </div>
    {{$selectedUnit}}
    @if (isset($selectedUnit) && $isEditBlocking == true)
        <div class="py-5 flex flex-col justify-start p-2 m-2">
            <p class="text-sm">Edit Blockings</p>
            <div class="gap-2 flex justify-start" id="filtering-tab">
                <div class="">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <input wire:model.live.debounce.500ms="search" type="search" id="default-search" class="block mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" placeholder="Search Vehicle id No, Csno...">
                    </div>
                </div>
                <div class="">
                    @livewire('blocks')
                </div>
                <div class="">
                    @if (isset($clients))
                        <span wire:loading wire:target="select" class="text-xs text-green-400">Searching....</span>
                        <select  wire:model="blockid" wire:click="select"  name="blocks" class="block mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            @if ($client)
                                <option>....</option>
                                @foreach ($selectedBlockings as $b)
                                    <option  value="{{$b->id}}">{{$b->bloackname}}</option>
                                @endforeach
                            @else
                                <option  value="">Ask the admin for the blcokings</option>
                            @endif
                        </select>
                    @endif
                </div>
                <div class="">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 block mt-1 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Default</button>
                </div>
            </div>
        </div>
    @endif


    <table class="py-2 w-full table-auto text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Vehicle Identity No.
                </th>
                <th scope="col" scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Engine No
                </th>
                <th scope="col" scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    CS No
                </th>
                <th scope="col" scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Model Description
                </th>
                <th scope="col" scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Date / Time in
                </th>
                <th scope="col" scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Recieved By
                </th>
                <th scope="col" scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Blokcing
                </th>
                <th scope="col" scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Status
                </th>
             </tr>
        </thead>
        <tbody>
            @if (isset($cars))
                @foreach($cars as $car)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <td scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$car->vehicleidno}}
                    </td>
                    <td scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$car->engineno}}
                    </td>
                    <td scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$car->csno}}
                    </td>
                    <td scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$car->modeldescription}}
                    </td>
                    <td scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$car->dateIn}}
                    </td>
                    <td scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$car->recieveBy}}
                    </td>
                    <td scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                        <div class=" flex justify-between">
                            @if ($car->blockings)
                                {{$car->blocking->bloackname}}
                            @else
                                ...
                            @endif
                            <svg wire:click="editBlocking({{$car->id}})" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M7.84 1.804A1 1 0 018.82 1h2.36a1 1 0 01.98.804l.331 1.652a6.993 6.993 0 011.929 1.115l1.598-.54a1 1 0 011.186.447l1.18 2.044a1 1 0 01-.205 1.251l-1.267 1.113a7.047 7.047 0 010 2.228l1.267 1.113a1 1 0 01.206 1.25l-1.18 2.045a1 1 0 01-1.187.447l-1.598-.54a6.993 6.993 0 01-1.929 1.115l-.33 1.652a1 1 0 01-.98.804H8.82a1 1 0 01-.98-.804l-.331-1.652a6.993 6.993 0 01-1.929-1.115l-1.598.54a1 1 0 01-1.186-.447l-1.18-2.044a1 1 0 01.205-1.251l1.267-1.114a7.05 7.05 0 010-2.227L1.821 7.773a1 1 0 01-.206-1.25l1.18-2.045a1 1 0 011.187-.447l1.598.54A6.993 6.993 0 017.51 3.456l.33-1.652zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </td>
                    <td scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class=" flex justify-between">
                            @if ($car->status == 1)
                                <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3">
                                    <span class="flex w-2.5 h-2.5 bg-blue-600 rounded-full me-1.5 flex-shrink-0">
                                    </span>GOODS
                                </span>
                            @else
                                <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3">
                                    <span class="flex w-2.5 h-2.5 bg-yellow-500 rounded-full me-1.5 flex-shrink-0">
                                    </span>FINDINGS
                                </span>
                            @endif

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M7.84 1.804A1 1 0 018.82 1h2.36a1 1 0 01.98.804l.331 1.652a6.993 6.993 0 011.929 1.115l1.598-.54a1 1 0 011.186.447l1.18 2.044a1 1 0 01-.205 1.251l-1.267 1.113a7.047 7.047 0 010 2.228l1.267 1.113a1 1 0 01.206 1.25l-1.18 2.045a1 1 0 01-1.187.447l-1.598-.54a6.993 6.993 0 01-1.929 1.115l-.33 1.652a1 1 0 01-.98.804H8.82a1 1 0 01-.98-.804l-.331-1.652a6.993 6.993 0 01-1.929-1.115l-1.598.54a1 1 0 01-1.186-.447l-1.18-2.044a1 1 0 01.205-1.251l1.267-1.114a7.05 7.05 0 010-2.227L1.821 7.773a1 1 0 01-.206-1.25l1.18-2.045a1 1 0 011.187-.447l1.598.54A6.993 6.993 0 017.51 3.456l.33-1.652zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                          </svg>
                    </td>
                </tr>
                @endforeach
            @else
                table are empty.......
            @endif
        </tbody>
    </table>
    <div class="py-2">
        @if (isset($cars))
            {{$cars->links()}}
        @endif
    </div>

</div>
