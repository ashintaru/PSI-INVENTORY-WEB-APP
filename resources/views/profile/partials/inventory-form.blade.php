@if (!is_null($car))
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
                        passed
                    </td>

                    <td class="px-6 py-4">
                        passed
                    </td>
                </tr>
            </tbody>
         </table>
            @if ($car->havebeenpassed)
            edit
            @else
                <x-primary-button>{{ __('Approved') }}</x-primary-button>
            @endif
    </form>
@endif
