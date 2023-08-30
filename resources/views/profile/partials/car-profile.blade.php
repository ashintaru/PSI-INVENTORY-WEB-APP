<section>
    @if (!is_null($car))
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Car Detail's
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            CS #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{$car->csno}}
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Status
                        </th>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                            Model Code
                        </th>
                        <td class="px-6 py-4">
                            {{$car->mmpcmodelcode}}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                            Inventory
                        </th>
                        <td class="px-6 py-4">
                            @if ( $car->havebeenstored == 0)
                                False
                            @else
                                True
                            @endif
                         </td>
                        
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                            VIN
                        </th>
                        <td class="px-6 py-4">
                            {{$car->vehicleidno}}
                        </td>
                        
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Have Been Checked
                        </th>
                        <th scope="col" class="px-6 py-3">
                            @if ( $car->havebeenchecked == 0)
                                False
                            @else
                                True
                            @endif
                        </th>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                            Engine No.
                        </th>
                        <td class="px-6 py-4">
                            {{$car->mmpcmodelcode}}
                        </td>
                        
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Have Been Passed
                        </th>
                        <th scope="col" class="px-6 py-3">
                            @if ( $car->havebeenpassed == 0)
                                False
                            @else
                                True
                            @endif
                        </th>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                            Color
                        </th>
                        <td class="px-6 py-4">
                            {{$car->exteriorcolor}}
                        </td>

                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Realeased
                        </th>
                        <th scope="col" class="px-6 py-3">
                            @if ( $car->havebeenreleased == 0)
                                False
                            @else
                                True
                            @endif
                        </th>

                    </tr>             
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                        
                        </th>
                        <td class="px-6 py-4">
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                            Date Update
                        </th>
                        <td class="px-6 py-4">
                            
                            {{ Carbon\Carbon::parse($car->updated_at)->format('M d Y') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @else
        <p> Empyty Value ....</p>
    @endif
</section>