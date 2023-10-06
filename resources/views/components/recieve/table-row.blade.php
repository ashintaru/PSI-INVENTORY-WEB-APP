
<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
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
    <td class="px-6 py-4 flex ">
        <a href="{{URL('/view'."/".$tableRow->id)}}"
            data-tooltip-target="config-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                <path fill-rule="evenodd" d="M14.5 10a4.5 4.5 0 004.284-5.882c-.105-.324-.51-.391-.752-.15L15.34 6.66a.454.454 0 01-.493.11 3.01 3.01 0 01-1.618-1.616.455.455 0 01.11-.494l2.694-2.692c.24-.241.174-.647-.15-.752a4.5 4.5 0 00-5.873 4.575c.055.873-.128 1.808-.8 2.368l-7.23 6.024a2.724 2.724 0 103.837 3.837l6.024-7.23c.56-.672 1.495-.855 2.368-.8.096.007.193.01.291.01zM5 16a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd" />
                <path d="M14.5 11.5c.173 0 .345-.007.514-.022l3.754 3.754a2.5 2.5 0 01-3.536 3.536l-4.41-4.41 2.172-2.607c.052-.063.147-.138.342-.196.202-.06.469-.087.777-.067.128.008.257.012.387.012zM6 4.586l2.33 2.33a.452.452 0 01-.08.09L6.8 8.214 4.586 6H3.309a.5.5 0 01-.447-.276l-1.7-3.402a.5.5 0 01.093-.577l.49-.49a.5.5 0 01.577-.094l3.402 1.7A.5.5 0 016 3.31v1.277z" />
              </svg>
        </a>
    </td>
</tr>
