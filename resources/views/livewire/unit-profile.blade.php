<div>
    <a href="{{ url()->previous() }}" class="inline-flex items-center  gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path d="M7.712 4.819A1.5 1.5 0 0110 6.095v2.973c.104-.131.234-.248.389-.344l6.323-3.905A1.5 1.5 0 0119 6.095v7.81a1.5 1.5 0 01-2.288 1.277l-6.323-3.905a1.505 1.505 0 01-.389-.344v2.973a1.5 1.5 0 01-2.288 1.276l-6.323-3.905a1.5 1.5 0 010-2.553L7.712 4.82z" />
        </svg>
        Back
    </a>

    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    @if (isset($car))
        <div class="flex justify-evenly">
            <div class="w-2/3  sm:px-6 lg:px-8 space-y-6">

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="inline-flex items-center w-full justify-between">
                        <p wire:model="vehicleidno" class="inline-flex items-center text-gray-500">
                            Recieving History
                        </p>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Date/Time In
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date Encode
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Recieved By
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @if (isset($car->dateIn))
                                            {{Carbon\Carbon::parse($car->dateIn)->format('M-d-Y h:i a')}}
                                        @endif
                                    </th>
                                    <td class="px-6 py-4">
                                        @if (isset($car->dateIn))
                                            {{Carbon\Carbon::parse($car->dateEncode)->format('M-d-Y ')}}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$car->recieveBy}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <p wire:model="vehicleidno" class="inline-flex items-center text-gray-500">
                        Unit Data
                    </p>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            @if (isset($car))
                                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                            Vehicle Id No.
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            {{$car->vehicleidno}}
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                            CS-No
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            {{$car->csno}}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            Engine No
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$car->engineno}}
                                        </td>
                                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                            Production No
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$car->productioncbunumber}}
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            Biling Date
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$car->bilingdate}}
                                        </td>
                                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                            Model Code
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$car->mmpcmodelcode}}
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            Model Year
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$car->mmpcmodelyear}}
                                        </td>
                                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                            Caption Code
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$car->mmpcoptioncode}}
                                        </td>
                                    </tr>
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            Exterior Color Code
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$car->extcolorcode}}
                                        </td>
                                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                            Exterior Color
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$car->exteriorcolor}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            Model Description
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$car->modeldescription}}
                                        </td>
                                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                            Vehicle Stock-Yard
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$car->vehiclestockyard}}
                                        </td>
                                    </tr>
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>

                <div  id="findings" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="inline-flex items-center w-full justify-between">
                        <p wire:model="vehicleidno" class="inline-flex items-center text-gray-500">
                            Finding/s History
                        </p>
                        @if ($car->receive)
                            <button type="button" class="inline-flex items-center gap-1 text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
                                </svg>
                                create new finding
                            </button>
                        @endif
                    </div>
                    @if (isset($findings))
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Finding/s
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date Created
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($findings as $finding )
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">
                                            {{$finding->findings}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $finding->created_at->format('M d Y ');}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <?php echo $findings->fragment('findings')->render(); ?>
                    @endif
                    <div class="py-2">
                        {{-- @if (isset($findings))
                            {{$findings->links()}}
                        @endif --}}
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="inline-flex items-center w-full justify-between">
                        <p wire:model="vehicleidno" class="inline-flex items-center text-gray-500">
                            Blocking History
                        </p>
                    </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        From
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        to
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date Encoded
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($car->finding as $finding )
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900  dark:text-white">
                                            {{$finding->findings}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $finding->created_at->format('M d Y ');}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="inline-flex items-center w-full justify-between">
                        <p wire:model="vehicleidno" class="inline-flex items-center text-gray-500">
                            Released History
                        </p>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Date Released
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Released By
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Delear
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Remaark
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$car->dateReleased}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$car->releasedBy}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$car->dealer}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$car->remark}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="sticky">
                <ol class="relative text-gray-500 border-s border-gray-200 dark:border-gray-700 dark:text-gray-400">
                    @if ($car->receive)
                        <li class="mb-10 ms-6">
                            <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                </svg>
                            </span>
                            <h3 class="font-medium leading-tight">Recieved</h3>
                            <span class="text-xs">
                                {{Carbon\Carbon::parse($car->dateIn)->format('M-d-Y h:i a')}}
                            </span>
                        </li>
                    @endif
                    @if ($car->inventory)
                        <li class="mb-10 ms-6">
                            <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                </svg>
                            </span>
                            <h3 class="font-medium leading-tight">Stored</h3>
                        </li>
                    @endif
                    @if ($car->invoice)
                        <li class="mb-10 ms-6">
                            <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                </svg>
                            </span>
                            <h3 class="font-medium leading-tight">Invoiced</h3>
                            <ul>
                                <li class="text-xs inline-flex items-center">
                                    @if ($car->invoiceBlock != null)
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                      </svg>
                                        Invoice Blocking have set
                                    @else
                                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                       </svg>
                                        Invoice Blockings not set
                                    @endif
                                </li>
                            </ul>
                        </li>
                    @endif
                </ol>
            </div>
        </div>
    @endif




</div>