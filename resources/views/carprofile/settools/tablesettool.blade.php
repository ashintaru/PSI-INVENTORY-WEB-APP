<section>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @if (!empty($tools))
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            SET OF TOOL'S
                        </th>
                        <td></td>
                        <td class="px-6 flex flex-row-reverse py-4 ">
                            <button
                            id="edit-car"
                            data-modal-target="editsettoll" data-modal-toggle="editsettoll"
                            data-tooltip-target="view-button"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <x-edit1_icon></x-edit1_icon>
                            </button>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                @if ($tools->toolbag)
                                    <input disabled checked id="default-checkbox" name="toolbag" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tool Bag</label>
                                @else
                                    <input disabled id="default-checkbox" name="toolbag" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tool Bag</label>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                @if ($tools->wheels)
                                    <input disabled checked id="default-checkbox" name="4wheels"  type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">4 Weels</label>
                                @else
                                    <input disabled id="default-checkbox" name="4wheels"  type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">4 Weels</label>
                                @endif

                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                @if ($tools->tirewrench)
                                    <input disabled checked id="default-checkbox" name="tirewrench" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tire Wrench</label>
                                @else
                                    <input id="default-checkbox" disabled name="tirewrench" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tire Wrench</label>
                                @endif

                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                @if ($tools->cigarettelighter)
                                    <input disabled checked id="default-checkbox" name="cigarettelighter" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cigarette Lighter</label>
                                @else
                                    <input disabled id="default-checkbox" name="cigarettelighter" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cigarette Lighter</label>
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                @if ($tools->jack)
                                    <input disabled checked id="default-checkbox" name="jack" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jack</label>
                                @else
                                    <input disabled id="default-checkbox" name="jack" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jack</label>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                @if ($tools->wheelcap)
                                    <input checked disabled id="default-checkbox" name="wheelcap" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wheel Cap</label>
                                @else
                                    <input disabled id="default-checkbox" name="wheelcap" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wheel Cap</label>
                                @endif
                            </div>
                        </td>
                        <td  class="px-6 py-4">
                            <div class="flex items-center mr-4">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$tools->wheelcap}}</label>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                @if ($tools->jackhandle)
                                    <input disabled checked id="default-checkbox" name="jackhandle" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jack Handle</label>
                                @else
                                    <input disabled id="default-checkbox" name="jackhandle" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jack Handle</label>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                @if ($tools->sparetire)
                                    <input disabled checked id="default-checkbox" name="sparetire" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Spare Tire</label>
                                @else
                                    <input id="default-checkbox" name="sparetire" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Spare Tire</label>
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">

                            <div class="flex items-center mb-4">
                                @if ($tools->openwrench)
                                    <input disabled checked id="default-checkbox" name="openwrench" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Open Wrench</label>
                                @else
                                    <input disabled id="default-checkbox" name="openwrench" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Open Wrench</label>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                @if ($tools->antena)
                                    <input disabled checked id="default-checkbox" type="checkbox" name="atena" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Atena</label>
                                @else
                                    <input disabled id="default-checkbox" type="checkbox" name="atena" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Atena</label>
                                @endif

                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                @if ($tools->towhook)
                                    <input disabled checked name="towhook" id="default-checkbox" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tow Hook</label>
                                @else
                                    <input name="towhook" id="default-checkbox" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tow Hook</label>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                @if ($tools->mating)
                                    <input checked name="matting" id="default-checkbox" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Matting</label>
                                @else
                                    <input name="matting" id="default-checkbox" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Matting</label>
                                @endif
                            </div>
                        </td>
                    </tr>

                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                @if ($tools->slottedscrewdriver)
                                    <input disabled checked name="slottedscrewdriver" id="default-checkbox" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Slotted Screwdriver</label>
                                @else
                                    <input disabled name="slottedscrewdriver" id="default-checkbox" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Slotted Screwdriver</label>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                @if ($tools->other)
                                    <input disabled checked name="other" id="default-checkbox" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other</label>
                                @else
                                    <input name="other" disabled id="default-checkbox" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other</label>
                                @endif
                            </div>
                        </td>
                        <td  class="px-6 py-4">
                            <div class="flex items-center mr-4">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$tools->other}}</label>
                            </div>
                        </td>

                    </tr>

                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <div class="flex items-center mb-4">
                                @if ($tools->philipsscrewdriver)
                                    <input disabled checked name="phillipsscewdriver" id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phillips Screwdriver</label>
                                @else
                                    <input disabled name="phillipsscewdriver" id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phillips Screwdriver</label>
                                @endif

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">
                            <label for="red-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date Updated ::  {{ Carbon\Carbon::parse($tools->updated_at)->format('M d Y') }}</label>

                        </td>
                    </tr>
                </tbody>
            </table>
        @endif
    </div>


<!-- Modal toggle -->

  <!-- Main modal -->
  <div id="editsettoll" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Terms of Service
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editsettoll">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-6 space-y-6">
                <form method="POST" action="{{URL('update-set-tool/'.$tools->id)}}">
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
                                        <input @if ($tools->toolbag)  checked @endif id="default-checkbox" name="toolbag" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tool Bag</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input @if ($tools->wheels)  checked @endif id="default-checkbox" name="4wheels"  type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">4 Weels</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input @if ($tools->tirewrench)  checked @endif id="default-checkbox" name="tirewrench" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tire Wrench</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input @if ($tools->cigarettelighter)  checked @endif id="default-checkbox" name="cigarettelighter" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cigarette Lighter</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox" @if ($tools->jack)  checked @endif name="jack" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jack</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="wheelcap" @if ( !empty($tools->wheelcap))  checked @endif  name="wheelcap" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wheel Cap</label>
                                    </div>
                                </td>
                                <td  class="px-6 py-4">
                                    <div class="flex items-center mr-4">
                                        <input type="number"  placeholder="qtty" value="{{$tools->wheelcap}}" name="wheelcapvalue" id="wheelcapvalue" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if($errors->any())
                                            <span>{{$errors->first()}}</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox" @if ($tools->jackhandle)  checked @endif name="jackhandle" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jack Handle</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input @if ($tools->sparetire)  checked @endif  id="default-checkbox" name="sparetire" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Spare Tire</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input @if ($tools->openwrench)  checked @endif id="default-checkbox" name="openwrench" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Open Wrench</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox" @if ($tools->antena)  checked @endif type="checkbox" name="atena" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Atena</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input name="towhook" id="default-checkbox" @if ($tools->towhook)  checked @endif type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tow Hook</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input name="matting" id="default-checkbox" @if ($tools->mating)  checked @endif type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mating</label>
                                    </div>
                                </td>
                            </tr>

                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input name="slottedscrewdriver" id="default-checkbox" @if ($tools->slottedscrewdriver )  checked @endif type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Slotted Screwdriver</label>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input name="other" id="default-checkbox" @if (!empty($tools->other))  checked @endif type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Other</label>
                                    </div>
                                </td>
                                <td  class="px-6 py-4">
                                    <div class="flex items-center mr-4">
                                        <input type="number" placeholder="qtty" value="{{$tools->other}}" name="othervalue" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @if($errors->any())
                                            <span>{{$errors->first()}}</span>
                                        @endif
                                    </div>
                                </td>

                            </tr>

                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center mb-4">
                                        <input name="phillipsscewdriver" @if ($tools->philipsscrewdriver)  checked @endif id="default-checkbox" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phillips Screwdriver</label>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="px-6 py-4">
                                    <x-primary-button id="edittoolbutton">Submit</x-primary-button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
              </div>
              <!-- Modal footer -->
          </div>
      </div>
  </div>


  <script type="text/javascript">
    $(document).ready(function () {
        var profileform = document.getElementById("editprofile");
        var spinner = document.getElementById("spinner");
            profileform.style.display='none';

        // $('#edittoolbutton').click((event)=>{

        //     var wheelcap = $("#wheelcap");
        //     var wwheelcapvalue = $('#wheelcapvalue');

        //     if( wheelcap.val() == 1 && wheelcapvalue.val() == 0)
        //     {
        //         alert("ERROR");
        //         event.preventDefault();
        //     }
        //     // if(wheelcap.is(":checked") = true && wwheelcapvalue.val() = null){
        //     //     event.preventDefault();
        //     //     alert('pls insert data');
        //     // }
        // });

       /* When click show user */
        $('body').on('click', '#edit-car', function () {
          var userURL = $(this).data('url');
            $.get(userURL, function () {
                spinner.style.display = "block";
             }).done( () => {
                    spinner.style.display = "none";
                    profileform.style.display='block';
            }).fail(()=>console.log("error"))
       });

    });
</script>
</section>
