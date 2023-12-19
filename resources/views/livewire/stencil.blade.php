<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Stencil') }}
        </h2>
    </x-slot>

    <button wire:click="getCollection">view</button>

    <div class="flex justify-evenly">
        <div>
            @if (isset($cars))
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class=" px-6 py-3">
                                VIN
                            </th>
                            <th scope="col" class="px-6 py-3">
                                CS no
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                            @if ( !isset($cars->stencil))
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="w-4 p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <button wire:click="select({{$car->id}})" >click</button>
                                        <a href="{{URL('unit/'.$car->id)}}">
                                            {{$car->vehicleidno}}
                                        </a>
                                    </th>
                                    <td class="w-4 p-4">
                                        {{$car->csno}}
                                    </td>
                                    <td class="w-4 p-4">
                                        {{$car->modeldescription}}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @else
                table are empty.......
            @endif
        </div>
        <div>
            @if (isset($cars))
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class=" px-6 py-3">
                                VIN
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $index = 0;
                        @endphp
                        @foreach($collection as $car => $key)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="w-4 p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                       {{$key}}
                                    </th>
                                    <td>
                                        <button wire:click="removeArray({{$car}})">Remove index: {{$car}}</button>
                                    </td>
                                </tr>
                               @php
                                   $index++;
                               @endphp
                        @endforeach
                    </tbody>
                </table>
            @else
                table are empty.......
            @endif
        </div>
    </div>
    <div class="py-2">
        @if (isset($cars))
            {{$cars->links()}}
        @endif
    </div>

    <x-toast />

</div>
