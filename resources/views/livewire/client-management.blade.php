<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Client') }}
        </h2>
    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="inline-flex text-center gap-2">
                <div>
                    <input wire:model="clientName" type="text" id="site" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Client Name">
                    <span class="text-xs text-red-700" >@error('clientName') {{ $message }} @enderror</span>
                </div>
                <x-primary-button wire:click="submit" type="button">
                    Create
                </x-primary-button>
            </div>
        </div>
    </div>
    {{-- @if ($clientid && $isEditingSite)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="inline-flex text-center gap-2">
                    <div>
                        <label for="block" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Update Site Name</label>
                        <input wire:model="siteNameEdit" type="text" id="block" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <x-primary-button wire:click="updateSite">
                        Update
                    </x-primary-button>
                </div>
            </div>
        </div>
    @endif --}}

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Model Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date Created
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date Updated
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($clients))
                        @foreach ($clients as $client )
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$client->clientName}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$client->created_at}}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{$client->updated_at}}
                                </td>
                                <td class="px-6 py-4 gap-2 whitespace-nowrap">
                                    <a wire:navigate href="{{URL('model_management/'.$client->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                    <x-primary-button wire:click="editSite({{$client->id}})">
                                        Edit
                                    </x-primary-button>
                                    <x-secondary-button >
                                        Delete
                                    </x-secondary-button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <x-toast/>
</div>
