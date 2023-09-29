<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (!is_null($car))
                <!-- Breadcrumb -->
                <nav class="justify-between px-4 py-3 text-gray-700 border border-gray-200 rounded-lg sm:flex sm:px-5 bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-3 sm:mb-0">
                    <li>
                        <div class="flex items-center">
                        <a href="{{URL('recieve')}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Database</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{URL('view/'.$car->id)}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">{{$car->vehicleidno}}</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="mx-1 text-sm font-medium text-gray-500 md:mx-2 dark:text-gray-400">Set Tool's</span><span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 hidden sm:flex">docs</span>
                        </div>
                    </li>
                    </ol>
                    <div>
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="inline-flex items-center px-3 py-2 text-sm font-normal text-center text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-300 dark:focus:ring-gray-700"><svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm9-10v.4A3.6 3.6 0 0 1 8.4 9H6.61A3.6 3.6 0 0 0 3 12.605M14.458 3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                    </svg>Fix #6597<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg></button>
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                        <li>
                            <a href="{{URL('createloosetools/'.$car->id)}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Loose Tool's
                            </a>
                        </li>
                        <li>
                            <a href="{{URL('createsettools/'.$car->id)}}" selected class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Set Tool's</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                        </li>
                        </ul>
                    </div>
                    </div>
                </nav>

            <x-alert-error></x-alert-error>
            <x-alert-success></x-alert-success>
            @if($car->settools)
                <form method="POST" action="{{URL('update-set-tool/'.$car->settools->id)}}">
                    @method('PATCH')
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
                                        <input @if ($car->settools->toolbag)  checked @endif id="default-checkbox" name="toolbag" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tool Bag</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input @if ($car->settools->wheels)  checked @endif id="default-checkbox" name="4wheels"  type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">4 Weels</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input @if ($car->settools->tirewrench)  checked @endif id="default-checkbox" name="tirewrench" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tire Wrench</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input @if ($car->settools->cigarettelighter)  checked @endif id="default-checkbox" name="cigarettelighter" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cigarette Lighter</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox" @if ($car->settools->jack)  checked @endif name="jack" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jack</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="wheelcap" @if ( !empty($car->settools->wheelcap))  checked @endif  name="wheelcap" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wheel Cap</label>
                                    </div>
                                </td>
                                <td  class="px-6 py-4">
                                    <div class="flex items-center mr-4">
                                        <input type="number"  placeholder="qtty" value="{{$car->settools->wheelcap}}" name="wheelcapvalue" id="wheelcapvalue" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if($errors->any())
                                            <span>{{$errors->first()}}</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox" @if ($car->settools->jackhandle)  checked @endif name="jackhandle" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jack Handle</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input @if ($car->settools->sparetire)  checked @endif  id="default-checkbox" name="sparetire" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Spare Tire</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input @if ($car->settools->openwrench)  checked @endif id="default-checkbox" name="openwrench" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Open Wrench</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox" @if ($car->settools->antena)  checked @endif type="checkbox" name="atena" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Atena</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input name="towhook" id="default-checkbox" @if ($car->settools->towhook)  checked @endif type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tow Hook</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input name="matting" id="default-checkbox" @if ($car->settools->mating)  checked @endif type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mating</label>
                                    </div>
                                </td>
                            </tr>

                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input name="slottedscrewdriver" id="default-checkbox" @if ($car->settools->slottedscrewdriver )  checked @endif type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Slotted Screwdriver</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input name="other" id="default-checkbox" @if (!empty($car->settools->other))  checked @endif type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other</label>
                                    </div>
                                </td>
                                <td  class="px-6 py-4">
                                    <div class="flex items-center mr-4">
                                        <input type="number" placeholder="qtty" value="{{$car->settools->other}}" name="othervalue" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if($errors->any())
                                            <span>{{$errors->first()}}</span>
                                        @endif
                                    </div>
                                </td>

                            </tr>

                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input name="phillipsscewdriver" @if ($car->settools->philipsscrewdriver)  checked @endif id="default-checkbox" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phillips Screwdriver</label>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="px-6 py-4">
                                    <x-primary-button id="edittoolbutton">Update</x-primary-button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            @else
                <form method="POST" action="{{URL('set-tool/'.$car->id)}}">
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
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Directions::
                                </th>
                                <td class="px-6 py-4">
                                    <input checked disabled id="default-checkbox" type="checkbox" name="dents" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    Check the corresponding box if the car have that tool and
                                </td>
                                <td class="px-6 py-4">

                                    <input disabled id="default-checkbox" type="checkbox" name="dents" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    leave it blank if the car does not have that tool.

                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox"
                                        checked
                                        name="toolbag" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tool Bag</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox"
                                        checked
                                        name="4wheels"  type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">4 Weels</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox"
                                        checked
                                        name="tirewrench" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tire Wrench</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox"
                                        checked
                                        name="cigarettelighter" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cigarette Lighter</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox"
                                        checked
                                        name="jack" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jack</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox"
                                        checked
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
                                        checked
                                        name="jackhandle" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jack Handle</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox"
                                        checked
                                        name="sparetire" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Spare Tire</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox"
                                        checked
                                        name="openwrench" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Open Wrench</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox"
                                        checked
                                        type="checkbox" name="atena" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Atena</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input name="towhook"
                                        checked
                                        id="default-checkbox" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tow Hook</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input name="matting"
                                        checked
                                        id="default-checkbox" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Matting</label>
                                    </div>
                                </td>
                            </tr>

                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input
                                        checked
                                        name="slottedscrewdriver" id="default-checkbox" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Slotted Screwdriver</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input name="other"
                                        checked
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
                                        checked
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
            @endif




        @endif
        </div>
    </div>
</x-app-layout>
