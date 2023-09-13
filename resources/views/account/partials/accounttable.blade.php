<section>
    <form method="POST" class="" action="{{ URL('create-account') }}">
        @csrf
        <!-- Name -->
        <div class="p-3">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="flex ">
           <div class="w-full p-3">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
           </div>
           <div class="w-full p-3">
            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
            <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option value="1">Supper Admin</option>
              <option value="2">Admin</option>
              <option value="3">Client</option>
            </select>

           </div>
        </div>
        <!-- Password -->
        <div class="flex ">
            <div class="w-full p-3">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <!-- Confirm Password -->
            <div class="w-full p-3">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>
        <div class="flex items-center justify-end p-1">
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</section>
<br>
<section>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-3 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Full Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Account Type
                </th>
                <th scope="col" class="px-6 py-3">
                   Verified
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
            @if ($data)
              @foreach($data as $d)
              <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-yellow-100">
                  <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{$d->id}}
                  </th>
                 <td class="px-6 py-4">
                  {{$d->name}}
                  </td>
                  <td class="px-6 py-4">
                  {{$d->email}}
                  </td>
                  <td class="px-6 py-4 flex justify-center">
                    @if ($d->role == 1)
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 dark:bg-blue-900 dark:text-blue-300">Super Admin</span>
                    @elseif($d->role == 2)
                        <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Admin</span>
                    @else
                    <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-400 border border-gray-500">Client</span>
                    @endif
                  </td>
                  <td class="px-6 py-4">
                  {{$d->emailverified}}
                  </td>
                  <td class="px-6 py-4">
                  {{$d->created_at}}
                  </td>
                  <td class="px-6 py-4">
                    {{$d->updated_at}}
                </td>
                  <td class="px-6 py-4 flex ">
                      <a href={{URL('profile/'.$d->id)}}>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <path fill-rule="evenodd" d="M14.5 10a4.5 4.5 0 004.284-5.882c-.105-.324-.51-.391-.752-.15L15.34 6.66a.454.454 0 01-.493.11 3.01 3.01 0 01-1.618-1.616.455.455 0 01.11-.494l2.694-2.692c.24-.241.174-.647-.15-.752a4.5 4.5 0 00-5.873 4.575c.055.873-.128 1.808-.8 2.368l-7.23 6.024a2.724 2.724 0 103.837 3.837l6.024-7.23c.56-.672 1.495-.855 2.368-.8.096.007.193.01.291.01zM5 16a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd" />
                            <path d="M14.5 11.5c.173 0 .345-.007.514-.022l3.754 3.754a2.5 2.5 0 01-3.536 3.536l-4.41-4.41 2.172-2.607c.052-.063.147-.138.342-.196.202-.06.469-.087.777-.067.128.008.257.012.387.012zM6 4.586l2.33 2.33a.452.452 0 01-.08.09L6.8 8.214 4.586 6H3.309a.5.5 0 01-.447-.276l-1.7-3.402a.5.5 0 01.093-.577l.49-.49a.5.5 0 01.577-.094l3.402 1.7A.5.5 0 016 3.31v1.277z" />
                          </svg>
                      </a>
                  </td>
              </tr>
              @endforeach
            @else
                table are empty.......
            @endif
        </tbody>
    </table>
</section>
