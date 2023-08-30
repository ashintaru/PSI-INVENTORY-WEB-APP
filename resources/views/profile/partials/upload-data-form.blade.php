<form 
id="fileUploadForm" 
class="flex items-center space-x-6" 
action="{{ route('import') }}"
method="POST"
enctype="multipart/form-data">
    @csrf
    <label class="block">
      <span class="sr-only">Choose file to Upload</span>
      <input type="file" accept=".xlsx" name="file"  id="file" class="block w-full text-sm text-slate-500
        file:mr-4 file:py-2 file:px-4
        file:rounded-full file:border-0
        file:text-sm file:font-semibold
        file:bg-violet-50 file:text-violet-700
        hover:file:bg-violet-100
      "/>
    </label>
    <button  onclick="showFileSize()"  class="mr-4 py-2 px-4 rounded-full file:border-0 text-sm file:font-semibold hover:bg-green-100 bg-green-50 text-green-700 ">
        Import
    </button>
</form>