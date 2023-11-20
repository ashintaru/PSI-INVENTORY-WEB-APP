<div class="p-4 bg-gray-100 ">
    <div class="py-2">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <input wire:model.live.debounce.500ms="search" type="search" id="default-search" class="block w-1/4 p-3 pl-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Vehicle id No, Csno...">
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    VIN
                </th>
                <th scope="col" class="px-6 py-3">
                    CS-NO
                </th>
                <th scope="col" class="px-6 py-3">
                    Engine No
                </th>
                <th scope="col" class="px-6 py-3">
                    Model Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
            </tr>
        </thead>
        <tbody>
            @if (!is_null($data))
                @foreach($data as $tableRow)
                    <div wire:loading wire:target="select({{$tableRow->id}})" class="w-full" role="status">
                        <span class="text-sm text-center text-green-500">Sending....</span>
                    </div>
                    <tr wire:key="{{ $tableRow->vehicleidno }}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="flex items-center mb-4 gap-2" >
                                <button  id="{{$tableRow->id}}-check-box" wire:click="select({{$tableRow->id}})" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                      </svg>
                                  </button>
                                  <a href="{{URL('unit/'.$tableRow->id)}}">
                                        {{$tableRow->vehicleidno}}
                                  </a>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            {{$tableRow->csno}}
                        </td>
                        <td class="px-6 py-4">
                            {{$tableRow->engineno}}
                        </td>
                        <td class="px-6 py-4">
                            {{$tableRow->modeldescription}}
                        </td>
                        <td class="px-6 py-4">
                            {{$tableRow->exteriorcolor}}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>
                        table are empty.......
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
    <div id="config-button" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        Configuration
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
    <div class="py-2">
        @if (isset($data))
            {{$data->links()}}
        @endif
    </div>

    <x-toast />
</div>

