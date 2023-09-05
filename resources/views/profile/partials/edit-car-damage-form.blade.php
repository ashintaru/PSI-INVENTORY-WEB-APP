<section>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <form method="POST" action="{{URL('update-car-damage/'.$data->id)}}">
            @csrf
            @method('PUT')
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            SET OF TOOL'S
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" @if ($data->dents)  checked @endif type="checkbox" name="dents" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dents </label>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" @if ($data->dings)  checked @endif type="checkbox" name="dings" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dings</label>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" @if ($data->scratches)  checked @endif type="checkbox" name="scratches" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Deep Scratches</label>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" @if ($data->paintdefects)  checked @endif type="checkbox" name="paintdefects" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Obvious Paint Defects</label>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" @if ($data->damage)  checked @endif type="checkbox" name="damage" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Obvious Damage</label>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox" @if ($data->other)  checked @endif  type="checkbox" name="other" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other's</label>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks:</label>
                            <textarea id="message" name="remark" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">
                                {{$data->remark}}
                            </textarea>

                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">
                            <x-primary-button>Submit</x-primary-button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

</section>
