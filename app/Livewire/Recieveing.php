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
use Illuminate\Support\Facades\Auth;


class Recieveing extends Component
{
    #[Rule('required')]
    public $vehicleidno;

    // #[Rule('required')]
    // public $selectedBlocks;

    public $selectedBlockings = [];

    #[Rule('required')]
    public $recievedBy;

    // public $recievedBy;

    #[Rule('required')]
    public $blockings;




    #[On('get-blockings')]
    public function selectedBlocks($blockid){
        // dd($value);
        $this->selectedBlockings = blockings::select(['id','bloackname'])->where('blockId',$blockid)->where('blockstatus',0)->get();
    }
    #[On('relode-batchlist')]
    public function resetselectedBlocks(){
        // dd($value);
        $this->selectedBlockings = blockings::select(['id','bloackname'])->where('blockId',0)->where('blockstatus',0)->get();
    }

    #[On('unit-inspection')]
    public function setvehicleidno($vin){
        $this->vehicleidno = $vin;
    }

    public function goods(){
        $this->validate();
        $car = cars::where('vehicleidno',$this->vehicleidno)->first();
        $this->checkBlockings($car);
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
        batching::create([
            'vehicleid'=>$car->id,
            'vehicleidno'=>$car->vehicleidno,
            'userid'=>Auth::user()->id
        ]);
        $this->dispatch('relode-batchlist');
        request()->session()->flash('success','the unit have been selected !!');
        $this->reset(['recievedBy','vehicleidno','blockings']);
        // return dd("hello");
    }

    public function checkBlockings(cars $car){

        if($car->blockings === null){
            $car->blockings = $this->blockings;
            $blockings = blockings::find($this->blockings);
            $blockings->blockstatus = 1;
            $blockings->save();
        }else{
            $oldblockings = blockings::find($car->blockings);
            $oldblockings->blockstatus = 0;
            $oldblockings->save();

            $car->blockings = $this->blockings;
            $blockings = blockings::find($this->blockings);
            $blockings->blockstatus = 1;
            $blockings->save();
        }
    }
    public function render()
    {
        $blocks = bloke::get();
        return view('livewire.recieveing',['blocks'=>$blocks]) ->layout('layouts.app');
    }
}
