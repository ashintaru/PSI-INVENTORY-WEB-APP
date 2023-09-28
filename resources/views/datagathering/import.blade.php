<x-app-layout>
      <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd" d="M15.988 3.012A2.25 2.25 0 0118 5.25v6.5A2.25 2.25 0 0115.75 14H13.5V7A2.5 2.5 0 0011 4.5H8.128a2.252 2.252 0 011.884-1.488A2.25 2.25 0 0112.25 1h1.5a2.25 2.25 0 012.238 2.012zM11.5 3.25a.75.75 0 01.75-.75h1.5a.75.75 0 01.75.75v.25h-3v-.25z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M2 7a1 1 0 011-1h8a1 1 0 011 1v10a1 1 0 01-1 1H3a1 1 0 01-1-1V7zm2 3.25a.75.75 0 01.75-.75h4.5a.75.75 0 010 1.5h-4.5a.75.75 0 01-.75-.75zm0 3.5a.75.75 0 01.75-.75h4.5a.75.75 0 010 1.5h-4.5a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                      </svg>
                      <span class="flex-1 ml-3 whitespace-nowrap text-base font-extrabold">Upload File</span>
                </a>
            </li>
        </ol>
    </nav>
	<div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('datagathering.partials.uploaddataform')
                </div>
			</div>
            <x-alert-error></x-alert-error>
            <x-alert-success></x-alert-success>
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


        // function showFileSize() {
        //     let file = document.getElementById("file").files[0];
        //     let filetext = document.getElementById("filename");
        //     if(file) {
        //         // filetext.text(file.text);
        //         const maxSize = 200000;
        //         if(file.size > maxSize ){
        //             alert( "Error :: The file exceed the max upload size of .."+ maxSize + " in bytes");
        //             event.preventDefault();
        //         }
        //     }
        // }

    </script>

</x-app-layout>
