<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\blockings;
use Livewire\WithPagination;
use App\Models\cars;

class Blockingview extends Component
{
    use WithPagination;

    public $blockId = '';
    public function mount($id){
        $this->blockId = $id;
    }

    public function fetchCar($id = null){
        $car = cars::where('blockings',$id)->first();
        return response()->json($car);
    }

    public function render()
    {
        $blockings = blockings::with(['block'])->where('blockId',$this->blockId)->paginate(25);
        // dd($blockings);
        return view('livewire.blockingview',['blockings'=>$blockings]);
    }
}
