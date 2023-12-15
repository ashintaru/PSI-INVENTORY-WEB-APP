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
    public $oldId = null;
    public $currentId = '';
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


    public function select($id){
        // $cars = cars::where('id',$id)->first();
        if(!$this->oldId){
            $this->oldId = $id;
            $car = cars::where('id',$this->oldId)->first();
            // dd($car);
            if($car->touchBy){
                if($car->touchBy == Auth::user()->id){
                    $this->vin = $car->vehicleidno;
                    $this->dispatch('unit-inspection',$this->vin);
                    request()->session()->flash('success','the unit have been moved to batch!!');
                }
                else
                    return request()->session()->flash('failed','someone is editting this');
            }else{
                $car->touchBy = Auth::user()->id;
                $car->save();
                $this->vin = $car->vehicleidno;
                $this->dispatch('unit-inspection',$this->vin);
                request()->session()->flash('success','the unit have been moved to batch!!');
            }
        }else{
            if ($id != $this->oldId ) {
                //find the old unit selected
                $car = cars::where('id',$this->oldId)->first();
                $car->touchBy = null;
                $car->save();
                //setting the id into the old id
                $this->oldId = $id;
                $cars = cars::where('id',$this->oldId)->first();
                if($cars->touchBy){
                    if($car->touchBy == Auth::user()->id){
                        $this->vin = $car->vehicleidno;
                        $this->dispatch('unit-inspection',$this->vin);
                        request()->session()->flash('success','the unit have been moved to batch!!');
                    }
                    else
                        return request()->session()->flash('failed','someone is editting this');
                }else{
                    $cars->touchBy = Auth::user()->id;
                    $cars->save();
                    $this->vin = $cars->vehicleidno;
                    $this->dispatch('unit-inspection',$this->vin);
                    request()->session()->flash('success','the unit have been moved to batch!!');

                }
            }
        }
    }
}
