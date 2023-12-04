<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Block/s Management') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex gap-2">
                <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                      <li class="inline-flex items-center">
                        <a wire:navigate href="{{URL('/site')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                          <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                          </svg>
                          Site
                        </a>
                      </li>
                      <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">
                                @if (isset($site))
                                    {{$site->siteName}}
                                @else
                                    No site
                                @endif
                            </span>
                        </div>
                      </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex gap-2">
                <x-primary-button wire:click="toogleCreateBlocking">
                    Create Blocking/s
                </x-primary-button>
            </div>
        </div>
    </div>
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


    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Blockig Name
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
                    @if(isset($blockings))
                        @foreach ($blocking as $d )
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
                    ----
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
