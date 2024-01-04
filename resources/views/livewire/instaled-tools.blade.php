<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Instalation') }}
        </h2>
    </x-slot>
    <div class="py-2 flex justify-evenly">
        <div>
            <div class="py-2 flex items-center">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
                        </svg>
                    </div>
                    <input wire:model.live.debounce.500ms="search" type="text" id="unit-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Vin number" required>
                </div>
            </div>
            @if (isset($forInstalation))
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class=" px-6 py-3">
                                VIN
                            </th>
                            <th scope="col" class="px-6 py-3">
                                CS no
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="whitespace-nowrap px-6 py-3">
                                Selected by
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($forInstalation as $unit)
                            @if (!isset($unit->instalation))
                                <tr id="tablerow-{{$unit->id}}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="w-4 p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <x-primary-button id="selectunit-{{$unit->cars_id}}" wire:click="select({{$unit->cars_id}})">
                                            Select
                                        </x-primary-button>
                                        <a href="{{URL('unit/'.$unit->cars_id)}}">
                                            {{$unit->vehicleidno}}
                                        </a>
                                    </th>
                                    <td class="whitespace-nowrap w-4 p-4">
                                        {{$unit->car->csno}}
                                    </td>
                                    <td class=" whitespace-nowrap w-4 p-4">
                                        @if (isset($unit->car))
                                            {{$unit->car->modeldescription}}
                                        @else
                                            -------
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap w-4 p-4">
                                        @if (isset($unit->user))
                                            {{$unit->user->name}}
                                        @else
                                            open
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @else
                table are empty.......
            @endif
            <div class="py-2">
                @if (isset($forInstalation))
                    {{$forInstalation->links()}}
                @endif
            </div>
        </div>
        <div>
            @if (isset($batches))
                <div class="py-2 flex justify-start gap-2 ">
                    <input wire:model="name" type="text" id="personel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Name" required>
                    <input wire:model="date" type="date" id="date-activities" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <x-primary-button wire:click="submitBatches">
                        Submit
                    </x-primary-button>
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class=" px-6 py-3">
                                VIN
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($batches as $batch)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class=" w-4 p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                       {{$batch->vehicleidno}}
                                    </th>
                                    <td class="w-1">
                                        <button id="{{$batch->id}}-remove-button" wire:click="removeBatch({{$batch->id}})" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                                              </svg>
                                        </button>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                table are empty.......
            @endif
        </div>
    </div>

    <x-toast />

</div>
