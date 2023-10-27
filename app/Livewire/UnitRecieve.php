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
    #[On('unit-batch')]
    public function render()
    {
        $data = cars::where('status',null)->paginate(10);
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
        $cars->status = 3;
        $cars->save();
        $this->dispatch('unit-batch');
        // return dd($cars);
    }
}
