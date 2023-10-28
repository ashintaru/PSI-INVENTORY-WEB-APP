<div>
    <select wire:model="blockingsId" wire:click="select" id="blocks"  name="blocks" class="block  mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            @if ($blockings)
                @foreach ($blockings as $b)
                    <option value="{{$b->id}}" >{{$b->bloackname}}</option>
                @endforeach
            @else
                <option>...</option>
            @endif
    </select>
</div>
