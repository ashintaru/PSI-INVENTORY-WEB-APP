<div>
    <select  id="blocks"  name="blocks" class="blocks bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @if ($blockings)
                @foreach ($blockings as $b)
                    <option  data-url="" >{{$b->bloackname}}</option>
                @endforeach
            @else
                <option value="">Ask the admin for the blcokings</option>
            @endif
    </select>
</div>
