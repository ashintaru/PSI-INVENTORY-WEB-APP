<x-app-layout>
    @if (!is_null($car))
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                @include('carprofile.profile.profile')
            </div>fi
        </div>
        {{-- @if ($car->status->hasloosetool==0)
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
        @endif --}}
        {{-- @if ($car->status->hassettool==0)
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
    --}}
        <?php
            $index = 1;
        ?>
        {{--
       @if (!is_null($car->logs))
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    @include('carprofile.logs.tablelogs',['logs'=>$car->logs,'index'=>$index])
                </div>
            </div>

        @endif --}}
    @endif

</x-app-layout>
