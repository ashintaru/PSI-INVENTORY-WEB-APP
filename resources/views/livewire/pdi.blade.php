<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PDI and UnderChassis') }}
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
            @if (isset($forPdi))
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
                        @foreach($forPdi as $unit)
                            @if (!isset($unit->pdi))
                                <tr id="tablerow-{{$unit->id}}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="w-4 p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <x-primary-button id="selectunit-{{$unit->cars_id}}"
                                            wire:click="select('{{$unit->car_id}}')">
                                            Select
                                        </x-primary-button>
                                        <a href="{{URL('unit/'.$unit->car_id)}}">
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
                @if (isset($forPdi))
                    {{$forPdi->links()}}
                @endif
            </div>
        </div>
        <div class="">
                <div class="py-2 flex-row space-y-2">
                    @if (!empty($vin))
                        <label>Vin {{$vin}}</label>
                    @endif
                    <input wire:model="person" onfocus="this.value=''" type="text" id="csno" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Personel" required>
                    @error('person') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    <input wire:model="date" onfocus="this.value=''" type="date" id="date-activities" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @error('date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    <label for="remark" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">P.D.I Remark/s</label>
                    <textarea id="remark" wire:keydown="counting" wire:model="pdi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write remark here........"></textarea>
                    <span class="text-xs font-extralight">Word Count:{{$wordcount}}</span>

                    @error('pdi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    <label for="remark" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UNDERCHASSIS Remark/s</label>

                    <textarea id="remark" wire:model="chassis" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="optional...."></textarea>
                    @error('chassis') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

                    @if (!empty($vin))
                        <x-primary-button wire:click="submit">
                            Submit
                        </x-primary-button>
                        <x-primary-button wire:click="cancelSelectedUnit">
                            Cancel
                        </x-primary-button>
                    @endif
                </div>
        </div>
    </div>

    <x-toast />

</div>

