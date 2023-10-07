
<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
    @if (!$tableRow->status)
        <th scope="row" class="flex items-center px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            @if (!$tableRow->batch)
                <input id="default-checkbox" type="checkbox" name="selected-{{$tableRow->id}}" value="{{$tableRow->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            @endif
        </th>
        <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{$tableRow->id}}
        </th>
        <td class="px-6 py-4">
        {{$tableRow->vehicleidno}}
        </td>
        <td class="px-6 py-4">
        {{$tableRow->engineno}}
        </td>
        <td class="px-6 py-4">
        {{$tableRow->csno}}
        </td>
        <td class="px-6 py-4">
        {{$tableRow->modeldescription}}
        </td>
        <td class="px-6 py-4">
        {{$tableRow->vehiclestockyard}}
        </td>

    @endif
</tr>
