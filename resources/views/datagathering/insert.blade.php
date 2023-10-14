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
              <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Manual Input</span>
            </div>
          </li>
        </ol>
    </nav>
    <x-alert-error></x-alert-error>
    <x-alert-success></x-alert-success>

	<div class="py-3">

        <form class="" action="{{URL('insert-car-details ')}}" method="POST">
            @csrf
            <div class="flex flex-row gap-4 w-full">
                <div class="w-full">
                    <label for="mmpcmodelcode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MMPC MODEL CDOE</label>
                      <input type="text" id="mmpcmodelcode" value="{{ old('mmpcmodelcode') }}" name="mmpcmodelcode" class="@error('mmpcmodelcode') invalid:border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="mmpcmodelcode">
                    @error('mmpcmodelcode')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="mmpcmodelyear" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">YEAR</label>
                    <input type="number" min="1900" max="2099" step="1" name="mmpcmodelyear" value="{{ old('mmpcmodelyear') }}" id="mmpcmodelyear" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ex:2023" >
                    @error('mmpcmodelcode')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror

                </div>
                <div class="w-full">
                    <label for="mmpcoptioncode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MMPC CAPTION CODE</label>
                    <input type="text"  id="mmpcoptioncode" name="mmpcoptioncode"  value="{{ old('mmpcoptioncode') }}"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="097" >
                    @error('mmpcoptioncode')
                         <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="extcolorcode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">EXTAR COLOR CODE</label>
                      <input type="text" id="extcolorcode" name="extcolorcode" value="{{ old('extcolorcode') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0P75" >
                    @error('extcolorcode')
                         <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror

                </div>

              </div>
              <div class="flex flex-row gap-4 w-full">
                <div class="w-full">
                    <label for="modeldescription" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MODEL DESCRIPTION</label>
                    <input type="text" id="modeldescription" name="modeldescription" value="{{ old('modeldescription') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="WHITE TEMPLATE WITH SHADY BLACK" >
                    @error('modeldescription')
                         <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-1/3">
                </div>
              </div>
              <div class="flex flex-row gap-4 w-full">
                <div class="w-full">
                    <label for="exteriorcolor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">EXTERIOR COLOR</label>
                    <input type="text" id="exteriorcolor" value="{{ old('exteriorcolor') }}" name="exteriorcolor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="RED METALIC" >
                    @error('exteriorcolor')
                         <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="csno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CS NO</label>
                    <input type="text" id="csno" name="csno" value="{{ old('csno') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="098" >
                    @error('csno')
                         <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="bilingdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BILING DATE</label>
                    <input type="date"value="{{ old('bilingdate') }}" id="bilingdate" name="bilingdate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="RED METALIC" >
                    @error('bilingdate')
                         <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
              </div>
              <div class="flex flex-row ">
                <div class="w-full">
                    <label for="vehicleidno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">VEHICLE IDENTITY NUMBER (VIN)</label>
                    <input type="text" id="vehicleidno" value="{{ old('vehicleidno') }}" name="vehicleidno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="098" >
                    @error('vehicleidno')
                         <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
              </div>
              <div class="flex flex-row ">
                <div class="w-full">
                    <label for="engineno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ENGINE NUMBER</label>
                    <input type="text" value="{{ old('engineno') }}" id="engineno" name="engineno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="098" >
                    @error('engineno')
                         <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
              </div>
              <div class="flex flex-row ">
                <div class="w-full">
                    <label for="productioncbunumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PRODUCTION NUMBER</label>
                    <input type="number" id="productioncbunumber" value="{{ old('productioncbunumber') }}" name="productioncbunumber" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="098" >
                     @error('productioncbunumber')
                         <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
              </div>
              <div class="flex flex-row gap-4 w-full">
                <div class="w-full">
                    <label for="mmpcmodelcode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BILLING DOCUMENTS</label>
                      <input type="number" value="{{ old('bilingdocuments') }}" id="bilingdocuments" name="bilingdocuments" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="234567890" >
                     @error('bilingdocuments')
                         <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full">
                    <label for="mmpcmodelyear" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">VEHICLE STOCK YARD</label>
                    <input type="text" value="{{ old('vehiclestockyard') }}" name="vehiclestockyard" id="vehiclestockyard" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="7890987" >
                     @error('vehiclestockyard')
                         <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
              </div>
            </div>

              <div class="flex flex-row gap-4 w-full">
                <x-primary-button>Submit</x-primary-button>

              </div>

            </div>

        </form>
    </div>
</x-app-layout>
