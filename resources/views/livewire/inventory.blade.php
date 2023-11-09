<div>
    @if ($display == true)
    <div class="gap-2 flex justify-start" id="filtering-tab">
        @foreach ($findings as $finding )
            <p>{{$finding->vehicleidno}}</p>
            <p>{{$finding->findings}}</p>
        @endforeach
    </div>
    @endif
    <div class="gap-2 flex justify-start" id="filtering-tab">
        <div class="py-2">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <input wire:model.live.debounce.500ms="search" type="search" id="default-search" class="block w-full p-3 pl-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Vehicle id No, Csno...">
            </div>
        </div>
        <div class="py-2">
            <select id="status" wire:model.live="status" class="block w-full p-3 pl-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" selected>Choose a country</option>
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
        <div  class="flex items-center">
            <div class="relative">
                <input wire:model.live="startdate"  name="start"  type="date" class="block w-full p-3 pl-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
                <span class="mx-4 text-gray-500">to</span>
            <div class="relative">
                <input wire:model.live="enddate"  name="end" type="date" class="block w-full p-3 pl-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
             </div>
        </div>
    </div>
    <table class="py-2 w-full table-auto text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="">
                    Vehicle Identity No.
                </th>
                <th scope="col" class="">
                    Recieved By
                </th>
                <th scope="col" class="">
                    Blokcing
                </th>
                <th scope="col" class="">
                    Engine No
                </th>
                <th scope="col" class="">
                    CS No
                </th>
                <th scope="col" class="">
                    Model Description
                </th>
                <th scope="col" class="">
                    Recieving status
                </th>
                <th scope="col" class="">
                    Action
                </th>
             </tr>
        </thead>
        <tbody>
            @if (isset($cars))
                @foreach($cars as $d)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$d->vehicleidno}}
                    </th>
                    <th scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$d->recieveBy}}
                    </th>
                    <th scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @if ($d->blockings)
                            {{$d->blocking->bloackname}}
                        @else
                            ...
                        @endif
                    </th>
                    <td class="">
                        {{$d->engineno}}
                    </td>
                    <td class="">
                        {{$d->csno}}
                    </td>
                    <td class="">
                        {{$d->modeldescription}}
                    </td>
                    <td class="">
                        @if($d->status === 1)
                            GOOD
                        @elseif($d->status === 2)
                            GOOD WITH FINDING
                        @endif
                    </td>
                    <td class="text-center">
|                            <div class="flex-col space-y-4">
                            <button wire:click="getFindings({{$d->id}})" type="submit" name="approved" value="2" class="inline-flex items-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.043-2.453-.138-3.332a4.003 4.003 0 00-3.7-3.7 48.378 48.378 0 00-7.324 0 4.003 4.003 0 00-3.7 3.7c-.017.22-.032.441-.043.332M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.043 2.453.138 3.332a4.003 4.003 0 003.7 3.7 48.353 48.353 0 007.324 0 4.003 4.003 0 003.7-3.7c.017-.22.032-.441.043-.332M4.5 12l3 3m-3-3l-3 3" />
                                </svg>
                            </button>
                        </div>
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
