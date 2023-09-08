<section>
    @if (!is_null($tools))
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                        LOOSE ITEM'S
                    </th>
                    <td class="px-6 flex flex-row-reverse py-4 ">

                        <button
                            id="edit-car"
                            data-modal-target="edit-loose-modal" data-modal-toggle="edit-loose-modal"
                            data-tooltip-target="view-button"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <x-edit1_icon></x-edit1_icon>
                        </button>
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
                            @if ($tools->ownermanual )
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
                            @if ($tools->warantybooklet)
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
                            <label for="red-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$tools->key}}</label>
                        </div>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                        REMOTE CONTROL
                    </th>
                    <td class="px-6 py-4">
                        <div class="flex items-center mr-4">
                            @if ($tools->remotecontrol)
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
                            <label for="red-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$tools->others}}</label>
                        </div>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="px-6 py-4">
                        <label for="red-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date Updated ::  {{ Carbon\Carbon::parse($tools->updated_at)->format('M d Y') }}</label>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

  <!-- Modal toggle -->

  <!-- Main modal -->
  <div id="edit-loose-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Terms of Service
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-loose-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-6 space-y-6">
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
          </div>
      </div>
  </div>

</section>
