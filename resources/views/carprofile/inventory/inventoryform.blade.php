@if (!is_null($car))
    @if ($car->status->havebeenchecked)
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th th scope="col" class="px-3 py-3">
                        Car Status
                    </th>
                    <th></th>
                    <th scope="col" class="px-6 py-3 flex flex-row-reverse">
                            <button
                            id="edit-status"
                            data-modal-target="statusmodal" data-modal-toggle="statusmodal"
                            data-tooltip-target="view-button"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <x-edit1_icon></x-edit1_icon>
                            </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Status
                    </th>
                    <td class="px-6 py-4">
                        <input name="status"
                        @if($car->status->havebeenpassed==1) @checked(true) @endif
                        @disabled(true)
                        id="default-radio"  type="radio" value="1" class="status w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Passed</label>
                    </td>
                    <td class="px-6 py-4">
                        <input name="status"
                        @if($car->status->havebeenpassed==0) @checked(true) @endif
                        @disabled(true)
                        id="default-radio" type="radio" value="0" class="status w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Failed</label>
                    </td>
                </tr>
            </tbody>
        </table>
    <!-- Main modal -->
        <div id="statusmodal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Terms of Service
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="statusmodal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <form method="POST" action="{{URL('update-inventory/'.$car->vehicleidno)}}" class="">
                            @csrf
                            @method('PATCH')
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th th scope="col" class="px-3 py-3">
                                            Car Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Status
                                        </th>
                                        <td class="px-6 py-4">
                                            <input name="status"
                                            @if($car->status->havebeenpassed == 1) checked @endif
                                            id="default-radio" type="radio" value="1" class="status w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Passed</label>
                                        </td>
                                        <td class="px-6 py-4">
                                            <input name="status"
                                            @if($car->status->havebeenpassed == 0) checked @endif
                                            id="default-radio" type="radio" value="0" class="status w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Failed</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  class="px-6 py-4">
                                            <x-primary-button>{{ __('Approved') }}</x-primary-button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    @else
        <form method="POST" action="{{URL('approved-inventory/'.$car->vehicleidno)}}" class="">
            @csrf
            @method('PATCH')
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th th scope="col" class="px-3 py-3">
                            Car Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Status
                        </th>
                        <td class="px-6 py-4">
                            <input name="status"
                            @if(old('other')) checked @endif
                            id="default-radio" type="radio" value="1" class="status w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Passed</label>
                        </td>
                        <td class="px-6 py-4">
                            <input name="status"
                            @if(old('other')) checked @endif
                            id="default-radio" type="radio" value="0" class="status w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Failed</label>
                        </td>
                    </tr>
                    @if($errors->has('status'))
                        <div class="error">{{ $errors->first('status') }}</div>
                    @endif
                </tbody>
            </table>
            <x-primary-button>{{ __('Approved') }}</x-primary-button>
        </form>
    @endif
@endif
