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
                   Production No.
               </th>
               <th scope="col" class="px-6 py-3">
                 Biling Documents
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
               @if (!$d->havebeenstored)
                 <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                   <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                     {{$d->id}}
                   </th>
                   <td class="px-6 py-4">
                     {{$d->vehicleidno}}
                   </td>
                   <td class="px-6 py-4">
                     {{$d->productioncbunumber}}
                   </td>
                   <td class="px-6 py-4">
                     {{$d->bilingdocuments}}
                   </td>
                   <td class="px-6 py-4">
                     {{$d->modeldescription}}
                   </td>
                   <td class="px-6 py-4">
                     {{$d->vehiclestockyard}}
                   </td>
                   <td class="px-6 py-4">
                       <a href="{{URL('/view'."/".$d->vehicleidno)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
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