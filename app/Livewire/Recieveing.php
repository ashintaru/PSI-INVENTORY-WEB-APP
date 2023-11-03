<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\cars;
use App\Models\blocks as bloke;
use App\Models\batching;
use App\Models\blockings;
use Livewire\Attributes\Rule;
use App\Models\findings;
use App\Models\inventory;
use Illuminate\Support\Facades\Auth;


class Recieveing extends Component
{
    #[Rule(['required'])]
    public $vehicleidno;
    #[Rule(['required'])]
    public $recievedBy;
    #[Rule(['required'])]
    public $blockId;

    public $id;
    #[Rule(['required'])]
    public $status;
    // public $recievedBy;


    public $looseItems;

    public $setTools;

    public $damage;

    #[On('select-blockings')]
    public function setBlockings($blockid){
        $this->blockId = $blockid;
    }



    public function edit(){

    }


    // public function reset(){

    // }
    public function update(){
        $cars = cars::where('vehicleidno',$this->vehicleidno)->first();
        $cars->blockings = $this->blockId;
        $cars->recieveBy = $this->recievedBy;
        $cars->status = $this->status;
        $cars->save();
        $this->checkStatus($cars , $this->status);
        $blockings = blockings::find($this->blockId);
        $blockings->blockstatus = 1;
        $blockings->save();
        $this->dispatch('relode-batchlist','');
        $this->vehicleidno = '';
        $this->blockId = '';
        $this->recievedBy = '';
        request()->session()->flash('success','the unit have been selected !!');
        // $cars->blockings
    }


    public function checkStatus(cars $cars = null , $status = null){
        if ($status == 2 || $status == 3) {
            findings::create(
                [
                    'vehicleid'=>$cars->id,
                    'vehicleidno'=>$cars->vehicleidno,
                    'settool'=>strtoupper($this->setTools),
                    'looseitem'=>strtoupper($this->looseItems),
                    'findings'=>strtoupper($this->damage),
                ]
            );

        }else{
            findings::create(
                [
                    'vehicleid'=>$cars->id,
                    'vehicleidno'=>$cars->vehicleidno,
                    'settool'=>'ALL GOODS',
                    'looseitem'=>'ALL GOODS',
                    'findings'=>'ALL GOODS',
                ]
            );
        }
    }

    #[On('select-batch')]
    public function setBatchId($batchId){
        $batch = batching::find($batchId);
        $this->vehicleidno = $batch->vehicleidno;
    }

    public function render()
    {
        $blocks = bloke::get();
        return view('livewire.recieveing',['blocks'=>$blocks]) ->layout('layouts.app');
    }
}
