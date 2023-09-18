@if ($data)
    <section >
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="flex items-center p-5 bg-gray-50 dark:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
                                <path d="M3 3.5A1.5 1.5 0 014.5 2h6.879a1.5 1.5 0 011.06.44l4.122 4.12A1.5 1.5 0 0117 7.622V16.5a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 013 16.5v-13z" />
                                </svg>
                              <span class="text-sm font-mono">
                                Invoice Detail's
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                           CSR no
                        </th>
                        <td class="px-6 py-3 text-lg text-center font-mono">
                            {{$data->csrno }}
                        </td>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            CSR Type
                        </th>
                        <th class="px-6 py-3 text-lg font-mono">
                            {{$data->csrtype}}
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            CSR Date
                        </th>
                        <th class="px-6 py-3 text-lg font-mono">
                            {{Carbon\Carbon::parse($data->csrdate)->format('M d Y')}}
                        </th>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Sold to Party
                        </th>
                        <td class="px-6 py-3 text-lg text-center font-mono">
                            {{$data->stp }}
                        </td>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Status
                        </th>
                        <th class="px-6 py-3 text-lg font-mono">
                            @if ($data->status)
                                <svg width="26px" height="26px" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet"><path fill="#77B255" d="M36 32a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4h28a4 4 0 0 1 4 4v28z"></path><path fill="#FFF" d="M29.28 6.362a2.502 2.502 0 0 0-3.458.736L14.936 23.877l-5.029-4.65a2.5 2.5 0 1 0-3.394 3.671l7.209 6.666c.48.445 1.09.665 1.696.665c.673 0 1.534-.282 2.099-1.139c.332-.506 12.5-19.27 12.5-19.27a2.5 2.5 0 0 0-.737-3.458z"></path></svg>
                            @else
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">R.F.I</span>
                            @endif
                        </th>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Vehicle Type
                        </th>
                        <td class="px-6 py-3 text-lg text-center font-mono">
                            {{$data->vehicletype }}
                        </td>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Model Type
                        </th>
                        <th class="px-6 py-3 text-lg font-mono">
                            {{$data->modeltype}}
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Sales Remark
                        </th>
                        <th class="px-6 py-3 text-lg font-mono">
                            {{$data->salesremark}}
                        </th>
                    </tr>
                </tbody>
            </table>
    </section>
@else
.....................
@endif

