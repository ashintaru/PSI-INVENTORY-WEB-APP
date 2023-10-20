<x-app-layout>
    <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="{{URL('masterlist')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
              <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
              </svg>
                Masterlist
            </a>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
              </svg>
              <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Upload Excel File</span>
            </div>
          </li>
        </ol>
    </nav>
	<div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-alert-error></x-alert-error>
            <x-alert-success></x-alert-success>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form  class="flex flex-col space-y-4" id="fileUploadForm" class="" action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Client Tag</h3>
                        <p class="mb-4 text-xs font-mono text-gray-900 dark:text-white">To Identify to whome the unit's are.</p>
                        @if($data)
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a Blocks</label>
                            <select required id="countries" name="clientTag"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="block">
                                @foreach ($data as $tag )
                                    <option value="{{$tag->id}}">{{$tag->clientName}}</option>
                                @endforeach
                            </select>
                        @else
                            ....
                        @endif
                        <div class="flex items-center justify-center w-full">
                            <label for="file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Excel , .xlsx (MAX. 800x400px)</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400" id="filename"></p>
                                </div>
                                <input id="file" accept=".xlsx" name="file" type="file"  class="hidden"/>
                            </label>
                        </div>
                        <button type="submit" id="submit" onclick="showFileSize()"  class="mr-4 py-2 px-4 w-1/5   rounded-full file:border-0 text-sm file:font-semibold hover:bg-green-100 bg-green-50 text-green-700 ">
                            Import
                        </button>
                    </form>
                </div>
			</div>
		</div>
	</div>
    <script>

        $( document ).ready(function() {

            $( "#file" ).on( "change", function() {
                let file = document.getElementById("file").files[0];
                $('#filename').html(file.name);
                console.log(file.name);
            });

        });


        function showFileSize() {
            let file = document.getElementById("file").files[0];
            let filetext = document.getElementById("filename");
            if(file) {
                // filetext.text(file.text);
                const maxSize = 200000;
                if(file.size > maxSize ){
                    alert( "Error :: The file exceed the max upload size of .."+ maxSize + " in bytes");
                    event.preventDefault();
                }
            }
        }

    </script>

</x-app-layout>
