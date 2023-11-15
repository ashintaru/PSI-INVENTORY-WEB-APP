<div class="">
    <span wire:loading wire:target="select" class="text-xs text-green-400">Searching....</span>
    <select  id="block"  wire:model="blockid" wire:click="select"  name="blocks" class="block mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
        @if ($blocks)
            <option value="">Block</option>
            @foreach ($blocks as $b)
                <option  value="{{$b->id}}">{{$b->blockname}}</option>
            @endforeach
        @else
            <option  value="">Ask the admin for the blcokings</option>
        @endif
    </select>
</div>
