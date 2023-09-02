<section>
    @if (!empty($damage))
        @foreach ($damage as $d )
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
                            @if ($d->dents)
                            <input id="default-checkbox" checked disabled type="checkbox" name="dings" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dings</label>
                            @else
                            <input disabled id="default-checkbox" type="checkbox" name="dings" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dings</label>
                            @endif
                        </div>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="px-6 py-4">
                        <div class="flex items-center mb-4">
                            @if ($d->dings)
                            <input id="default-checkbox" checked disabled type="checkbox" name="dings" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dings</label>
                            @else
                            <input disabled id="default-checkbox" type="checkbox" name="dings" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dings</label>
                            @endif

                        </div>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="px-6 py-4">
                        <div class="flex items-center mb-4">
                            @if ($d->scratches)
                                <input disabled checked id="default-checkbox" type="checkbox" name="scratches" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Deep Scratches</label>
                            @else
                                <input disabled id="default-checkbox" type="checkbox" name="scratches" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Deep Scratches</label>
                            @endif

                        </div>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="px-6 py-4">
                        <div class="flex items-center mb-4">
                            @if ($d->paintdefects)
                                <input id="default-checkbox" disabled checked type="checkbox" name="paintdefects" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Obvious Paint Defects</label>
                            @else
                                <input id="default-checkbox" disabled type="checkbox" name="paintdefects" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Obvious Paint Defects</label>
                            @endif
                        </div>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="px-6 py-4">
                        <div class="flex items-center mb-4">
                            @if ($d->damage)
                            <input id="default-checkbox" type="checkbox" disabled checked name="damage" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Obvious Damage</label>
                            @else
                            <input id="default-checkbox" type="checkbox" disabled name="damage" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Obvious Damage</label>

                            @endif

                        </div>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="px-6 py-4">
                        <div class="flex items-center mb-4">
                            @if ($d->other)
                            <input id="default-checkbox" checked disabled type="checkbox" name="other" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other's</label>
                            @else
                            <input id="default-checkbox" type="checkbox" disabledz name="other" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other's</label>
                            @endif

                        </div>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="px-6 py-4">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks:</label>
                        <textarea disabled id="message" name="remark" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            {{$d->remark}}
                        </textarea>

                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4">
                        Date Updated ::  {{ Carbon\Carbon::parse($d->updated_at)->format('M d Y') }}
                    </td>
                    <td class="px-6 py-4 ">
                        <x-edit-button route="edit-damage-car" id="{{$d->id}}">
                            {{ __('Edit') }}
                        </x-edit-button>
                    </td>
                </tr>
            </tbody>
        </table>
        @endforeach

    @else

    @endif

</section>
