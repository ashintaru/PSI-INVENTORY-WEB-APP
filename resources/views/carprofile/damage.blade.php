<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (!is_null($car))
            <x-navigation.nav-link2 :car="$car"/>
            <x-alert-error></x-alert-error>
            <x-alert-success></x-alert-success>
            @if($car->damage)
                <form method="POST" action="{{URL('update-car-damage/'.$car->damage->id)}}">
                    @csrf
                    @method('PATCH')
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    SET OF Damage'S
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox" @if ($car->damage->dents)  checked @endif type="checkbox" name="dents" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dents </label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox" @if ($car->damage->dings)  checked @endif type="checkbox" name="dings" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dings</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox" @if ($car->damage->scratches)  checked @endif type="checkbox" name="scratches" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Deep Scratches</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox" @if ($car->damage->paintdefects)  checked @endif type="checkbox" name="paintdefects" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Obvious Paint Defects</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox" @if ($car->damage->damage)  checked @endif type="checkbox" name="damage" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Obvious Damage</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox" @if ($car->damage->other)  checked @endif  type="checkbox" name="other" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other's</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks:</label>
                                    <textarea id="message" name="remark" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">
                                        {{$car->damage->remark}}
                                    </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <x-primary-button>Update</x-primary-button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>

            @else
            <form method="POST" action="{{URL('car-damage/'.$car->id)}}">
                @csrf
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                SET OF DAMAGE
                            </th>
                        </tr>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                Directions::
                                <input checked disabled id="default-checkbox" type="checkbox" name="dents" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                Check the corresponding box if the car has that damage and
                                <input disabled id="default-checkbox" type="checkbox" name="dents" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                leave it blank if the car does not have damage
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4">
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" name="dents" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dents </label>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4">
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" name="dings" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dings</label>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4">
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" name="scratches" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Deep Scratches</label>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4">
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" name="paintdefects" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Obvious Paint Defects</label>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4">
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" name="damage" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Obvious Damage</label>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4">
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" name="other" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other's</label>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-6 py-4">
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks:</label>
                                <textarea id="message" name="remark" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
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

            @endif




        @endif

        </div>
    </div>
</x-app-layout>
