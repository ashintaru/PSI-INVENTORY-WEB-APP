@if (Session::has('msg'))

    <div role="alert">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
          Danger
        </div>
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
          <p>{{session()->get('msg')}}</p>
        </div>
      </div>
@endif
    
@if ($errors->any())
<div role="alert">
  <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
    Error
  </div>
  <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
</div>
@endif
