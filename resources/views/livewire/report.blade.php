<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>
    <div class="py-1 flex justify-around">
        <div class="inline-flex items-center gap-2">
            <div class="mb-6">
                <input wire:model="datefrom" type="date" id="date-from" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            --
            <div class="mb-6">
                <input wire:model="dateto" type="date" id="date-to" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <select wire:model="action">
                <option value="1">Recieved</option>
                <option value="released">Released</option>
                <option value="invoice">Invoice</option>
                <option value="stored">Stored</option>
                <option value="recieved">Recieved</option>
            </select>
            <button wire:click="fetchData">
                check
            </button>
            @if (isset($data))
                <button wire:click="fetchData">
                    print PDF
                </button>
            @endif
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class=" px-6 py-3">
                    VIN
                </th>
                <th scope="col" class="px-6 py-3">
                    Engine no.
                </th>
                <th scope="col" class="px-6 py-3">
                    CS no
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Client
                </th>
                <th scope="col" class="px-6 py-3">
                    Date / Time in
                </th>
                <th scope="col" class="px-6 py-3">
                    Recieved By
                </th>
                <th scope="col" class="px-6 py-3">
                    Blockings
                </th>
                <th scope="col" class="px-6 py-3">
                    Invoice Blocking
                </th>
                <th scope="col" class="px-6 py-3">
                    Moved By
                </th>
            </tr>
        </thead>
        <tbody>
            @if (isset($data))
                @foreach($data as $car)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="w-4 p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{URL('unit/'.$car->id)}}">
                                {{$car->vehicleidno}}
                            </a>
                        </th>
                        <td class="w-4 p-4">
                            {{$car->engineno}}
                        </td>
                        <td class="w-4 p-4">
                            {{$car->csno}}
                        </td>
                        <td class="w-4 p-4">
                            {{$car->modeldescription}}
                        </td>
                        <td class="w-4 p-4">
                            {{$car->client->clientName}}
                        </td>
                        <td class="w-4 p-4">
                            {{$car->dateIn}}
                        </td>
                        <td class="w-4 p-4">
                            {{$car->recieveBy}}
                        </td>
                        <td class="w-4 p-4">
                            @if ($car->blockings)
                                {{$car->blocking->bloackname}}
                            @else
                                ...
                            @endif
                        </td>
                        <td class="w-4 p-4 whitespace-nowrap">
                            @if ($car->invoiceBlock)
                                {{$car->invblocking->bloackname}}
                            @else
                                ---
                            @endif
                        </td>
                        <td class="w-4 p-4">
                            @if ($car->movedBy)
                                {{$car->movedBy}}
                            @else
                                ---
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
