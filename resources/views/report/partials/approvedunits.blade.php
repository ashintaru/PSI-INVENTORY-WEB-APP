<x-app-layout>
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center justify-between space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{URL('inventory')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                    <x-inv_icon></x-inv_icon>
                    <span class="flex-1 ml-3 whitespace-nowrap text-base font-extrabold">Inventory</span>
                </a>
            </li>
            <li class="inline-flex items-center">
                <a href="{{URL('export-units')}}">
                    Download
                </a>
            </li>
        </ol>
    </nav>
    <section>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                    <th scope="col" class="px-3 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Vehicle Identity No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Engine No
                    </th>

                    <th scope="col" class="px-6 py-3">
                        CS No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Model Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Production Number
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (!is_null($data))
                    @foreach($data as $d)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$d->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$d->vehicleidno}}
                        </td>
                        <td class="px-6 py-4">
                            {{$d->engineno}}
                        </td>
                        <td class="px-6 py-4">
                            {{$d->csno}}
                        </td>
                        <td class="px-6 py-4">
                            {{$d->modeldescription}}
                        </td>
                        <td class="px-6 py-4 flex ">
                            {{$d->productioncbunumber}}
                        </td>
                    </tr>
                    @endforeach
                @else
                    table are empty.......
                @endif
            </tbody>
        </table>
    </section>
<div class="px-3">
    {{$data->links('pagination::tailwind')}}
</div>
</x-app-layout>
