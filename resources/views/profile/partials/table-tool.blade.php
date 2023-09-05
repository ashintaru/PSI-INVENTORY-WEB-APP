<section>
    @if (!is_null($tools))
        @foreach ($tools as $t )
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                        LOOSE ITEM'S
                    </th>
                    <td class="px-6 flex flex-row-reverse py-4 ">

                        <x-edit-button route="edit-loose-tool" id="{{$t->id}}">
                            {{ __('Edit') }}
                        </x-edit-button>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                        OWNOER MANUAL
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center mr-4">
                            @if ($t->ownermanual )
                                <input checked disabled name="manual" id="red-checkbox" type="checkbox" value="1" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            @else
                                <input disabled name="manual" id="red-checkbox" type="checkbox" value="1" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            @endif

                        </div>
                    </th>
                </tr>
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                        WARANTY BOOKLET
                    </th>
                    <td class="px-6 py-4">
                        <div class="flex items-center mr-4">
                            @if ($t->warantybooklet)
                                <input checked disabled name="manual" id="red-checkbox" type="checkbox" value="1" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            @else
                                <input disabled name="manual" id="red-checkbox" type="checkbox" value="1" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            @endif
                        </div>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                        KEY
                    </th>
                    <td class="px-6 py-4">
                        <div class="flex items-center mr-4">
                            <label for="red-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$t->key}}</label>
                        </div>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                        REMOTE CONTROL
                    </th>
                    <td class="px-6 py-4">
                        <div class="flex items-center mr-4">
                            @if ($t->remotecontrol)
                                <input checked disabled name="manual" id="red-checkbox" type="checkbox" value="1" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            @else
                                <input disabled name="manual" id="red-checkbox" type="checkbox" value="1" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            @endif

                        </div>
                    </td>

                </tr>
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                        Other
                    </th>
                    <td class="px-6 py-4">
                        <div class="flex items-center mr-4">
                            <label for="red-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$t->others}}</label>
                        </div>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="px-6 py-4">
                        <label for="red-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date Updated ::  {{ Carbon\Carbon::parse($t->updated_at)->format('M d Y') }}</label>
                    </td>
                </tr>
            </tbody>
        </table>
        @endforeach

    @endif
</section>
