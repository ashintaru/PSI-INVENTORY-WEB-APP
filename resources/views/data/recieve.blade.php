<x-app-layout>
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{URL('recieve')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                    <x-db_icon></x-db_icon>
                    <span class="flex-1 ml-3 whitespace-nowrap text-base font-extrabold">Recieve Data</span>
                </a>
            </li>
        </ol>
    </nav>
    <div class="p-2">
        <x-search-bar></x-search-bar>
    </div>

	<div class="py-1">
        @include('data.partials.tablecardata',['data'=>$data])
        <div class="py-12">
            @if (count($data)>1)
                {{$data->links()}}
            @endif
        </div>
	</div>

</x-app-layout>
