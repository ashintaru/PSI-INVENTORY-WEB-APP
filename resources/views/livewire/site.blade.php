<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Site Management') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="inline-flex text-center gap-2">
                <div>
                    <label for="site" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site Name</label>
                    <input wire:model="sitename" type="text" id="site" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <x-primary-button wire:click="saveSite" type="button">
                    Submit
                </x-primary-button>
            </div>
        </div>
    </div>
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Site Name
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
                    @if (isset($sites))
                        @foreach ($sites as $site )
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$site->siteName}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$site->created_at}}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{$site->updated_at}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <a href="{{URL('block-list/'.$site->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
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
