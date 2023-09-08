<x-app-layout>


    <div class="p-2">
        <x-search-bar></x-search-bar>
    </div>

	<div class="py-1">
        @include('profile.partials.table-invoice')
        {{-- <div class="py-12">
            @if (count($data)>1)
                {{$data->links()}}
            @endif
        </div> --}}
	</div>

</x-app-layout>
