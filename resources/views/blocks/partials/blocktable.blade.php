<section>
     <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Block Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Blockings Total Count
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date Created
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($data)
                    @foreach ($data as $d )
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$d->id}}
                            </th>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$d->blockname}}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{count($d->blockings)}}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$d->updated_at}}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{URL('blocking-list/'.$d->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Blocking List</a>
                            </td>
                    </tr>
                    @endforeach
                    @else

                    @endif

            </tbody>
        </table>
    </div>
</section>
