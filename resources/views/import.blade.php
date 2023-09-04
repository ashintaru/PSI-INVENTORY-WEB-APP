<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Import Data') }}
        </h2>
    </x-slot>



	<div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.upload-data-form')
                </div>
			</div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                    <div id="progressBar" class="bg-blue-600 h-2.5 rounded-full" style="width: 0%"></div>
                </div>
            </div>
            <x-alert-error></x-alert-error>
            <x-alert-success></x-alert-success>
		</div>
	</div>

    <script>

        function showFileSize() {
            let file = document.getElementById("file").files[0];
            if(file) {
                const maxSize = 200000;
                if(file.size > maxSize ){
                    alert( "Error :: The file exceed the max upload size of .."+ maxSize + " in bytes");
                    event.preventDefault();
                }
                // else{
                //     $('#fileUploadForm').ajaxForm({
                //         beforeSend: function () {
                //             var percentage = '0';
                //         },
                //         uploadProgress: function (event, position, total, percentComplete) {
                //             var percentage = percentComplete;
                //             $('#progressBar').css("width", percentage+'%', function() {
                //             return $(this).attr("aria-valuenow", percentage) + "%";

                //         })
                //         },
                //         complete: function (xhr) {
                //             if(xhr.responseText)
                //                 {

                //                 }
                //         }
                //     });

                // }
            }
        }

    </script>

</x-app-layout>
