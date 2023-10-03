<x-app-layout>
    <x-navigation.nav-link :url="URL('recieve')">
        Databased
    </x-navigation.nav-link>
    <div class="p-2">
        <form action="search" method="post">
            @csrf
            <x-search-bar />
        </form>
    </div>

	<div class="py-1">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-3 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                       Status
                       <button data-popover-target="popover-description" data-popover-placement="right" type="button"><svg class="w-4 h-4 ml-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button></p>
                       <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                           <div class="p-3 space-y-2">
                               <div class="flex flex-auto">
                               <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Checked</span>
                               </div>
                               <p>The car have been checked and inspected before recieveing </p>
                               <div class="flex flex-auto">
                                  <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Pending</span>
                               </div>
                               <p>The car does not been checked and inspected yet </p>
                               <a href="#" class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read more <svg class="w-2 h-2 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                       </svg></a>
                           </div>
                           <div data-popper-arrow></div>
                       </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Vehicle Identity No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Engine No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CS No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Model Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Vehicle Stock Yard
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (!is_null($data))
                  @foreach($data as $d)
                    <x-recieve.tableRow :tableRow="$d" />
                  @endforeach
                @else
                    table are empty.......
                @endif
            </tbody>
        </table>
        <div id="config-button" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Configuration
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        <div class="py-2">
            @if (count($data)>1)
                {{$data->links('pagination::tailwind')}}
            @endif
        </div>


	</div>

</x-app-layout>
