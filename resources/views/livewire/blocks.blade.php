<div>
    <select  wire:model.lazy="blockid" wire:click="select" name="blocks" class="block mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
        @if ($blocks)
            <option>....</option>
            @foreach ($blocks as $b)
                <option  data-url="" value="{{$b->id}}">{{$b->blockname}}</option>
            @endforeach
        @else
            <option  value="">Ask the admin for the blcokings</option>
        @endif
    </select>

</div>