<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Blocking\'s Name') }}
        </h2>
        <p class="mt-1 font-mono text-sm text-gray-600 dark:text-gray-400">
            {{ __('Creating new blocking\'s .. ') }}
        </p>
    </header>
    <form method="POST" action="{{URL('import-blockings')}}" class="mt-0 space-y-1" enctype="multipart/form-data">
        @csrf
        <div class="">
            {{-- <select class="block w-1/2 px-5 py-2.5 mr-2 mb-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                @foreach ($data as $d )
                    <option value="{{$d->id}}">{{$d->blockname}}</option>
                @endforeach
            </select> --}}
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
