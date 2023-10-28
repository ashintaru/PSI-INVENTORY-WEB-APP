<div wire:poll>
    <form method="POST" class="" action="{{ URL('create-account') }}">
        <!-- Email Address -->
        <div class="flex justify-center">
           <div class="w-1/8 p-3">
                <x-input-label for="vin" :value="__('Vin')" />
                <x-text-input :disabled="true" id="vin" class="block mt-1 w-full" type="text" name="vin" value="{{$vehicleidno}}" required autocomplete="username" />
            </div>
            <div class="p-3">
                <x-input-label for="block" :value="__('Blocks')" />
                @livewire('blocks')
            </div>
            <div class=" p-3">
                <x-input-label for="Blockings" :value="__('Blockings')" />
                @livewire('blockings')
            </div>
            <div class="w-1/8 p-3">
                <x-input-label for="vin" :value="__('Recieved By')" />
                <x-text-input wire:model="recievedBy" id="recieveby" class="block mt-1 w-full" type="text" name="vin" value="{{$recievedBy}}" required autocomplete="username" />
            </div>
            <div class="w-1/8 p-3">
                <x-input-label for="vin" :value="__('Status')" />
                <div class="flex gap-2 justify-center">
                    <div class="flex items-center">
                        <input wire:model="status" id="bordered-checkbox-1" type="radio" value="1" name="bordered-checkbox" class="status w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="bordered-checkbox-1" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Good</label>
                    </div>
                    <div class="flex items-center">
                        <input wire:model="status" id="bordered-checkbox-2" type="radio" value="2" name="bordered-checkbox" class="status w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="bordered-checkbox-1" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Good but..</label>
                    </div>
                    <div class="flex items-center">
                        <input wire:model="status" id="bordered-checkbox-3" type="radio" value="3" name="bordered-checkbox" class="status w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="bordered-checkbox-1" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Default radio</label>
                    </div>
                </div>
            </div>
            <button wire:click="update" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                  </svg>
              </button>
        </div>
        @if ($status == 2 || $status == 3)
            <div class="flex justify-center">
                <div class="w-1/8 p-3">
                    <x-input-label for="set-tools" :value="__('Tools')" />
                    <x-text-input :disabled="true" id="set-tools" class="block mt-1 w-full" type="text" name="vin" value="{{$vehicleidno}}" required autocomplete="username" />

                </div>
                <div class="w-1/8 p-3">
                    <x-input-label for="loose-Item" :value="__('Loose Item')" />
                    <x-text-input :disabled="true" id="loose-Item" class="block mt-1 w-full" type="text" name="vin" value="{{$vehicleidno}}" required autocomplete="username" />
                </div>
                <div class="w-1/8 p-3">
                    <x-input-label for="damage" :value="__('Damage')" />
                    <x-text-input :disabled="true" id="damage" class="block mt-1 w-full" type="text" name="vin" value="{{$vehicleidno}}" required autocomplete="username" />
                </div>
            </div>
        @else

        @endif
    </form>
    <div class="flex justify-evenly">
        <div class="">
            @livewire('unit-recieve')
        </div>
        <div>
            @livewire('batchingg')
        </div>
    </div>

    <x-toast />

</div>

