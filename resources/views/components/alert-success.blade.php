@if (Session::has('success'))
<div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div role="alert">
            <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
            Congrats
            </div>
            <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
            <p>{{session()->get('success')}}</p>
            </div>
        </div>
    </div>
</div>
@endif


