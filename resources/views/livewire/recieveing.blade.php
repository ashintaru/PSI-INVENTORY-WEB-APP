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
                <span class="text-sm text-center">
                    @if ($blockId)
                        Selected - {{$blockId}}
                    @endif
                </span>
            </div>
            <div class="w-1/8 p-3">
                <x-input-label for="recieveby" :value="__('Received By')" />
                <x-text-input wire:model="recievedBy" id="recieveby" class="block mt-1 w-full" type="text" name="recievedBy" value="{{$recievedBy}}" required autocomplete="username" />
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
                    <label for="setTools" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Set Tools</label>
                    <textarea wire:model="setTools" id="setTools" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                    @if ($status == 2)
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">All Goods</label>
                        </div>
                    @endif
                </div>
                <div class="w-1/8 p-3">
                    <label for="LooseItem" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Loose Items</label>
                    <textarea wire:model="looseItems" id="LooseItem" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                    @if ($status == 2)
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">All Goods</label>
                        </div>
                    @endif
                </div>
                <div class="w-1/8 p-3">
                    <label for="Damage Findings" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Damage Findings</label>
                    <textarea wire:model="damage" id="Damage Findings" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                    @if ($status == 2)
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">All Goods</label>
                        </div>
                    @endif
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

