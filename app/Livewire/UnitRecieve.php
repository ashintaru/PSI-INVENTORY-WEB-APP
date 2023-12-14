<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\cars;
use Livewire\WithPagination;
use App\Models\batching;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use App\Events\selectedUnit;

class UnitRecieve extends Component
{
    use WithPagination;
    public $search;
    public $vin = null;
    public $edit = true;
    public $selectedUnit;

    #[On('unit-batch'),On('removed-batch'),On('relode-batchlist')]
    public function render()
    {
        $data = cars::where('status',null)
        ->where('vehicleidno', 'LIKE', "%{$this->search}%")
        ->paginate(10);
        return view('livewire.unit-recieve',['data'=>$data]);
    }


    public function select($id){
        // sleep(2);
        $cars = cars::where('id',$id)->first();
        $this->vin = $cars->vehicleidno;
        $this->dispatch('unit-inspection',$this->vin);
        request()->session()->flash('success','the unit have been moved to batch!!');
        // return dd($cars)
        selectedUnit::dispatch();
    }
}
