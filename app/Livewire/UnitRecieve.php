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

    #[On('unit-batch')]
    public function render()
    {
        $data = cars::where('status',null)
        ->where('vehicleidno', 'LIKE', "%{$this->search}%")
        ->paginate(10);
        return view('livewire.unit-recieve',['data'=>$data]);
    }
    public function select($id){
        sleep(2);
        $cars = cars::where('id',$id)->first();
        // return dd($cars);
        batching::create([
            'vehicleid'=>$cars->id,
            'vehicleidno'=>$cars->vehicleidno,
            'userid'=>Auth::user()->id
        ]);
        $cars->status = 0;
        $cars->save();
        $this->dispatch('unit-batch');
        request()->session()->flash('success','the unit have been moved to batch!!');
        // return dd($cars);

    }
}
