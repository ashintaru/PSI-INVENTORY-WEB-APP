<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\cars;
use App\Models\invoce;
use App\Models\blockings;
use App\Models\blockingHistory as history;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;


class Invoice extends Component
{
    public $isEditBlocking = false;
    #[Rule('required')]
    public $selectedBlocking ;
    public $selectedUnitforblocking;
    #[Rule('required')]
    public $movedBy ='';
    public $ismovedBy = false;
    #[Rule('required')]
    public $vin = '';
    public $carblockings;
    public $selectedBlockings = [];
    #[Rule('required')]
    public $blockingselect = '';


    #[On('get-blockings'),On('reset-block')]
    public function selectedBlocks($blockid){
        $this->selectedBlockings = blockings::select(['id','bloackname'])->where('blockId',$blockid)->where('blockstatus',0)->get();
        // dd($this->selectedBlockings);
    }

    public function selectedUnit($id = null , $action = null){
        if($action == null)
            return ;
        else{
            $this->reset(['movedBy','vin','selectedBlocking','carblockings']);
            $this->isEditBlocking = true;
            $car = cars::where('id',$id)->first();
            $this->vin = $car->vehicleidno;
            $this->selectedUnitforblocking = $id;
            $this->movedBy = ($car->movedBy)?$car->movedBy:'';
            $this->selectedBlocking = ($car->invoiceBlock)?$car->invoiceBlock:'';
            $this->carblockings = $car->blockings;
        }
    }

    public function setInvoiceBlocking(){
        $car = cars::where('id',$this->selectedUnitforblocking)->first();
        $this->blockingHistory($car,$this->selectedBlocking,$this->movedBy);




        request()->session()->flash('success','the unit have been selected !!');
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
