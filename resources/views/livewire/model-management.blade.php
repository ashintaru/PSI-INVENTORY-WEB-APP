<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if (isset($client))
                {{$client->clientName}}
            @endif
        </h2>
    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="inline-flex text-center gap-2">
                <div>
                    <input wire:model="modelName" type="text" id="site" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Model Name">
                    <span class="text-xs text-red-700" >@error('modelName') {{ $message }} @enderror</span>
                </div>
                <x-primary-button wire:click="create" type="button">
                    Create
                </x-primary-button>
            </div>
        </div>
    </div>
    <div class="py-1 flex justify-between">
        <div class="w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Model Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($models))
                        @foreach ($models as $model )
                            <tr>
                                <td scope="col" class="px-6 py-3">
                                    {{$model->modelName}}
                                </td>
                                <td scope="col" class="px-6 py-3">
                                    add Instalation tools
                                </td>
                            </tr>
                        @endforeach

                    @endif
                </tbody>
            </table>
        </div>
        <div class="w-full mx-auto sm:px-6 lg:px-8 space-y-6 flex-row">
            <div class="inline-flex text-center gap-2">
                <div>
                    <form>
                        <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                            <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                                <label for="comment" class="sr-only">Your comment</label>
                                <textarea wire:model="strinfy" id="comment" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..." required></textarea>
                            </div>
                            <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                                <button wire:click="preview" type="button" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
                                    </svg>
                                    Preview
                                </button>
                                <div class="flex ps-0 space-x-1 rtl:space-x-reverse sm:ps-2">
                                    <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                     </form>
                     <p class="ms-auto text-xs text-gray-500 dark:text-gray-400">Remember, contributions to this topic should follow our <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">Community Guidelines</a>.</p>
                    <span class="text-xs text-red-700" >@error('clientName') {{ $message }} @enderror</span>
                </div>

            </div>
            <div>
                @if (isset($list))
                    @foreach ($list as $key)
                    <div class="flex items-center mb-4">
                        <input disabled id="disabled-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="disabled-checkbox" class="ms-2 text-sm font-medium text-gray-400 dark:text-gray-500">{{$key}}</label>
                    </div>
                    @endforeach
                @endif
            </div>

        </div>
    </div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <x-toast/>
</div>
