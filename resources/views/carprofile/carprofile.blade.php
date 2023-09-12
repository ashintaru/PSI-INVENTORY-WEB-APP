<x-app-layout>
    <x-alert-error></x-alert-error>
    <x-alert-success></x-alert-success>
    @if (!is_null($car))
        @if ($car->status->havebeenchecked)
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{URL('inventory')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                <x-inv_icon></x-inv_icon>
                                <span class="flex-1 ml-3 whitespace-nowrap text-base font-extrabold">Inventory</span>
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap text-base font-mono">{{$car->vehicleidno}}</span>
                            </div>
                        </li>
                        </ol>
                    </nav>
                </div>
            </div>
         @endif
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                @include('carprofile.profile.profile',['car'=>$car])
            </div>
        </div>
        @if ($car->status->hasloosetool==0)
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    @include('carprofile.looseitems.looseitemform',['carid'=>$car->vehicleidno])
                </div>
            </div>
        @else
        <div id="loosetool" class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                @include('carprofile.looseitems.tablelooseitem',['tools'=>$car->loosetools])
            </div>
        </div>
        @endif
        @if ($car->status->hassettool==0)
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    @include('carprofile.settools.settoolsform',['carid'=>$car->vehicleidno])
                </div>
            </div>
        @else
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                @include('carprofile.settools.tablesettool',['tools'=>$car->settools])
            </div>
        </div>
        @endif
        @if ($car->status->hasdamage==0)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="py-4">
                    @include('carprofile.damage.damageform',['carid'=>$car->vehicleidno])
                </div>
            </div>
        @else
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                @include('carprofile.damage.tabledamage',['damage'=>$car->damage])
            </div>
        </div>
        @endif
        @if ($car->status->havebeenstored==0)
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        @include('carprofile.inventory.inventoryform',['car'=>$car])
                    </div>
                </div>
            </div>
        @endif
        <?php
            $index = 1;
        ?>
       @if (!is_null($car->logs))
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    @include('carprofile.logs.tablelogs',['logs'=>$car->logs,'index'=>$index])
                </div>
            </div>

        @endif
    @endif

</x-app-layout>
