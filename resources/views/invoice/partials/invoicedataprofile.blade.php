<section class="py-3">
    @if ($data->status)
    <div>
        <form class="" action="{{URL('updateinvoicedata/'.$data->invoicedata->invoiceid)}}" method="POST" >
            @csrf
            @method("PATCH")
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Personel</label>
                <div class="relative max-w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z" clip-rule="evenodd" />
                          </svg>
                    </div>
                    <input type="text" id="name" value="{{ Auth::user()->name }}"  name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name">
                </div>
                @error('name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-row gap-4 w-full">
                <div class="w-full">
                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Final Date</label>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input type="date" value="{{$data->invoicedata->date}}" name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    @error('name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="blocks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blocks</label>
                    <div class="w-full">
                        <select id="blocks" name="blocks" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option  data-url="" value="null" >Select Blocks </option>
                            @if ($blocks)
                             @foreach ($blocks as $b)
                                 <option  data-url="" value="{{URL('getblocks/'.$b->id)}}">{{$b->blockname}}</option>
                             @endforeach
                         @else
                             <option value="">Ask the admin for the blcokings</option>
                         @endif
                        </select>

                       </div>
                    @error('mmpcoptioncode')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="blocks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blocks</label>
                    <div class="w-full">
                        <select  id="blockings" name="blockings" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option></option>
                        </select>
                    </div>
                    @error('mmpcoptioncode')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="space-x-4 space-y-4">
                <x-primary-button>Update</x-primary-button>
            </div>
        </form>
    </div>
    <br>
    <section  class="">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="flex items-center p-5 bg-gray-50 dark:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
                                <path d="M3 3.5A1.5 1.5 0 014.5 2h6.879a1.5 1.5 0 011.06.44l4.122 4.12A1.5 1.5 0 0117 7.622V16.5a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 013 16.5v-13z" />
                                </svg>
                              <span class="text-sm font-mono">
                                Invoice Data's
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                           Invoice ID
                        </th>
                        <td class="px-6 py-3 text-lg text-center font-mono">
                            {{$data->invoicedata->invoiceid}}
                        </td>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Person In charge
                        </th>
                        <th class="px-6 py-3 text-lg font-mono">
                            {{$data->invoicedata->name}}
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Invoice date
                        </th>
                        <th class="px-6 py-3 text-lg font-mono">
                            {{Carbon\Carbon::parse($data->invoicedata->date)->format('M d Y')}}
                        </th>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Block
                        </th>
                        <td class="px-6 py-3 text-lg text-center font-mono">
                            {{$data->invoicedata->blockings->block->blockname}}
                        </td>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Blockings
                        </th>
                        <td class="px-6 py-3 text-lg text-center font-mono">
                            {{$data->invoicedata->blockings->bloackname}}
                        </td>
                     </tr>
                </tbody>
            </table>
    </section>
    @else
    <div>
        <form class="" action="{{URL('createinvoicedata/'.$data->id)}}" method="POST" >
            @csrf
            <div class="w-full">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Personel</label>
                <div class="relative max-w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z" clip-rule="evenodd" />
                          </svg>
                    </div>
                    <input type="text" id="name" value="{{ Auth::user()->name }}"  name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name">
                </div>
                @error('name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-row gap-4 w-full">
                <div class="w-full">
                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Final Date</label>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input type="date" name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    @error('name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="blocks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blocks</label>
                    <div class="w-full">
                        <select id="blocks" name="blocks" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option  data-url="" value="null" >Select Blocks </option>

                         @if ($blocks)
                             @foreach ($blocks as $b)
                                 <option  data-url="" value="{{URL('getblocks/'.$b->id)}}">{{$b->blockname}}</option>
                             @endforeach
                         @else
                             <option value="">Ask the admin for the blcokings</option>
                         @endif
                        </select>

                       </div>
                    @error('mmpcoptioncode')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="blocks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blocks</label>
                    <div class="w-full">
                        <select  id="blockings" name="blockings" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </select>
                    </div>
                    @error('mmpcoptioncode')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="space-x-4 space-y-4">
                <x-primary-button>Submit</x-primary-button>
            </div>
        </form>
    </div>
    @endif

</section>
<script>
$(document).ready(function(){
    var select = $('#blockings');
    $("#blocks").change(function(){
       var dataurl = $(this).val();
       if($(this).val() == "null"){
            select.empty();
       }else{
            $.ajax({
                type: "GET",
                url: dataurl,
                dataType: 'json',
                success: function (data) {
                    select.empty();
                    data.forEach(element => {
                    //   console.log(element['bloackname']);
                    //   console.log(select);
                    var option = $("<option></option>");
                        option.append(element['bloackname']);
                        option.val(element['id']);
                        // console.log(option);
                        select.append(option);
                    });

                },
                error: function (data) {
                    console.log(data);
                }
            });
       }

    });
});


</script>
