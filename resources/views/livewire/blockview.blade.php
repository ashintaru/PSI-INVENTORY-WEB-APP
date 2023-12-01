<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Block/s Management') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex gap-2">
                <x-primary-button wire:click="toogleCreateBlock">
                    Create Blocks
                </x-primary-button>
                <x-primary-button wire:click="toogleCreateBlocking">
                    Create Blocking/s
                </x-primary-button>
            </div>
        </div>
    </div>

    @if ($isCreatingBlock)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="inline-flex text-center gap-2">
                    <div>
                        <label for="block" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Block Name</label>
                        <input wire:model="blockName" type="text" id="block" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <x-primary-button wire:click="createBlock">
                        Submit
                    </x-primary-button>
                </div>
            </div>
        </div>
    @endif

    @if ($isCreatingBlockings)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="inline-flex text-center gap-2">
                    <div>
                        <label for="block" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Block Name</label>
                        <select wire:model="selectedBlock" type="text" id="block" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="">----</option>
                                @if (isset($blocks))
                                    @foreach ($blocks as $block )
                                        <option value="{{$block->id}}">{{$block->blockname}}</option>
                                    @endforeach
                                @endif
                        </select>
                    </div>
                    <div>
                        <label for="blockings" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blocking Name</label>
                        <input wire:model="blockingName" type="text" id="blockings" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <x-primary-button wire:click="createBlockings">
                        Submit
                    </x-primary-button>
                </div>
            </div>
        </div>
    @endif


    @if ($editedBlock && $isEditingBlock)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="inline-flex text-center gap-2">
                    <div>
                        <label for="block" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Update Block Name</label>
                        <input wire:model="updateBlockName" type="text" id="block" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <x-primary-button wire:click="updateBlock">
                        Update
                    </x-primary-button>
                </div>
            </div>
        </div>
    @endif





    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Block Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Blockings Total Count
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date Created
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($blocks)
                        @foreach ($blocks as $d )
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$d->id}}
                                    </th>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$d->blockname}}
                                    </td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{count($d->blockings)}}
                                    </td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$d->updated_at}}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{URL('blocking-list/'.$d->id)}}" class=" inline-flex items-center px-4 py-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            View
                                        </a>
                                        <x-primary-button wire:click="editBlock({{$d->id}})">
                                            Edit
                                        </x-primary-button>
                                        <x-secondary-button wire:click="createBlockings">
                                            Delete
                                        </x-secondary-button>
                                    </td>
                            </tr>
                        @endforeach
                    @else

                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Blocking modal -->
    {{-- <div id="createNewBlockingModals" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Blocking\'s Name') }}
                    </h2>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="createNewBlockingModals">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <section>
                        <form method="POST" action="{{URL('import-blockings')}}" class="mt-0 space-y-1" enctype="multipart/form-data">
                            @csrf
                            <div class="flex-col gap-3">
                                @if($blocks)
                                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a Blocks</label>
                                    <select required id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="block">
                                        @foreach ($blocks as $block )
                                            <option value="{{$block->id}}">BLOCK-{{$block->blockname}}</option>
                                        @endforeach
                                    </select>
                                @else
                                    ....
                                @endif
                                <input type="file" name="file"  class="block w-1/2 px-5 py-2.5 mr-2 mb-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <button class="flex justify-center focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
                                @if (session('status') === 'password-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
                <!-- Modal footer -->
            </div>
        </div>
    </div>


    <!-- Block modal -->
    <div id="createNewBlockModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Create New Block
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="createNewBlockModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Block Name') }}
                            </h2>
                            <p class="mt-1 font-mono text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Creating new block\'s .. ') }}
                            </p>
                        </header>
                        <form method="POST" action="{{URL('savedblock')}}" class="mt-0 space-y-1">
                            @csrf
                            <div class="">
                                <input type="text" id="default-search" name="blocks" class="block w-1/2 px-5 py-2.5 mr-2 mb-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <button class="flex justify-center focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
                                @if (session('status') === 'password-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
                <!-- Modal footer -->
            </div>
        </div>
    </div>



    <!-- Modal toggle -->
    <!-- Main modal -->
    <div id="invoice-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Create new Invoice Blockings
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="invoice-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Blocking Name') }}
                            </h2>
                            <p class="mt-1 font-mono text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Creating new blocking\'s for Invoice .. ') }}
                            </p>
                        </header>
                        <form method="POST" action="{{URL('saved-invoice-blocking')}}" class="mt-0 space-y-1">
                            @csrf
                            <div class="">
                                <input type="text" id="default-search" name="blocks" class="block w-1/2 px-5 py-2.5 mr-2 mb-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <button class="flex justify-center focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
                                @if (session('status') === 'password-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
                <!-- Modal footer -->
            </div>
        </div>
    </div> --}}

    {{-- Nothing in the world is as soft and yielding as water. --}}
</div>
