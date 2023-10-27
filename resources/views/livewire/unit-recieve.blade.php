<div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                    <tr wire:key="{{ $tableRow->vehicleidno }}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="flex items-center mb-4 gap-2" >
                                <input wire:click="select({{$tableRow->id}})" id="{{$tableRow->id}}-check-box" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                {{$tableRow->vehicleidno}}
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
                table are empty.......
            @endif
        </tbody>
    </table>
    {{-- <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <th scope="col" class="">
                    checkbox
                </th>
                <th scope="col" class="">
                    VIN.
                </th>
        </thead>
        <tbody>

        </tbody>
    </table> --}}
    <div id="config-button" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        Configuration
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
    <div class="py-2">
        @if (count($data)>1)
            {{$data->links()}}
        @endif
    </div>

</div>

