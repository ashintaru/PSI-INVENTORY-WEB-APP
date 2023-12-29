<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Instalation Tool/s Configuration') }}
        </h2>
    </x-slot>
    <div class="py-2 flex justify-evenly">
        <div class="flex flex-col">
            <div class="flex flex-col justify-center">
                <div class="p-2">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                    <select wire:click="fetchModel" wire:model="clientTag" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @if (isset($clients))
                            <option value="" selected>Select Client</option>
                            @foreach ($clients as $client )
                                <option value="{{$client->id}}">{{$client->clientName}}</option>
                            @endforeach
                        @else
                            <option value="" selected>No Client</option>
                        @endif
                    </select>

                </div>
                <div class="p-2">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @if (isset($modelList))
                            <option value="" selected>Select Model</option>
                            @foreach ($modelList as $model )
                                <option value="{{$model->modeldescription}}">{{$model->modeldescription}}</option>
                            @endforeach
                        @else
                            <option value="" selected>No Model Available</option>
                        @endif
                    </select>
                </div>
                <x-text-input wire:model="data" />
                @if(isset($tools))
                    @foreach ($tools as $index => $data )
                        <div id="div-{{$index}}" class="inline-flex justify-start">
                            <span id="span{{$index}}">{{$data}}</span>
                            <x-primary-button id="btn-delete-{{$index}}"  wire:click="removeTool({{$index}})">
                                Remove
                            </x-primary-button>
                        </div>
                    @endforeach
                @endif
                <x-primary-button wire:click="addTool">
                    ADD
                </x-primary-button>
                <x-primary-button wire:click="submit">
                    send
                </x-primary-button>
                <x-primary-button wire:click="convert">
                    convert
                </x-primary-button>
            </div>
        </div>

    </div>
</div>
