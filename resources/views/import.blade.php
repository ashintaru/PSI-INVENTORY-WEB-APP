<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Import Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
				<div class="container">
					<h3>Import Data into Database </h3>
					<form action="{{ route('import') }}" method="POST" name="importform"
						enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="file">File:</label>
							<input id="file" type="file" name="file" class="form-control">
						</div>
						<x-secondary-button>
		                    {{ __('Import') }}
						</x-secondary-button>

					</form>
				</div>`
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
