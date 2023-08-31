<section>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
       <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-3 py-3">
                  Log's History
              </th>
            </tr>
            <tr>
               <th scope="col" class="px-3 py-3">
                   #
               </th>
               <th scope="col" class="px-6 py-3">
                   Vehicle Identity No.
               </th>
               <th scope="col" class="px-6 py-3">
                   Log Message.
               </th>
               <th scope="col" class="px-6 py-3">
                 Date Created
             </th>
           </tr>
       </thead>
       <tbody>
           @if (!is_null($log))
             @foreach($log as $d)
               @if (!$d->havebeenstored)
                 <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                   <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                     {{$index++}}
                   </th>
                   <td class="px-6 py-4">
                     {{$d->idNum}}
                   </td>
                   <td class="px-6 py-4">
                     {{$d->logs}}
                   </td>
                   <td class="px-6 py-4">              
                    {{ Carbon\Carbon::parse($d->updated_at)->format('M d Y') }}
                   </td> 
                  </tr>                
               @endif
             @endforeach
           @else
               table are empty.......
           @endif
       </tbody>
   </table>
 </section>