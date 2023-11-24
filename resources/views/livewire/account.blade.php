<div class="py-2">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Account') }}
        </h2>
    </x-slot>
    <section class="py-2 flex justify-start ">
        <button wire:click="toggleCreate" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create New Account</button>
    </section>

    @if ($isAdding)
        <section class=" py-2 flex justify-evenly gap-3">
            <form class="p-4 bg-slate-100 w-full" >
                <div class="flex justify-start">
                    <div class="w-full p-3">
                        <input onfocus="this.value=''" wire:model="accountForm.name"  id="name" class="block w-full p-3 pl-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Full Name" type="text">
                        <span class="text-xs text-red-700" >@error('accountForm.name') {{ $message }} @enderror</span>
                    </div>
                    <div class="w-full p-3">
                        <input onfocus="this.value=''" wire:model="accountForm.email" placeholder="Email" id="email" class="block w-full p-3 pl-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="email">
                        <span class="text-xs text-red-700" >@error('accountForm.email') {{ $message }} @enderror</span>
                    </div>
                    <div class="w-full p-3">
                        <input onfocus="this.value=''" wire:model="accountForm.password" placeholder="password" id="password" class="block w-full p-3 pl-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="password">
                        <span class="text-xs text-red-700" >@error('accountForm.password') {{ $message }} @enderror</span>
                    </div>
                    <div class="w-full p-3">
                        <input onfocus="this.value=''" wire:model="accountForm.password_confirmation" placeholder="re type password" id="password_confirmation" class="block w-full p-3 pl-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="password">
                        <span class="text-xs text-red-700" >@error('accountForm.password_confirmation') {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="flex justify-start items-end" >
                    <div class="p-3">
                        <label for="roles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Account Role</label>
                        <select wire:click="updateRole" id="roles" wire:model="accountForm.role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="">Choose a role</option>
                        <option value="1">Super Admin</option>
                        <option value="2">Admin</option>
                        <option value="3">Client</option>
                        </select>
                    </div>
                    <div class="p-3">
                        @if ($accountForm->role == 2 || $accountForm->role == 3)
                            <div class=" flex p-3">
                                <select id="roles" wire:model="accountForm.client" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected value="">Choose a client</option>
                                    @if (isset($clients))
                                        @foreach ($clients as $client )
                                            <option value="{{$client->id}}">{{$client->clientName}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class=" p-3">
                        <button wire:click="store" type="button"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            submit
                        </button>
                    </div>
                </div>
            </form>
        </section>
    @endif

    @if(isset($selectedAcct) && $isEditinngClient == true)
        <div class="flex justify-start items-end" >
            <div class=" inline-flex items-end gap-2">
                <div>
                    <label>Client</label>
                    <select id="roles" wire:model="accountForm.client" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="">Choose a client</option>
                        @if (isset($clients))
                            @foreach ($clients as $client )
                                <option value="{{$client->id}}">{{$client->clientName}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <button wire:click="store" type="button"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    submit
                </button>
            </div>
        </div>
    @endif


    <section class="py-2">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class=" px-6 py-3">
                        Full name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Account Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Client Tag
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
                @if (isset($accounts))
                    @foreach($accounts as $d)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="w-4 p-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$d->name}}
                            </th>
                            <td class="w-4 p-4">
                                {{$d->email}}
                            </td>
                            <td class="w-4 p-4">
                                <button id="blocking-{{$d->id}}"  wire:click="editBlocking({{$d->id}})" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                    @if ($d->role == 1)
                                        SUper Admin
                                    @elseif($d->role == 2)
                                        Admin
                                    @else
                                        Client
                                    @endif
                                </button>
                            </td>
                            <td class="w-4 p-4">
                                {{$d->tags}}
                            </td>
                            <td class="w-4 p-4">
                                {{$d->created_at}}
                            </td>
                            <td class="w-4 p-4">
                                {{$d->updated_at}}
                            </td>
                            <td class="w-4 p-4 whitespace-nowrap">
                                @if ($d->role != 1)
                                    <button id="blocking-{{$d->id}}"  wire:click="selectAcct({{$d->id}},2)" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                            <path fill-rule="evenodd" d="M5.5 3A2.5 2.5 0 003 5.5v2.879a2.5 2.5 0 00.732 1.767l6.5 6.5a2.5 2.5 0 003.536 0l2.878-2.878a2.5 2.5 0 000-3.536l-6.5-6.5A2.5 2.5 0 008.38 3H5.5zM6 7a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                          </svg>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </section>
 </div>
