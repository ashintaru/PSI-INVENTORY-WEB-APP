<div wire:poll>
    <form method="POST" class="" action="{{ URL('create-account') }}">
        <!-- Email Address -->
        <div class="flex ">
           <div class="w-1/4l p-3">
            <div wire:loading wire:target="$emit('select-batch')" class="px-3 py-1 text-xs font-medium leading-none text-center text-blue-800 bg-blue-200 rounded-full animate-pulse dark:bg-blue-900 dark:text-blue-200">loading...</div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input  id="email" class="block mt-1 w-full" type="email" name="email" value="{{$vehicleidno}}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
           </div>
           <div class="w-1/4 p-3">
            <div class="flex-col ">
                <select name="blocks" class=" blocks bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option  data-url="" value="null" >Select Blocks </option>
                @if ($blocks)
                    @foreach ($blocks as $b)
                        <option  data-url="" value="{{URL('getblocks/'.$b->id)}}">{{$b->blockname}}</option>
                    @endforeach
                @else
                    <option  value="">Ask the admin for the blcokings</option>
                @endif
                </select>
                <select wire:ignore.self id="blockings" name="blockings" class="blockings bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </select>
            </div>
           </div>
        </div>
        <div class="flex items-center justify-end p-1">
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <div class="flex justify-evenly">
        <div class="">
            <h1>hi</h1>
            @livewire('unit-recieve')
        </div>
        <div>
            @livewire('batchingg')
        </div>
    </div>
<!-- Modal toggle -->

  <!-- Main modal -->
  {{-- <div id="setToolModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Terms of Service
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="setToolModal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-6 space-y-6">
                  <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                </p>
              </div>
              <!-- Modal footer -->
              <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                  <button data-modal-hide="setToolModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                  <button data-modal-hide="setToolModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
              </div>
          </div>
      </div>
  </div> --}}
</div>
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
