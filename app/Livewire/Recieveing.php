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
    public $status;
    // public $recievedBy;

    #[On('select-blockings')]
    public function setBlockings($blockid){
        $this->blockId = $blockid;
    }

    public function update(){
        $cars = cars::where('vehicleidno',$this->vehicleidno)->first();
        $cars->blockings = $this->blockId;
        $cars->recieveBy = $this->recievedBy;
        $status = ($this->status == 1 || $this->status == 2 )?1:9;
        $cars->status = $status;
        $cars->save();

        $this->dispatch('relode-batchlist');
        request()->session()->flash('success','the unit have been selected !!');
        // $cars->blockings
    }

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
