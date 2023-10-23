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
                    <form method="POST" class="flex-col space-y-2" action="{{URL('update-blockings/'.$invoice->car->vehicleidno) }}">
                        @csrf
                        @method('PUT')
                        <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Block State</h3>
                        <div class="flex flex-shrink-0 gap-3">
                            <div class="w-1/3">
                                <label for="blocks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blocks</label>
                                <div class="w-full">
                                    <select id="blockings" name="blockings" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option  data-url="" value="null" >Select Blocks </option>
                                    @if ($blocks)
                                        @foreach ($blocks as $b)
                                            <option  data-url="" value="{{$b->id}}">{{$b->bloackname}}</option>
                                        @endforeach
                                    @else
                                        <option value="">Ask the admin for the blcokings</option>
                                    @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <x-primary-button>{{ __('Submit') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-3">
                {{-- invoice blocking and date form --}}
                <div class="overflow-x-auto p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <form method="POST" action="{{URL('updatecarsreleasedata/'.$invoice->car->vehicleidno)}}" class="space-y-2">
                        @csrf
                        <div class="flex-col space-y-3">
                            <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Released By</h3>
                            <div class="flex">
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                                </svg>
                            </span>
                            <input type="text" id="website-admin" name="personel" class="rounded-none roundZed-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500  min-w-0 w-1/2 text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            </div>
                            <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Delear</h3>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                                    </svg>
                                </span>
                                <input type="text" id="website-admin" name="dealer" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500  min-w-0 w-1/2 text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                </div>

                            <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Date Released</h3>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                                    </svg>
                                </span>
                                <input type="date" id="website-admin" name="dateReleased" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500  min-w-0 w-1/2 ztext-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Remark</h3>
                            <div class="flex">
                                <textarea id="message" rows="4" name="remark" class="block p-2.5 min-w-0 w-1/2 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                            </div>
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
                                    {{$invoice->car->engineno}}
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    CSNO
                                </th>
                                <th class="px-6 py-3 text-lg font-mono">
                                    {{$invoice->car->csno}}
                                </th>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Model Description
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                    {{$invoice->car->modeldescription}}
                                </td>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Blockings
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                    @if (!$invoice->car->blockings )
                                        Null
                                    @else
                                        {{$invoice->car->blocking->bloackname}}
                                    @endif
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Model Code
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                    {{$invoice->car->mmpcmodelcode}}
                                </td>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Model Year
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                    {{$invoice->car->mmpcmodelyear}}
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Exterior Color Code
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                    {{$invoice->car->extcolorcode}}
                                </td>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Exterior Color
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                   {{$invoice->car->exteriorcolor}}
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Unit Date Encode
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                    {{Carbon\Carbon::parse($invoice->car->dateEncode)->isoformat('MMMM D YYYY ')}}
                                </td>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Unit Time/Date In
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                    {{Carbon\Carbon::parse($invoice->car->dateIn)->isoformat('MMMM D YYYY h:mm a')}}
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Recieve BY
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                    {{$invoice->car->recieveBy}}
                                </td>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Released By
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                    {{$invoice->car->releasedBy}}
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Released Date
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                    @if ($invoice->car->dateReleased)
                                        {{Carbon\Carbon::parse($invoice->car->dateReleased)->isoformat('MMMM D YYYY h:mm a')}}
                                    @else
                                        Not Yet Released...
                                    @endif
                                </td>
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Dealer
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                    {{$invoice->car->dealer}}
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                    Remark
                                </th>
                                <td class="px-6 py-3 text-lg text-center font-mono">
                                    {{$invoice->car->remark}}
                                </td>
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
        @if ($invoice->car->dateReleased && $invoice->car->releasedBy && $invoice->car->dealer)
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-3">
                {{-- invoice blocking and date form --}}
                <div class="overflow-x-auto p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <form method="POST" class="flex-col space-y-2" action="{{URL('released-Unit/'.$invoice->car->vehicleidno) }}">
                        @csrf
                        <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Released this Unit</h3>
                        <x-primary-button>{{ __('Approve') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
        @endif
    @else
        <p>No Record...</p>
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
