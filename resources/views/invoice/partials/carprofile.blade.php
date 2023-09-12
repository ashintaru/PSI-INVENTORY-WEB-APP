@if ($data)
    <section >
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="flex items-center p-5 bg-gray-50 dark:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                              </svg>
                              <span class="text-sm font-mono">
                                Car Detail's
                              </span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Vehicle Identity Number
                        </th>
                        <td class="px-6 py-3 text-lg text-center font-mono">
                            {{$data->vehicleidno }}
                        </td>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Engine Number
                        </th>
                        <th class="px-6 py-3 text-lg font-mono">
                            {{$data->engineno}}
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            CSNO
                        </th>
                        <th class="px-6 py-3 text-lg font-mono">
                            {{$data->csno}}
                        </th>
                    </tr>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Model Description
                        </th>
                        <td class="px-6 py-3 text-lg text-center font-mono">
                            {{$data->modeldescription}}
                        </td>
                    </tr>
                </tbody>
            </table>
    </section>
@else
.....................
@endif

