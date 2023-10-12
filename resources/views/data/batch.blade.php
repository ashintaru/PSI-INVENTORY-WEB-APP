<x-app-layout>
    <x-navigation.nav-link :url="URL('batch')">
        Batch
    </x-navigation.nav-link>
    <x-alert-error></x-alert-error>
    <x-alert-success></x-alert-success>

    <div class="overflow-x-auto p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <form method="POST" action="{{URL('create-Recieve')}}" class="space-y-2">
            @csrf
            <div class="flex-col space-y-3">
                <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Recieving Form</h3>
                <div class="flex gap-4 w-1/2" >
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="datetime-local" name="datein" id="datein" class="block w-full px-0 py-2 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="datein" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date In</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="date" name="datereceive" id="datereceive" class="block w-full px-0 py-2 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="daterecieve" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date Recieve</label>
                    </div>
                </div>
                <x-primary-button>{{ __('Submit') }}</x-primary-button>
            </div>
        </form>
    </div>
	<div class="py-2">
        <table class="w-1/2 text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-3 py-3 text-center">
                        Batch ID
                    </th>
                    <th scope="col" class="px-3 py-3 text-center">
                        Unit ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Vehicle Identity No.
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                    @php
                        $index=1;
                    @endphp
                    @if ($batches)
                        @foreach ($batches as $batch )
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$index++}}
                                </th>
                                <td class="px-6 py-4 text-center">
                                    {{$batch->car->id}}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{$batch->car->vehicleidno}}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{URL('delete-batch/'.$batch->id)}}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Remove</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
            </tbody>
        </table>
	</div>
</x-app-layout>
