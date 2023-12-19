<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\cars;
use Livewire\WithPagination;
use App\Models\batching;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class UnitRecieve extends Component
{
    use WithPagination;
    public $search;
    public $oldId;
    public $currentId;
    public $vin = null;
    public $edit = true;
    public $selectedUnit;


    #[On('unit-batch'),On('removed-batch'),On('relode-batchlist')]
    public function render()
    {
        $data = cars::with(['user'])->where('status',null)
        ->where('vehicleidno', 'LIKE', "%{$this->search}%")
        ->paginate(10);
        return view('livewire.unit-recieve',['data'=>$data]);
    }

    public function resetSelected(){

    }

    public function select($id){

        $car = cars::where('id',$id)->first();
        if($car->touchBy == null){
            $car->touchBy = Auth::user()->id;
            $car->save();
            $this->vin = $car->vehicleidno;
            $this->dispatch('unit-inspection',$this->vin);
            request()->session()->flash('success','the unit have been moved to batch!!');
        }else{
            if($car->touchBy == Auth::user()->id){
                $this->vin = $car->vehicleidno;
                $this->dispatch('unit-inspection',$this->vin);
                request()->session()->flash('success','the unit have been moved to batch!!');
            }else{
                return request()->session()->flash('failed','someone is editting this');
            }
        }
    }
}
