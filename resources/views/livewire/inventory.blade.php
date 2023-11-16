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
{{--
    <div class="gap-2 flex justify-start" id="filtering-tab">
        <div class="py-2">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <input  type="search" id="default-search" class="block w-full p-3 pl-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Vehicle id No, Csno...">
            </div>
        </div>

        <div class="py-2">
            <select wire:model="statusFinding" id="status" wire:model.live="status" class="block w-full p-3 pl-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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

    </div> --}}

    @if (isset($selectedUnitforfinding) && $isEditFinding == true)
        <div class="py-5 flex flex-col justify-start p-2 m-2 ">
            <p class="text-sm">
               @if (isset($vin))
                    {{$vin}}
               @endif
            </p>
            <div class="flex gap-2" >
                <select id="blockings" wire:model="statusFinding" name="blockings" class="block mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="">Choose Status</option>
                    <option value="1">Good</option>
                    <option value="2">Good with Findings</option>
                </select>
            </div>
            <div class="py-2">
                <label for="findings" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit Findings</label>
                <textarea id="findings" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
            </div>
            <div class="py-1 flex">
                <button wire:click="updateFinding" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Update
                </button>
                <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Cancel</button>
            </div>
        </div>
    @endif


    @if (isset($selectedUnitforblocking) && $isEditBlocking == true)
        <div class="py-5 flex flex-col justify-start p-2 m-2">
            <p class="text-sm">Vin {{$vin}}</p>
            <div class="gap-2 flex justify-start" id="filtering-tab">
                <div class="">
                    @livewire('blocks')
                </div>
                <div class="">
                    <select id="blockings" wire:model="blockingselect" name="blockings" class="block mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="">Blockings</option>
                        @if (isset($selectedBlockings))
                            @if ($selectedBlockings)
                                @foreach ($selectedBlockings as $b)
                                    <option  value="{{$b->id}}">{{$b->bloackname}}</option>
                                @endforeach
                            @else
                                <option  value="">Ask the admin for the blcokings</option>
                            @endif
                        @endif
                    </select>
                </div>
                <div class="">
                    <button wire:click="updateBlocking"  type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Update</button>
                    <button wire:click="cancelBlocking" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Cancel</button>
                </div>
            </div>
        </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex gap-2">
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
                <select wire:model="statusFinding" id="status" wire:model.live="status" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    <option value="" selected>Default</option>
                    <option value="1">Good</option>
                    <option value="2">Good w/ Findings</option>
                </select>
            </div>
        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class=" px-6 py-3">
                        VIN
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Color
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (isset($cars))
                    @foreach($cars as $car)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="w-4 p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$car->vehicleidno}}
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
                        <td id="blocking-{{$car->id}}" wire:click="editBlocking({{$car->id}})" class="w-4 p-4">
                            @if ($car->blockings)
                                {{$car->blocking->bloackname}}
                            @else
                                ...
                            @endif
                        </td>
                        <td id="findings-{{$car->id}}" wire:click="editFinding({{$car->id}})" class="w-4 p-4">
                            @if ($car->status == 1)
                                <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3">
                                    <span class="flex w-2.5 h-2.5 bg-blue-600 rounded-full me-1.5 flex-shrink-0">
                                    </span>Good
                                </span>
                            @else
                                <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3">
                                    <span class="flex w-2.5 h-2.5 bg-yellow-500 rounded-full me-1.5 flex-shrink-0">
                                    </span>Good with findings
                                </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                @else
                    table are empty.......
                @endif
            </tbody>
        </table>
        {{-- <table class="py-2 w-full table-auto text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="w-4 p-4">
                        Vehicle Identity No.
                    </th>
                    <th scope="col" class="w-4 p-4">
                        Engine No
                    </th>
                    <th scope="col" class="w-4 p-4">
                        CS No
                    </th>
                    <th scope="col" class="w-4 p-4">
                        Model Description
                    </th>
                    <th scope="col" class="w-4 p-4">
                        Client
                    </th>
                    <th scope="col" class="w-4 p-4">
                        Date / Time in
                    </th>
                    <th scope="col" class="w-4 p-4">
                        Recieved By
                    </th>
                    <th scope="col" class="w-4 p-4">
                        Blokcing
                    </th>
                    <th scope="col" class="w-4 p-4">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (isset($cars))
                    @foreach($cars as $car)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <td class="w-4 p-4">
                            {{$car->vehicleidno}}
                        </td>
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
                        <td scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                            <div class=" flex justify-between">
                                @if ($car->blockings)
                                    {{$car->blocking->bloackname}}
                                @else
                                    ...
                                @endif
                                <svg id="block-{{$car->id}}" wire:click="editBlocking({{$car->id}})" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M7.84 1.804A1 1 0 018.82 1h2.36a1 1 0 01.98.804l.331 1.652a6.993 6.993 0 011.929 1.115l1.598-.54a1 1 0 011.186.447l1.18 2.044a1 1 0 01-.205 1.251l-1.267 1.113a7.047 7.047 0 010 2.228l1.267 1.113a1 1 0 01.206 1.25l-1.18 2.045a1 1 0 01-1.187.447l-1.598-.54a6.993 6.993 0 01-1.929 1.115l-.33 1.652a1 1 0 01-.98.804H8.82a1 1 0 01-.98-.804l-.331-1.652a6.993 6.993 0 01-1.929-1.115l-1.598.54a1 1 0 01-1.186-.447l-1.18-2.044a1 1 0 01.205-1.251l1.267-1.114a7.05 7.05 0 010-2.227L1.821 7.773a1 1 0 01-.206-1.25l1.18-2.045a1 1 0 011.187-.447l1.598.54A6.993 6.993 0 017.51 3.456l.33-1.652zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </td>
                        <td scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div class=" flex justify-between">
                                @if ($car->status == 1)
                                    <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3">
                                        <span class="flex w-2.5 h-2.5 bg-blue-600 rounded-full me-1.5 flex-shrink-0">
                                        </span>Good
                                    </span>
                                @else
                                    <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white me-3">
                                        <span class="flex w-2.5 h-2.5 bg-yellow-500 rounded-full me-1.5 flex-shrink-0">
                                        </span>Good with findings
                                    </span>
                                @endif
                            <svg id="findings-{{$car->id}}" wire:click="editFinding({{$car->id}})" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M7.84 1.804A1 1 0 018.82 1h2.36a1 1 0 01.98.804l.331 1.652a6.993 6.993 0 011.929 1.115l1.598-.54a1 1 0 011.186.447l1.18 2.044a1 1 0 01-.205 1.251l-1.267 1.113a7.047 7.047 0 010 2.228l1.267 1.113a1 1 0 01.206 1.25l-1.18 2.045a1 1 0 01-1.187.447l-1.598-.54a6.993 6.993 0 01-1.929 1.115l-.33 1.652a1 1 0 01-.98.804H8.82a1 1 0 01-.98-.804l-.331-1.652a6.993 6.993 0 01-1.929-1.115l-1.598.54a1 1 0 01-1.186-.447l-1.18-2.044a1 1 0 01.205-1.251l1.267-1.114a7.05 7.05 0 010-2.227L1.821 7.773a1 1 0 01-.206-1.25l1.18-2.045a1 1 0 011.187-.447l1.598.54A6.993 6.993 0 017.51 3.456l.33-1.652zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                            </svg>
                        </td>
                    </tr>
                    @endforeach
                @else
                    table are empty.......
                @endif
            </tbody>
        </table> --}}
    </div>
    <div class="py-2">
        @if (isset($cars))
            {{$cars->links()}}
        @endif
    </div>

    <x-toast />

</div>
