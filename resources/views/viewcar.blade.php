<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Car Profile') }}
        </h2>
    </x-slot>

    @if (!is_null($car))
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    @include('profile.partials.car-profile',['car'=>$car])
                </div>
                <x-alert-error></x-alert-error>
                <x-alert-success></x-alert-success>
            </div>
            
        </div>
        
        @if ($car->havebeenstored==0)
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        @include('profile.partials.inventory-form',['carid'=>$car->vehicleidno])
                    </div>
                </div>
            </div>                   
        @endif
    @endif
  
</x-app-layout>