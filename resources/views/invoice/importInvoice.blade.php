<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-alert-error></x-alert-error>
            <x-alert-success></x-alert-success>
            <a href="{{url('invoice')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
                    <path d="M3 3.5A1.5 1.5 0 014.5 2h6.879a1.5 1.5 0 011.06.44l4.122 4.12A1.5 1.5 0 0117 7.622V16.5a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 013 16.5v-13z" />
                    </svg>
                <span class="flex-1 ml-3 whitespace-nowrap text-base font-extrabold">Invoice</span>
            </a>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                     <form action="{{ URL('uploadInvoice') }}" method="POST" enctype="multipart/form-data"  class="flex flex-col space-y-4" id="fileUploadForm" class="">
                        @csrf
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" id="file" accept=".xlsx" name="file" type="file" >
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                        <button type="submit" id="submit" class="text-white w-1/4 bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 fo0cus:ring-gray-300 font-medium rounded-sm text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-200 dark:text-black dark:hover:bg-gray-100 dark:focus:ring-gray-50 dark:border-gray-700">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
