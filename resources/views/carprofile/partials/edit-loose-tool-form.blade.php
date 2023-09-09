<section>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <form method="POST" action="{{URL('update-loose-item/'.$tools->id)}}">
            @method('PUT')
            @csrf
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            LOOSE ITEM'S
                        </th>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            LOOSE ITEM'S
                        </th>
                        <td scope="col" class="px-6 py-3">
                            {{$tools->vehicleidno}}
                        </td>

                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Direction's
                        </th>
                        <td scope="col" class="px-6 py-3">
                            <div class="flex items-center mr-4">
                                <input disabled checked name="manual" id="red-checkbox" type="checkbox" value="true" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="red-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">it mean's that the tool are loose</label>
                            </div>
                        </td>
                        <td scope="col" class="px-6 py-3">
                            <div class="flex items-center mb-4">
                                <input disabled id="disabled-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="disabled-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-500">Tool arzze Intact</label>
                            </div>

                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            OWNOER MANUAL
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center mr-4">
                                <input  name="manual" @if ($tools->ownermanual)  checked @endif id="red-checkbox" type="checkbox" value="1" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </div>
                        </th>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                            WARANTY BOOKLET
                        </th>
                        <td class="px-6 py-4">
                            <div class="flex items-center mr-4">
                                <input name="waranty" @if ($tools->warantybooklet)  checked @endif  id="red-checkbox" type="checkbox" value="1" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">

                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                            KEY
                        </th>
                        <td class="px-6 py-4">
                            <div class="flex items-center mr-4">
                                <input  name="key" id="red-checkbox" @if (!empty($tools->key))  checked @endif type="checkbox" value="1" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">

                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center mr-4">
                                <input type="number" name="keyvalue" id="small-input" @if ($tools->key)  value="{{$tools->key}}" @endif  class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @if($errors->any())
                                    <span>{{$errors->first()}}</span>
                                @endif
                            </div>
                        </td>

                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                            REMOTE CONTROL
                        </th>
                        <td class="px-6 py-4">
                            <div class="flex items-center mr-4">
                                <input
                                @if ($tools->remotecontrol)  checked @endif
                                name="remote" id="red-checkbox" type="checkbox" value="1" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </div>
                        </td>

                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                            Other
                        </th>
                        <td class="px-6 py-4">
                            <div class="flex items-center mr-4">
                                <input
                                @if (!empty($tools->others))  checked @endif
                                name="other"  id="red-checkbox" type="checkbox" value="1" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">

                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center mr-4">
                                <input
                                @if ($tools->others)  value="{{$tools->others}}" @endif
                                type="text" name="othervalue" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <td class="px-6 py-4 " >
                            <x-primary-button>Submit</x-primary-button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

</section>
