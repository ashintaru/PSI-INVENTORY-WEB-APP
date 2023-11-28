<div class="p-2">
    <button wire:click="test"  type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Good with Findings
    </button>
    <div class="flex justify-evenly gap-3">
        <form class="p-4 bg-slate-100 w-full" >
            <p  class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                Vehicle ID No {{$vehicleidno}}
            </p>
            <div class="flex justify-start">
                <div class="w-full p-3">
                    <input onfocus="this.value=''" wire:model="recievedBy" placeholder="Received by who?" id="recievedBy" class="block w-full p-3 pl-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Vehicle id No, Csno...">
                    <span class="text-xs text-red-700" >@error('recievedBy') {{ $message }} @enderror</span>
                </div>
                <div class="w-full p-3">
                    @livewire('siteselection')
                </div>
                <div class="w-full p-3">
                    @livewire('blocks')
                </div>
                <div class="w-full p-3">
                     <select wire:model="blockings" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        @if ($selectedBlockings)
                            <option value="">....</option>
                            @foreach ($selectedBlockings as $b)
                                <option value="{{$b->id}}">{{$b->bloackname}}</option>
                            @endforeach
                        @else
                            <option  value="">blockings</option>
                        @endif
                    </select>
                    <span class="text-xs text-red-700" >@error('blockings') {{ $message }} @enderror</span>
                </div>
            </div>
            <div class="flex flex-col justify-start gap-1" >
                <div class="flex flex-col w-full gap-3">
                    <textarea onfocus="this.value=''" wire:model="findings" id="findings"  rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </textarea>
                    <span class="text-xs text-red-700" >@error('findings') {{ $message }} @enderror</span>
                </div>
                <div class=" flex justify-between">
                    <div class="flex">
                        <button wire:click.prevent="goods" type="button"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Good
                        </button>
                        <button wire:click="goodswithfindings"  type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Good with Findings
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <div class="p-4 bg-slate-100 w-full gap-1 ">
            <div class="flex flex-col py-2">
                <p  class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    Vehicle ID No {{$vehicleidno}}
                </p>
                <span class="text-xs text-red-700" >@error('vehicleidno') {{ $message }} @enderror</span>
            </div>
            <div class="flex justify-start py-2">
                <p class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    Recieved By: {{$recievedBy}}
                </p>
            </div>
            <div class="flex justify-start py-2">
                <p class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                        Finding/s : {{$findings}}
                </p>
            </div>
            <div class="flex justify-start py-2">
                <p class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                        Blocking ID : {{$blockings}}
                </p>
            </div>
        </div>
    </div>
    <div class="flex justify-evenly">
        <div class="py-3">
            @livewire('unit-recieve')
        </div>
        <div class="py-3">
            @livewire('batchingg')
        </div>
    </div>
    <x-toast />
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('post-created', (event) => {
                document.getElementById('recievedBy').value = ' ';
                document.getElementById('findings').value = ' ' ;
            });
        });
    </script>
</div>
