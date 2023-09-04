@if (!is_null($car))
    @if ($car->havebeenchecked)
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
                    @if($car->havebeenpassed==1) @checked(true) @endif
                    @disabled(true)
                    id="default-radio"  type="radio" value="1" class="status w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Passed</label>
                </td>
                <td class="px-6 py-4">
                    <input name="status"
                    @if($car->havebeenpassed==0) @checked(true) @endif
                    @disabled(true)
                    id="default-radio" type="radio" value="0" class="status w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Failed</label>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4">
                    <a href="{{URL('/edit-car-status'."/".$car->vehicleidno)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
    @else
        <form method="POST" action="{{URL('approved-inventory/'.$car->vehicleidno)}}" class="">
            @csrf
            @method('PUT')
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
