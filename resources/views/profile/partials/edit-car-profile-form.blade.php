<form class="" action="{{URL('update-car-details/'.$car->id)}}" method="POST">
    @csrf
    @method('PUT');
    @if (!empty($car))
        <div class="flex flex-row gap-4 w-full">
            <div class="w-full">
                <label for="mmpcmodelcode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MMPC MODEL CDOE</label>
                <input type="text" id="mmpcmodelcode" value="{{ $car->mmpcmodelcode }}" name="mmpcmodelcode" class="@error('mmpcmodelcode') invalid:border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="mmpcmodelcode">
                @error('mmpcmodelcode')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full">
                <label for="mmpcmodelyear" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">YEAR</label>
                <input type="number" min="1900" max="2099" step="1" name="mmpcmodelyear" value="{{ $car->mmpcmodelyear }}" id="mmpcmodelyear" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ex:2023" >
                @error('mmpcmodelcode')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror

            </div>
            <div class="w-full">
                <label for="mmpcoptioncode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MMPC CAPTION CODE</label>
                <input type="text"  id="mmpcoptioncode" name="mmpcoptioncode"  value="{{ $car->mmpcoptioncode }}"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="097" >
                @error('mmpcoptioncode')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full">
                <label for="extcolorcode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">EXTAR COLOR CODE</label>
                <input type="text" id="extcolorcode" name="extcolorcode" value="{{ $car->extcolorcode }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0P75" >
                @error('extcolorcode')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror

            </div>

        </div>
        <div class="flex flex-row gap-4 w-full">
            <div class="w-full">
                <label for="modeldescription" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MODEL DESCRIPTION</label>
                <input type="text" id="modeldescription" name="modeldescription" value="{{ $car->modeldescription }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="WHITE TEMPLATE WITH SHADY BLACK" >
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
                <input type="text" id="exteriorcolor" value="{{ $car->exteriorcolor }}" name="exteriorcolor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="RED METALIC" >
                @error('exteriorcolor')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full">
                <label for="csno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CS NO</label>
                <input type="text" id="csno" name="csno" value="{{ $car->csno }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="098" >
                @error('csno')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full">
                <label for="bilingdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BILING DATE</label>
                <input type="date"value="{{ $car->bilingdate }}" id="bilingdate" name="bilingdate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="RED METALIC" >
                @error('bilingdate')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex flex-row ">
            <div class="w-full">
                <label for="vehicleidno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">VEHICLE IDENTITY NUMBER (VIN)</label>
                <input type="text" id="vehicleidno" value="{{$car->vehicleidno }}" name="vehicleidno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="098" >
                @error('vehicleidno')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex flex-row ">
            <div class="w-full">
                <label for="engineno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ENGINE NUMBER</label>
                <input type="text" value="{{ $car->engineno }}" id="engineno" name="engineno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="098" >
                @error('engineno')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex flex-row ">
            <div class="w-full">
                <label for="productioncbunumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PRODUCTION NUMBER</label>
                <input type="number" id="productioncbunumber" value="{{ $car->productioncbunumber }}" name="productioncbunumber" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="098" >
                @error('productioncbunumber')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex flex-row gap-4 w-full">
            <div class="w-full">
                <label for="mmpcmodelcode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BILLING DOCUMENTS</label>
                <input type="number" value="{{ $car->bilingdocuments }}" id="bilingdocuments" name="bilingdocuments" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="234567890" >
                @error('bilingdocuments')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="w-full">
                <label for="mmpcmodelyear" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">VEHICLE STOCK YARD</label>
                <input type="text" value="{{ $car->vehiclestockyard }}" name="vehiclestockyard" id="vehiclestockyard" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="7890987" >
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





    @endif

</form>
