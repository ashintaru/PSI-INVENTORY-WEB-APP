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
use Illuminate\Support\Facades\Validator;

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

    public $findings;

    public $showfindings = false;


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


    public function triggerfinding(){
        $this->dispatch('show-findings');
        $this->showfindings = true;
    }

    public function goodswithfindings(){
        $validate = Validator::make(
            ['vehicleidno' => $this->vehicleidno, 'blockings' => $this->blockings,'recievedBy'=>$this->recievedBy,'findings'=>$this->findings],
            // Validation rules to apply...
            ['vehicleidno' => 'required', 'blockings' => 'required','recievedBy'=>'required|min:3','findings'=>'required'],
            // Custom validation messages...
            ['required' => 'The :attribute field is required'],
        )->validate();




        $car = cars::where('vehicleidno',$this->vehicleidno)->first();
        $this->checkBlockings($car);
        $car->recieveBy = $this->recievedBy;
        $car->status = 1;
        $car->save();
        findings::create(
            [
                'vehicleid'=>$car->id,
                'vehicleidno'=>$car->vehicleidno,
                'findings'=>strtoupper($this->findings),
            ]
        );
        batching::create([
            'vehicleid'=>$car->id,
            'vehicleidno'=>$car->vehicleidno,
            'userid'=>Auth::user()->id
        ]);
        $this->dispatch('relode-batchlist');
        request()->session()->flash('success','the unit have been selected !!');
        $this->reset(['recievedBy','vehicleidno','blockings','findings']);
        $this->showfindings = false;


    }
    public function goods(){
        $this->showfindings = false;
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
