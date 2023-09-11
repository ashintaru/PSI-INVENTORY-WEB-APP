<section>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
       <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
               <th scope="col" class="px-3 py-3">
                   #
               </th>
               <th scope="col" class="px-6 py-3">
                    <p class="flex items-center text-sm text-gray-500 dark:text-gray-400">Passed
                         <button data-popover-target="popover-description" data-popover-placement="right" type="button"><svg class="w-4 h-4 ml-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button></p>
                    <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                        <div class="p-3 space-y-2">
                            <div class="flex flex-auto">
                                <svg width="26px" height="26px" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet"><path fill="#77B255" d="M36 32a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4h28a4 4 0 0 1 4 4v28z"></path><path fill="#FFF" d="M29.28 6.362a2.502 2.502 0 0 0-3.458.736L14.936 23.877l-5.029-4.65a2.5 2.5 0 1 0-3.394 3.671l7.209 6.666c.48.445 1.09.665 1.696.665c.673 0 1.534-.282 2.099-1.139c.332-.506 12.5-19.27 12.5-19.27a2.5 2.5 0 0 0-.737-3.458z"></path></svg>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Green Checked</h3>
                            </div>
                            <p>The car have Passed during receiving Inspection </p>
                            <div class="flex flex-auto">
                                <svg width="26px" height="26px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--emojione" preserveAspectRatio="xMidYMid meet"><path d="M62 52c0 5.5-4.5 10-10 10H12C6.5 62 2 57.5 2 52V12C2 6.5 6.5 2 12 2h40c5.5 0 10 4.5 10 10v40z" fill="#ff5a79"></path><path fill="#ffffff" d="M50 21.2L42.8 14L32 24.8L21.2 14L14 21.2L24.8 32L14 42.8l7.2 7.2L32 39.2L42.8 50l7.2-7.2L39.2 32z"></path></svg>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Red Checked</h3>
                            </div>
                            <p>The car does not Passed during inspection and it will be wait for further inspection </p>
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
                Engine No
             </th>

             <th scope="col" class="px-6 py-3">
                CS No
             </th>
             <th scope="col" class="px-6 py-3">
                Model Description
             </th>
            <th scope="col" class="px-6 py-3">
                Action
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
                            @if ($d->invstatus)
                            <svg width="26px" height="26px" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet"><path fill="#77B255" d="M36 32a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4h28a4 4 0 0 1 4 4v28z"></path><path fill="#FFF" d="M29.28 6.362a2.502 2.502 0 0 0-3.458.736L14.936 23.877l-5.029-4.65a2.5 2.5 0 1 0-3.394 3.671l7.209 6.666c.48.445 1.09.665 1.696.665c.673 0 1.534-.282 2.099-1.139c.332-.506 12.5-19.27 12.5-19.27a2.5 2.5 0 0 0-.737-3.458z"></path></svg>
                            @else
                            <svg width="26px" height="26px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--emojione" preserveAspectRatio="xMidYMid meet"><path d="M62 52c0 5.5-4.5 10-10 10H12C6.5 62 2 57.5 2 52V12C2 6.5 6.5 2 12 2h40c5.5 0 10 4.5 10 10v40z" fill="#ff5a79"></path><path fill="#ffffff" d="M50 21.2L42.8 14L32 24.8L21.2 14L14 21.2L24.8 32L14 42.8l7.2 7.2L32 39.2L42.8 50l7.2-7.2L39.2 32z"></path></svg>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{$d->car->vehicleidno}}
                        </td>
                        <td class="px-6 py-4">
                            {{$d->car->engineno}}
                        </td>
                        <td class="px-6 py-4">
                            {{$d->car->csno}}
                        </td>
                        <td class="px-6 py-4">
                            {{$d->car->modeldescription}}
                        </td>
                        <td class="px-6 py-4 flex ">
                            <a href="{{URL('/view'."/".$d->car->vehicleidno."/"."inv")}}"
                                data-tooltip-target="config-button"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <x-config_icon></x-config_icon>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                table are empty.......
            @endif
       </tbody>
   </table>
 </section>

