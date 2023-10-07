<x-app-layout>
    <x-navigation.nav-link :url="URL('recieve')">
        Recieve
    </x-navigation.nav-link>
    <div class="py-1">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-3 py-3">
                        Unit ID
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Recieve ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Vehicle Id
                    </th>
                    <th scope="col" class="px-2 py-2">
                         the Loose Item
                    </th>
                    <th scope="col" class="px-2 py-2">
                         the Set tools
                    </th>
                    <th scope="col" class="px-2 py-2">
                         the unit Damage
                    </th>
                    <th scope="col" class="px-2 py-2">
                        Check Status
                    </th>
                    <th scope="col" class="px-2 py-2">
                        Unit Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date In
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date Recieve
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Recive By:
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (!is_null($data))
                <form action="{{URL('batchingUnit')}}" method="POST" >
                    @csrf
                    @foreach($data as $tableRow)
                        @if (!$tableRow->havebeenpassed)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            @if (!$tableRow->status)
                                <th scope="row" class="px-3 text-center py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$tableRow->car->id}}
                                </th>
                                <th scope="row" class="px-3 text-center py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$tableRow->id}}
                                </th>
                                <th scope="row" class="px-3 text-center py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$tableRow->car->vehicleidno}}
                                </th>
                                <th scope="row" class="px-3 text-center
                                    @if ($tableRow->hasloosetool)
                                        bg-green-500 dark:bg-green-300
                                    @else
                                        bg-yellow-500 dark:bg-yellow-300
                                    @endif
                                py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                </th>
                                <th scope="row" class="px-3 text-center
                                @if ($tableRow->hassettool)
                                        bg-green-500 dark:bg-green-300
                                    @else
                                        bg-yellow-500 dark:bg-yellow-300
                                    @endif
                                py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                </th>
                                <th scope="row" class="px-3 text-center
                                    @if ($tableRow->hasdamage)
                                        bg-green-500 dark:bg-green-300
                                    @else
                                        bg-yellow-500 dark:bg-yellow-300
                                    @endif
                                py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                </th>
                                <th scope="row" class="px-3 text-center
                                    @if ($tableRow->havebeenchecked)
                                        bg-green-500 dark:bg-green-300
                                    @else
                                        bg-yellow-500 dark:bg-yellow-300
                                    @endif
                                py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                </th>
                                <th scope="row" class="px-3 text-center
                                    @if ($tableRow->havebeenpassed)
                                        bg-green-500 dark:bg-green-300
                                    @else
                                        bg-yellow-500 dark:bg-yellow-300
                                    @endif
                                py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                </th>
                                <th scope="row" class="px-3 text-center py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{Carbon\Carbon::parse($tableRow->datein)->isoformat('MMMM Do YYYY h:mm a')}}
                                </th>
                                <th scope="row" class="px-3 text-center py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$tableRow->daterecieve}}
                                </th>
                                <th scope="row" class="px-3 text-center py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$tableRow->recieveBy}}
                                </th>
                                <td class="px-6 py-4 flex ">
                                    <a href="{{URL('view-recieve-unit/'.$tableRow->id)}}"
                                        data-tooltip-target="config-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                                            <path fill-rule="evenodd" d="M14.5 10a4.5 4.5 0 004.284-5.882c-.105-.324-.51-.391-.752-.15L15.34 6.66a.454.454 0 01-.493.11 3.01 3.01 0 01-1.618-1.616.455.455 0 01.11-.494l2.694-2.692c.24-.241.174-.647-.15-.752a4.5 4.5 0 00-5.873 4.575c.055.873-.128 1.808-.8 2.368l-7.23 6.024a2.724 2.724 0 103.837 3.837l6.024-7.23c.56-.672 1.495-.855 2.368-.8.096.007.193.01.291.01zM5 16a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd" />
                                            <path d="M14.5 11.5c.173 0 .345-.007.514-.022l3.754 3.754a2.5 2.5 0 01-3.536 3.536l-4.41-4.41 2.172-2.607c.052-.063.147-.138.342-.196.202-.06.469-.087.777-.067.128.008.257.012.387.012zM6 4.586l2.33 2.33a.452.452 0 01-.08.09L6.8 8.214 4.586 6H3.309a.5.5 0 01-.447-.276l-1.7-3.402a.5.5 0 01.093-.577l.49-.49a.5.5 0 01.577-.094l3.402 1.7A.5.5 0 016 3.31v1.277z" />
                                        </svg>
                                    </a>
                                </td>

                            @endif
                        </tr>
                        @endif
                    @endforeach
                </form>
                @else
                    table are empty.......
                @endif
            </tbody>
        </table>
        <div id="config-button" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Configuration
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        <div class="py-2">
            @if (count($data)>1)
                {{$data->links('pagination::tailwind')}}
            @endif
        </div>


	</div>



</x-app-layout>
