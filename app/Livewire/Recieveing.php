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
    public $vehicleidno = null;
    public $selectedBlocks = null;
    public $selectedBlockings = [];
    #[Rule(['required'])]
    public $recievedBy;
    #[Rule(['required'])]
    public $blockId;

    public $id;
    #[Rule(['required'])]
    public $status;
    // public $recievedBy;
    public $blockings;

    public $looseItems;

    public $setTools;

    public $damage;



    public function updatedstatus(){
        $this->dispatch('post-created');
    }
    public function select(){
        $this->dispatch('post-created');
    }
    public function updatedselectedBlocks($value){
        $this->selectedBlockings = blockings::select(['id','bloackname'])->where('blockId',$this->selectedBlocks)->where('blockstatus',0)->get();
        // dump($this->selectedBlockings);
    }
    #[On('unit-inspection')]
    public function setvehicleidno($vin){
        $this->vehicleidno = $vin;
        // return dd($this->vehicleidno);
    }

    public function goods(){
        $car = cars::where('vehicleidno',$this->vehicleidno)->first();
        if($car->blockings === null){
            $car->blockings = $this->blockings;
        }
        $car->recieveBy = $this->recievedBy;
        $car->status = 1;
        $car->save();
        findings::create(
            [
                'vehicleid'=>$car->id,
                'vehicleidno'=>$car->vehicleidno,
                'settool'=>'ALL GOODS',
                'looseitem'=>'ALL GOODS',
                'findings'=>'ALL GOODS',
            ]
        );
        $blockings = blockings::find($this->blockings);
        $blockings->blockstatus = 1;
        $blockings->save();
        $this->dispatch('relode-batchlist','');
        batching::create([
            'vehicleid'=>$car->id,
            'vehicleidno'=>$car->vehicleidno,
            'userid'=>Auth::user()->id
        ]);

        request()->session()->flash('success','the unit have been selected !!');
        $this->reset(['vehicleidno','blockings','recievedBy']);


    }


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
    #[On('relode-batchlist')]
    public function updatedselectedBlockings(){
        $this->selectedBlockings = [];
    }
    public function render()
    {
        $blocks = bloke::get();
        return view('livewire.recieveing',['blocks'=>$blocks]) ->layout('layouts.app');
    }
}
