<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use App\Models\cars;
use App\Models\invoce;
use App\Models\blockings;
use App\Models\blockingHistory as history;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;


class Invoice extends Component
{
    public $selectedBlockings = [];
    public $blockings ='';
    public $movedBy ='';
    public $unitId;
    public $vin = '';
    //REMOVED INVOICE BLOCKING

    #[On('get-blockings'),On('reset-block')]
    public function selectedBlocks($blockid){
        $this->selectedBlockings = blockings::select(['id','bloackname'])->where('blockId',$blockid)->where('blockstatus',0)->get();
    }

    public function selectedUnit($id = null , $action = null){
        // $this->reset(['movedBy','vin']);
        $this->unitId = $id;
        $car = cars::where('id',$this->unitId)->first();
        $this->vin = $car->vehicleidno;
    }

    public function updateUnit(){
        $validate = Validator::make(
            ['blockings' => $this->blockings , 'movedBy'=> $this->movedBy ],
            // Validation rules to apply...
            ['blockings' => 'required' , 'movedBy' => 'required|min:3'],
            // Custom validation messages...
            ['required' => 'the Unit is required to give  a status'],
        )->validate();
        $car = cars::where('id',$this->unitId)->first();
        $this->blockingHistory($car,$this->blockings,$this->movedBy);
        $this->checkBlockings($car);
        $car->movedBy = $this->movedBy;
        $car->save();
        $this->reset(['selectedBlockings','movedBy','selectedBlockings','unitId','vin']);


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


    public function blockingHistory(cars $car = null  , $blockings = null ,$movedBy = null)
    {
        history::create(
            [
                'vehicleid'=>$car->id,
                'from'=>$car->blockings,
                'to'=>$blockings,
                'user'=>$movedBy,
                'createdBy'=>Auth::user()->id
            ]
        );

    }

    public function render()
    {
        $blockings = blockings::select(['id','bloackname'])->where('blockId',12)->where('blockstatus',0)->get();
        $invoice = invoce::where('status',0)->get();
        $vinArray = $invoice->pluck('vehicleidno');
        $cars = cars::with(['inventory','blocking','client'])
        ->whereIn('vehicleidno',$vinArray)
        ->paginate(25);
        return view('livewire.invoice',['cars'=>$cars,'blockings'=>$blockings]);
    }
}
