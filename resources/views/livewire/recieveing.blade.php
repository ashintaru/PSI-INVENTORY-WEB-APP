<div wire:poll>
    <form method="POST" >
        <!-- Email Address -->
        <div class="flex justify-center">
           <div class="w-1/8 p-3">
                <x-input-label for="vin" :value="__('Vin')" />
                <x-text-input :disabled="true" id="vin" class="block mt-1 w-full" type="text" name="vin" value="{{$vehicleidno}}" required autocomplete="username" />
                <span class="text-xs text-red-700" >@error('vehicleidno') {{ $message }} @enderror</span>
            </div>
            <div class="p-3">
                <x-input-label for="block" :value="__('Blocks')" />
                {{-- <select  wire:model="selectedBlocks" name="blocks" class="block mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    @if ($blocks)
                        <option value="">....</option>
                        @foreach ($blocks as $b)
                            <option  data-url="" value="{{$b->id}}">{{$b->blockname}}</option>
                        @endforeach
                    @else
                        <option  value="">Ask the admin for the blcokings</option>
                    @endif
                </select> --}}
                @livewire('blocks')
            </div>
            <div class=" p-3">
                <x-input-label for="Blockings" :value="__('Blockings')" />
                <select wire:model="blockings"  name="blocks" class="block mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    @if ($selectedBlockings)
                        <option value="">....</option>
                        @foreach ($selectedBlockings as $b)
                            <option value="{{$b->id}}">{{$b->bloackname}}</option>
                        @endforeach
                    @else
                        <option  value="">Ask the admin for the blcokings</option>
                    @endif
                </select>
                <span class="text-xs text-red-700" >@error('blockings') {{ $message }} @enderror</span>
            </div>
            <div class="w-1/8 p-3">
                <x-input-label for="recieveby" :value="__('Received By')" />
                <x-text-input wire:model="recievedBy" id="recieveby" class="block mt-1 w-full" type="text" name="recievedBy" value="{{$recievedBy}}" required autocomplete="username" />
                <span class="text-xs text-red-700" >@error('recievedBy') {{ $message }} @enderror</span>

            </div>
            <div class="w-1/8 p-3">
                <x-input-label for="vin" :value="__('inspection remarks')" />
                <div class="flex gap-2 justify-center">
                    <button wire:click="goods" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Good</button>
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Good with Findings</button>
                </div>
            </div>
        </div>
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
<script>
    document.addEventListener('livewire:initialized', () => {
       @this.on('post-created', (event) => {
           alert('click me');
       });
    });
</script>

