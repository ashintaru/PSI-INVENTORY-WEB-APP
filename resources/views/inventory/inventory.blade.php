<x-app-layout>

    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form action="{{URL('searchinventory')}}" method="post">
                @csrf
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="default-search" name="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Vehicle Identity No." required>
                    <button type="submit" class="text-white absolute right-1.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="py-2 px-3 flex justify">
        <a href="{{URL('viewinventory/passed')}}" class="scale-1 p-6 bg-blue-600 dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-blue-500">
            <div>
                <div class="h-16 w-16 bg-blue-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                    <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                    <svg width="36px" height="36px" class="stroke-sky-700" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.18898 22.1733C4.08737 21.0047 5.00852 20 6.18146 20H10C11.1046 20 12 20.8954 12 22V41C12 42.1046 11.1046 43 10 43H7.83363C6.79622 43 5.93102 42.2068 5.84115 41.1733L4.18898 22.1733Z" fill="#2F88FF" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18 21.3745C18 20.5388 18.5194 19.7908 19.2753 19.4345C20.9238 18.6574 23.7329 17.0938 25 14.9805C26.6331 12.2569 26.9411 7.33595 26.9912 6.20878C26.9982 6.05099 26.9937 5.89301 27.0154 5.73656C27.2861 3.78446 31.0543 6.06492 32.5 8.47612C33.2846 9.78471 33.3852 11.504 33.3027 12.8463C33.2144 14.2825 32.7933 15.6699 32.3802 17.0483L31.5 19.9845H42.3569C43.6832 19.9845 44.6421 21.2518 44.2816 22.5281L38.9113 41.5436C38.668 42.4051 37.8818 43 36.9866 43H20C18.8954 43 18 42.1046 18 41V21.3745Z" fill="#2F88FF" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h2 class="mt-6 text-xl font-semibold text-white dark:text-white">Passed Inventory</h2>

            </div>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
            </svg>
        </a>
        <a href="{{URL('viewinventory/failed')}}" class="scale-1 p-6 bg-red-400 dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
            <div>
                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                    <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                    <svg width="36px" height="36px" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.18051 26.8339C4.08334 27.9999 5.00352 29 6.1736 29H10C11.1046 29 12 28.1046 12 27V7C12 5.89543 11.1046 5 10 5H7.84027C6.80009 5 5.93356 5.79733 5.84717 6.83391L4.18051 26.8339Z" fill="#2F88FF" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18 26.6255C18 27.4612 18.5194 28.2092 19.2753 28.5655C20.9238 29.3426 23.7329 30.9062 25 33.0195C26.6331 35.7431 26.9411 40.664 26.9912 41.7912C26.9982 41.949 26.9937 42.107 27.0154 42.2634C27.2861 44.2155 31.0543 41.9351 32.5 39.5239C33.2846 38.2153 33.3852 36.496 33.3027 35.1537C33.2144 33.7175 32.7933 32.3301 32.3802 30.9517L31.5 28.0155H42.3569C43.6832 28.0155 44.6421 26.7482 44.2816 25.4719L38.9113 6.45642C38.668 5.5949 37.8818 5 36.9866 5H20C18.8954 5 18 5.89543 18 7V26.6255Z" fill="#2F88FF" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h2 class="mt-6 text-xl font-semibold text-white dark:text-white">Reject Inventory</h2>

            </div>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-white w-6 h-6 mx-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
            </svg>
        </a>
    </div>

    <div class="py-1">
            @if ($data)
                @include('inventory.partials.inventorytable',['data'=>$data])
            @else
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    NO DATA FOUND.....
                </div>
            @endif

	    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if ($data)
                @if (count($data)>1)
                    {{$data->links()}}
                @endif
            @endif
            </div>
        </div>
	</div>


</x-app-layout>
