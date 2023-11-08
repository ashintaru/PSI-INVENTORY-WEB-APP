<x-app-layout>

    <x-navigation.nav-link :url="URL('inventory')">
        Inventory
    </x-navigation.nav-link>

    <div class="p-2">
        <form action="{{URL('search-inventory')}}" method="post">
            @csrf
                <x-search-bar />
        </form>
    </div>
    <div class="py-1">
        @if ($inventory)
            <table class="w-full table-auto text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                        <th scope="col" class="">
                            Vehicle Identity No.
                        </th>
                        <th scope="col" class="">
                            Recieved By
                        </th>
                        <th scope="col" class="">
                            Blokcing
                        </th>
                        <th scope="col" class="">
                            Engine No
                        </th>
                        <th scope="col" class="">
                            CS No
                        </th>
                        <th scope="col" class="">
                            Model Description
                        </th>
                        <th scope="col" class="">
                            Receiving Status
                        </th>
                        <th scope="col" class="">
                            Findings
                        </th>
                    </tr>
                </thead>
                <tbody>
                        @if (!is_null($inventory))
                            @foreach($inventory as $d)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$d->vehicleidno}}
                                </th>
                                <th scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$d->car->recieveBy}}
                                </th>
                                <th scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if ($d->car->blockings)
                                        {{$d->car->blocking->bloackname}}
                                    @else
                                        ...
                                    @endif
                                </th>
                                <td class="">
                                    {{$d->car->engineno}}
                                </td>
                                <td class="">
                                    {{$d->car->csno}}
                                </td>
                                <td class="">
                                    {{$d->car->modeldescription}}
                                </td>
                                <td class="">
                                    @if ($d->car->status === 1)
                                        Good
                                    @else
                                        Good with Findings
                                    @endif
                                </td>
                                <td>
                                    {{$d->car->finding->findings}}
                                </td>
                                <td class="text-center">
                                    <form method="POST" action="{{URL('remove-receiving-units/'.$d->vehicleidno)}}" class="space-y-2">
                                        @csrf
                                        @method('delete')
                                        <div class="flex-col space-y-4">
                                            <button type="submit" name="approved" value="2" class="inline-flex items-center ">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.043-2.453-.138-3.332a4.003 4.003 0 00-3.7-3.7 48.378 48.378 0 00-7.324 0 4.003 4.003 0 00-3.7 3.7c-.017.22-.032.441-.043.332M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.043 2.453.138 3.332a4.003 4.003 0 003.7 3.7 48.353 48.353 0 007.324 0 4.003 4.003 0 003.7-3.7c.017-.22.032-.441.043-.332M4.5 12l3 3m-3-3l-3 3" />
                                                  </svg>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            table are empty.......
                        @endif
                </tbody>
            </table>
            <div id="config-button" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Delete
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        @else
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                NO DATA FOUND.....
            </div>
        @endif

<!-- Modal toggle -->


    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-400">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Terms of Service
                    </h3>
                    <button type="button"  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-400 dark:hover:text-white" data-modal-hide="defaultModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 3 3m0 0 3 3M7 7l3-3M7 7l-3 3"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-3 space-y-4">
                    <p id="vehicleidno" class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-3 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-400">
                    <button data-modal-hide="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-300 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                    <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-400 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-400 dark:focus:ring-gray-400">Decline</button>
                </div>
            </div>
        </div>
    </div>


	    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-3 lg:px-8 space-y-4">
                @if ($inventory)
                    @if (isset($inventory))
                        {{$inventory->links()}}
                    @endif
                @endif
            </div>
        </div>
	</div>
</x-app-layout>

{{-- <script>

    // A $( document ).ready() block.
    $( document ).ready(function() {
        let $id = '';
        $('.modal-btn').on('click',function(){
            $id = $(this).val();
            console.log();
            $ajax.
            $('#vehicleidno').html($id);
        });

    });

</script> --}}
