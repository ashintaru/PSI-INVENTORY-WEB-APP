<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\cars;
use App\Models\invoce;
use App\Models\blockings;
use Livewire\Attributes\On;

class Invoice extends Component
{
    public $isEditBlocking = false;
    public $selectedBlocking ;
    public $selectedUnitforblocking;
    public $vin = '';

    public function selectedUnit($id = null){
        $this->isEditBlocking = true;
        $this->selectedUnitforblocking = $id;
        $this->vin = cars::select('vehicleidno')->where('id',$id)->first();
    }

    public function setInvoiceBlocking(){
        $car = cars::where('id',$this->selectedUnitforblocking)->first();
        // dd($car);
    if(!isset($car->invoiceBlock)){
            $ivtblockings = blockings::find($this->selectedBlocking);
            $ivtblockings->blockstatus = 1;
            $car->invoiceBlock = $this->selectedBlocking;
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
            $ivtblockings->save();
            $invBlocking = blockings::find($car->blockings);
            $invBlocking->blockstatus = 0;
            $invBlocking->save();
            $car->save();

        }
        // dd($car);
        // $this->dispatch('reset-block');
        request()->session()->flash('success','the unit have been selected !!');

    }


    #[On('reset-block')]
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
