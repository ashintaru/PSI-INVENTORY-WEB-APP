<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\cars;
use App\Models\blocks as bloke;
use App\Models\batching;
use Illuminate\Support\Facades\Auth;

class Recieveing extends Component
{
    public $vehicleidno;
    public $recievedBy;
    public $blockId;
    public $id;
    // public $recievedBy;


    #[On('select-batch')]
    public function setBatchId($batchId){
        $batch = batching::find($batchId);
        $this->vehicleidno = $batch->vehicleidno;
        // return dd($batchId);
    }
    public function render()
    {
        $blocks = bloke::get();
        return view('livewire.recieveing',['blocks'=>$blocks]) ->layout('layouts.app');
    }
}
