<x-app-layout>
    @if ($invoice)
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{url('invoice')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
                            <path d="M3 3.5A1.5 1.5 0 014.5 2h6.879a1.5 1.5 0 011.06.44l4.122 4.12A1.5 1.5 0 0117 7.622V16.5a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 013 16.5v-13z" />
                            </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap text-base font-extrabold">Invoice</span>
                    </a>
                </li>
                <li class="inline-flex items-center space-x-1 md:space-x-3">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                </li>
                <li class="inline-flex items-center">
                    <a  class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
                            <path d="M3 3.5A1.5 1.5 0 014.5 2h6.879a1.5 1.5 0 011.06.44l4.122 4.12A1.5 1.5 0 0117 7.622V16.5a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 013 16.5v-13z" />
                            </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap text-base font-extrabold">Invoice Data</span>
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap text-sm font-mono">{{$invoice->vehicleidno}}</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-3">
                {{-- invoice blocking and date form --}}
                <div class="overflow-x-auto p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    //HOLD NOT DONE*
                    <form method="POST" class="flex" action="{{URL('update-blockings/'.$invoice->vehicleidno)}}">
                        @csrf
                        @method('PUT')
                        <div class="flex-col ">
                            <select id="blocks" name="blocks" class=" blocks bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                </div>
                {{-- end --}}
                {{-- Table car --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Unit ID
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                    {{$invoice->id }}
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Vehicle Identity Number
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                    {{$invoice->vehicleidno }}
                                </td>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Engine Number
                                </th>
                                <th class="px-6 py-3 text-lg font-mono">
                                    {{$invoice->engineno}}
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    CSNO
                                </th>
                                <th class="px-6 py-3 text-lg font-mono">
                                    {{$invoice->csno}}
                                </th>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Model Description
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                    {{$invoice->modeldescription}}
                                </td>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Blockings
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                    @if ($invoice->blockings == "empty")
                                        Null
                                    @else
                                        {{$invoice->blocking->bloackname}}
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- end --}}
                {{-- table of invoice --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Invoice ID
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                    {{$invoice->id }}
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                   CSR no
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                    {{$invoice->csrno }}
                                </td>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    CSR Type
                                </th>
                                <th class="px-6 py-3 text-lg font-mono">
                                    {{$invoice->csrtype}}
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    CSR Date
                                </th>
                                <th class="px-6 py-3 text-lg font-mono">
                                    {{Carbon\Carbon::parse($invoice->csrdate)->format('M d Y')}}
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Sold to Party
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                    {{$invoice->stp }}
                                </td>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-lg font-mono">
                                    @if ($invoice->status)
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
                                    {{$invoice->vehicletype }}
                                </td>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Model Type
                                </th>
                                <th class="px-6 py-3 text-lg font-mono">
                                    {{$invoice->modeltype}}
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Sales Remark
                                </th>
                                <th class="px-6 py-3 text-lg font-mono">
                                    {{$invoice->salesremark}}
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- end --}}
            </div>
        </div>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @include('invoice.partials.invoiceprofile',['data'=>$invoice])
            </div>
        </div>
    @else

    @endif
</x-app-layout>
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
