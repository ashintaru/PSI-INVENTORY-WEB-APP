<x-app-layout>
    @if (!is_null($car))
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <section class="space-y-4 ">
                    @if (!is_null($car))
                        <nav class="justify-between px-4 py-3 text-gray-700 border border-gray-200 rounded-lg sm:flex sm:px-5 bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-3 sm:mb-0">
                                <li>
                                    <div class="flex items-center">
                                    <a href="{{URL('recieve')}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Database</a>
                                    </div>
                                </li>
                                <li aria-current="page">
                                    <div class="flex items-center">
                                    <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <a href="{{URL('view/'.$car->id)}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">{{$car->vehicleidno}}</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <x-alert-error></x-alert-error>
                        <x-alert-success></x-alert-success>
                        <div class="relative overflow-x-auto  shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                            Loose Tool's
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Set Tool's
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                            Damage
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Check Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $index=0;
                                    @endphp
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <th scope="row" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            @if ($car->status->hasloosetool==1)
                                            @php
                                                $index++;
                                            @endphp
                                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">checked</span>
                                            @else
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Pending</span>
                                            @endif
                                        </th>
                                        <td class="px-6 py-4 text-center">
                                            @if ($car->status->hassettool==1)
                                            @php
                                                $index++;
                                            @endphp
                                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">checked</span>
                                            @else
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Pending</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 bg-gray-50 text-center dark:bg-gray-800">
                                            @if ($car->status->hasdamage==1)
                                            @php
                                                $index++;
                                            @endphp
                                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">checked</span>
                                            @else
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Pending</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            @if ($car->status->hasloosetool==1 && $car->status->hassettool==1 && $car->status->hasdamage==1 )
                                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">checked</span>
                                            @else
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">{{$index}}/3</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="flex flex-row overflow-x-auto p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="space-y-2 ">
                                <form action="{{URL('update-car-details/'.$car->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid md:grid-cols-3 md:gap-6">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="text" id="carid" name="extcolorcode" value="{{ $car->id }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" disabled />
                                            <label for="carid" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Unit Data ID</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            @if ($car->blockings != "empty")
                                                <input type="text"  id="UnitBlockings" value="{{ $car->blocking->bloackname }}" name="exteriorcolor"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" disabled/>
                                                <label for="UnitBlockings" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Unit Blockings</label>
                                            @else
                                                <input type="text"  id="UnitBlockings" value="{{ $car->blockings}}" name="exteriorcolor"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" disabled/>
                                                <label for="UnitBlockings" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Unit Blockings</label>
                                            @endif

                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="text"  id="UnitTag" value="{{ $car->tag }}" name="exteriorcolor"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" disabled/>
                                            <label for="UnitTag" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Unit Client Tag</label>
                                        </div>
                                    </div>
                                    <div class="grid md:grid-cols-3 md:gap-6">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="text" id="vehicleidno" value="{{$car->vehicleidno }}" name="vehicleidno"   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                                            <label for="vehicleidno"  class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Vehice Identification Number</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="text" value="{{ $car->engineno }}" id="engineno" name="engineno" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  required />
                                            <label for="engineno" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Engine Number</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="text" id="csno" name="csno" value="{{ $car->csno }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  required />
                                            <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">CS Number</label>
                                        </div>
                                    </div>
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="text" id="modeldescription"  name="modeldescription" value="{{ $car->modeldescription }}"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  required />
                                        <label for="modeldescription" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Model Description</label>
                                    </div>
                                    <div class="grid md:grid-cols-3 md:gap-6">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="text" name="mmpcmodelcode" value="{{ $car->mmpcmodelcode }}" id="mmpcmodelcode" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                                            <label for="mmpcmodelcode"  class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">MMPC Model Code</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="number" min="2000" max="3000"  id="mmpcmodelyear" name="mmpcmodelyear" value="{{ $car->mmpcmodelyear }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  required />
                                            <label for="mmpcmodelyear" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">MMPC Model Year</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="text" id="mmpcoptioncode" name="mmpcoptioncode" value="{{ $car->mmpcoptioncode }}"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  required />
                                            <label for="mmpcoptioncode" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">MMPC CAPTION CODE</label>
                                        </div>
                                    </div>
                                    <div class="grid md:grid-cols-2 md:gap-6">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="text" id="extcolorcode" name="extcolorcode" value="{{ $car->extcolorcode }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                            <label for="extcolorcode" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Extra Color</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="text"  id="exteriorcolor" value="{{ $car->exteriorcolor }}" name="exteriorcolor"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                            <label for="exteriorcolor" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Exterior Color</label>
                                        </div>
                                    </div>
                                    <div class="grid md:grid-cols-4 md:gap-6">
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="date"value="{{ $car->bilingdate }}" id="bilingdate" name="bilingdate"class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                                            <label for="bilingdate"  class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Billing Date</label>
                                            <span class="text-xs text-gray-400">Year-Month-Day</span>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="text"min="2000" max="3000" maxlength="4" minlength="4" value="{{ $car->bilingdocuments }}" id="bilingdocuments" name="bilingdocuments" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  required />
                                            <label for="bilingdocuments" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Billing Documents</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="text" id="productioncbunumber"  value="{{ $car->productioncbunumber }}" name="productioncbunumber" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  required />
                                            <label for="productioncbunumber" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Production Number</label>
                                        </div>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="text"  value="{{ $car->vehiclestockyard }}" name="vehiclestockyard" id="vehiclestockyard" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  required />
                                            <label for="vehiclestockyard" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Stock Yard</label>
                                        </div>
                                    </div>
                                    <div class="flex flex-row gap-4 w-full">
                                        <x-primary-button>Update</x-primary-button>
                                    </div>
                                </form>
                            </div>
                            <div class="flex flex-col space-y-1">
                                <a href="{{URL('createloosetools/'.$car->id)}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                       <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                       <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                                    </svg>
                                    <span class="ml-3">Loose Tool's</span>
                                 </a>
                                 <a href="{{URL('createsettools/'.$car->id)}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                       <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                       <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                                    </svg>
                                    <span class="ml-3">Set Tool's</span>
                                 </a>
                                 <a href="{{URL('createdamage/'.$car->id)}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                       <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                       <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                                    </svg>
                                    <span class="ml-3">Damage</span>
                                 </a>
                            </div>
                        </div>
                        <div class="overflow-x-auto p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <form method="POST" class="flex-col space-y-2" action="{{URL('update-blockings/'.$car->id)}}">
                                @csrf
                                @method('PUT')
                                <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Block State</h3>
                                <div class="flex flex-shrink-0 gap-3">
                                    <div class="w-1/3">
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
                                    <div class="w-1/3">
                                        <label for="blocks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blockings</label>
                                        <div class="w-full">
                                            <select  id="blockings" name="blockings" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </select>
                                        </div>
                                        @error('mmpcoptioncode')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <x-primary-button>{{ __('Submit') }}</x-primary-button>
                            </form>
                        </div>
                        <div class="overflow-x-auto p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <form method="POST" action="{{URL('update-inventory/'.$car->id)}}" class="space-y-2">
                                @csrf
                                <div class="flex-col space-y-3">
                                    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Unit Status</h3>
                                    <ul class="space-y-2 w-1/2 items-center text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        <li class="w-1/2 border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="horizontal-list-radio-license" type="radio"
                                                name="status"
                                                @if($car->status->havebeenpassed == "1") checked @endif
                                                value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="horizontal-list-radio-license" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pass</label>
                                            </div>
                                        </li>
                                        <li class="w-1/2 border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="horizontal-list-radio-id" type="radio"
                                                name="status"
                                                @if($car->status->havebeenpassed == "0") checked @endif
                                                value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="horizontal-list-radio-id" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Failled</label>
                                            </div>
                                        </li>
                                    </ul>
                                    <x-primary-button>{{ __('update') }}</x-primary-button>
                                </div>
                            </form>
                        </div>
                    @else
                        <p> Empyty Value ....</p>
                    @endif

                    </section>
            </div>
        </div>
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

