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
    #[Rule('required')]
    public $selectedBlocking ;
    public $selectedUnitforblocking;
    #[Rule('required')]
    public $movedBy = 'rOASA';
    public $ismovedBy = false;
    #[Rule('required')]
    public $vin = '';

    public function selectedUnit($id = null , $action = null){
        if($action == null)
            return ;
        else{
            if($action == 1){
                $this->ismovedBy = false;
                $this->isEditBlocking = true;
                $this->selectedUnitforblocking = $id;
                $this->vin = cars::select('vehicleidno')->where('id',$id)->first();
            }elseif($action == 2){
                $this->isEditBlocking = false;
                $this->ismovedBy = true;
                $this->selectedUnitforblocking = $id;
                $this->vin = cars::select('vehicleidno')->where('id',$id)->first();
            }else
                return ;
        }
    }

    public function setMovedBy(){
        $car = cars::where('id',$this->selectedUnitforblocking)->first();
        $car->movedBy = $this->movedBy ;
        $car->save();
        $this->reset(['selectedUnitforblocking','vin']);
        $this->movedBy = "";
        // request()->session()->flash('success','the unit have been selected !!');

    }

    public function setInvoiceBlocking(){
        $car = cars::where('id',$this->selectedUnitforblocking)->first();
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
        request()->session()->flash('success','the unit have been selected !!');
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
