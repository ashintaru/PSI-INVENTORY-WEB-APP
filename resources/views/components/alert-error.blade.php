@if (Session::has('msg'))
<div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Danger
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            <p>{{session()->get('msg')}}</p>
            </div>
        </div>
    </div>
</div>
@endif

@if ($errors->any())
<div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
              Error
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          </div>

    </div>
</div>
@endif
