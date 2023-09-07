<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Insert Data') }}
        </h2>
    </x-slot>



	<div class="py-12">
        @include('profile.partials.car-form')
	</div>
</x-app-layout>
