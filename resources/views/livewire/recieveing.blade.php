<div class="p-2">
    <form class="p-4 border-solid border-2 border-indigo-600 " method="POST" >
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
                        <option  value="">select a block</option>
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
                    <button wire:click="goods" id="btn-goods" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Good</button>
                    <button wire:click="triggerfinding" type="button" id="btn-findings" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Good with Findings</button>
                </div>
            </div>
        </div>
        @if ($showfindings)
            <div class="flex flex-col justify-center" id="findings">
                <div class="flex flex-col w-full p-2">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Findings</label>
                    <textarea wire:model.defer="findings" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">
                    </textarea>
                    <span class="text-xs text-red-700" >@error('findings') {{ $message }} @enderror</span>
                </div>
                <button wire:click="goodswithfindings" type="button" id="btn-findings" class=" flex justify-start w-1/12 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
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
<script>
</script>

