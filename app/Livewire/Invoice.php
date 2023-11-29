<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\cars;
use App\Models\invoce;
use App\Models\blockings;
use App\Models\blockingHistory as history;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;

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

    public function setMovedBy(){
        $car = cars::where('id',$this->selectedUnitforblocking)->first();
        $car->save();
        $this->reset(['selectedUnitforblocking','vin']);
        $this->movedBy = "";
        // request()->session()->flash('success','the unit have been selected !!');

    }

    public function setInvoiceBlocking(){
        $car = cars::where('id',$this->selectedUnitforblocking)->first();
        $this->blockingHistory($car,$this->selectedBlocking,$this->movedBy);
        if(!isset($car->invoiceBlock)){
            $ivtblockings = blockings::find($this->selectedBlocking);
            $ivtblockings->blockstatus = 1;
            $car->invoiceBlock = $this->selectedBlocking;
            $car->movedBy = $this->movedBy ;
            $invBlocking = blockings::find($car->blockings);
            $invBlocking->blockstatus = 0;
            $ivtblockings->save();
            $invBlocking->save();
            $car->save();
        }else{
            $oldblockings = blockings::find($car->invoiceBlock);
            $oldblockings->blockstatus = 0;
            $oldblockings->save();
            $ivtblockings = blockings::find($this->selectedBlocking);
            $ivtblockings->blockstatus = 1;
            $car->invoiceBlock = $this->selectedBlocking;
            $car->movedBy = $this->movedBy ;
            $ivtblockings->save();
            $invBlocking = blockings::find($car->blockings);
            $invBlocking->blockstatus = 0;
            $invBlocking->save();
            $car->save();

        }
        request()->session()->flash('success','the unit have been selected !!');
    }

    public function blockingHistory(cars $car = null  , $blockings = null ,$movedBy = null)
    {
        history::create(
            [
                'vehicleid'=>$car->id,
                'from'=>$car->blockings,
                'to'=>$blockings,
                'user'=>$movedBy
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
