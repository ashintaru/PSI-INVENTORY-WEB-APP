<x-app-layout>
    <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="{{URL('masterlist')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
              <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
              </svg>
                Masterlist
            </a>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
              </svg>
              <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Batch</span>
            </div>
          </li>
        </ol>
    </nav>
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
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-3 py-3 text-center">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Vehicle Identity No.
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Batching.
                    </th>
                    <th scope="col" class="text-center">
                        Action
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Blockings
                    </th>
                    <th scope="col" class="w-100">
                        Recieved By
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
                                <th scope="row" class="text-center  font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$index++}}
                                </th>
                                <td class=" text-center">
                                    {{$batch->vehicleidno}}
                                </td>
                                <td class=" text-center">
                                    @if ($batch->car->blocking)
                                        {{$batch->car->blocking->bloackname}}
                                    @else
                                        emprty
                                    @endif
                                </td>
                                <td class=" text-center">
                                    <a href="{{URL('delete-batch/'.$batch->id)}}" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Remove</a>
                                </td>
                                <td class=" text-center">
                                    <form method="POST" class="flex" action="{{URL('update-blockings/'.$batch->vehicleidno)}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="flex-col ">
                                            <select id="{{$index}}" data-count="{{$index}}" name="blocks" class=" blocks bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option  data-url="" value="null" >Select Blocks </option>
                                            @if ($blocks)
                                                @foreach ($blocks as $b)
                                                    <option  data-url="" value="{{URL('getblocks/'.$b->id)}}">{{$b->blockname}}</option>
                                                @endforeach
                                            @else
                                                <option value="">Ask the admin for the blcokings</option>
                                            @endif
                                            </select>
                                            <select  id="blockings" name="blockings" class="blockings bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </select>
                                            <x-primary-button>{{ __('Submit') }}</x-primary-button>
                                        </div>
                                    </form>
                                </td>
                                <td class=" text-center">
                                    <form method="POST" action="{{URL('update-cars-Personel/'.$batch->vehicleidno)}}" class="space-y-2">
                                        @csrf
                                        @method('PUT')
                                        <div class="flex-col">
                                            <div class="flex ">
                                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                      <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                                                  </svg>
                                                </span>
                                                <input type="text" id="website-admin" name="personel" class=" w-100 rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500  min-w-0 w-1/2 text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  value="{{$batch->car->recieveBy}}">
                                              </div>
                                            <x-primary-button>{{ __('update') }}</x-primary-button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
            </tbody>
        </table>
	</div>
</x-app-layout>
<script>
    $(document).ready(function(){
        var select = $('.blockings');
        $(".blocks").change(function(){
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
