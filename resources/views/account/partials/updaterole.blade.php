<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Change Role') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Update the account\'s role.') }}
        </p>
    </header>

    <form method="post" action="{{ route('admin.role.update',$data->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div class="flex items-center gap-4">
            <div class="w-full ">
                 <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @if ($data->role == 1)
                    <option selected value="1">Supper Admin</option>
                    <option value="2">Admin</option>
                    <option value="3">Client</option>
                @elseif ($data->role == 2)
                    <option value="1">Supper Admin</option>
                    <option selected value="2">Admin</option>
                    <option value="3">Client</option>
                @elseif ($data->role == 3)
                    <option value="1">Supper Admin</option>
                    <option value="2">Admin</option>
                    <option selected value="3">Client</option>
                @endif
                </select>
            </div>
            <x-primary-button>{{ __('Reset') }}</x-primary-button>
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
