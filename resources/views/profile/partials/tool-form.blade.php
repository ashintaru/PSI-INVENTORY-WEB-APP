<section>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <form method="POST" action="{{URL('set-tool/'.$carid)}}">
            @csrf
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
                                <input id="default-checkbox"
                                @if(old('toolbag')) checked @endif
                                name="toolbag" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tool Bag</label>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox"
                                @if(old('4wheels')) checked @endif
                                name="4wheels"  type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">4 Weels</label>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox"
                                @if(old('tirewrench')) checked @endif
                                name="tirewrench" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tire Wrench</label>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox"
                                @if(old('cigarettelighter')) checked @endif
                                name="cigarettelighter" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cigarette Lighter</label>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox"
                                @if(old('jack')) checked @endif
                                name="jack" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jack</label>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox"
                                @if(old('wheelcap')) checked @endif
                                name="wheelcap" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wheel Cap</label>
                            </div>
                        </td>
                        <td  class="px-6 py-4">
                            <div class="flex items-center mr-4">
                                <input type="number" placeholder="qtty"
                                name="wheelcapvalue" value="{{old('wheelcapvalue')}}" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            @if (old("wheelcap") && old('wheelcapvalue') == null)
                                <span class="text-red-500">Error this field should not be empty</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox"
                                @if(old('jackhandle')) checked @endif
                                name="jackhandle" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jack Handle</label>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox"
                                @if(old('sparetire')) checked @endif
                                name="sparetire" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Spare Tire</label>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox"
                                @if(old('openwrench')) checked @endif
                                name="openwrench" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Open Wrench</label>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input id="default-checkbox"
                                @if(old('antena')) checked @endif
                                type="checkbox" name="atena" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Atena</label>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input name="towhook"
                                @if(old('towhook')) checked @endif
                                id="default-checkbox" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tow Hook</label>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input name="matting"
                                @if(old('matting')) checked @endif
                                id="default-checkbox" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Matting</label>
                            </div>
                        </td>
                    </tr>

                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input
                                @if(old('slottedscrewdriver')) checked @endif
                                name="slottedscrewdriver" id="default-checkbox" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Slotted Screwdriver</label>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input name="other"
                                @if(old('other')) checked @endif

                                id="default-checkbox" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other</label>
                            </div>
                        </td>
                        <td  class="px-6 py-4">
                            <div class="flex items-center mr-4">
                                <input type="text" value="{{old('othervalue')}}" placeholder="qtty" name="othervalue" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                             </div>
                             @if (old("other") && old('othervalue') == null)
                             <span class="text-red-500">Error this field should not be empty</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                <input name="phillipsscewdriver"
                                @if(old('phillipsscewdriver')) checked @endif
                                id="default-checkbox" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phillips Screwdriver</label>
                            </div>
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
