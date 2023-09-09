<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Insert Data') }}
        </h2>
    </x-slot>


    {{-- @foreach ($fillables as $fillable )
        <span> {{$fillable}}</span>
    @endforeach --}}

	<div class="py-12">
        @include('datagathering.partials.manualdataform')
	</div>
</x-app-layout>
