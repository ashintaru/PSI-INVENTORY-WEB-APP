<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\cars;
use Livewire\WithPagination;
use App\Models\blocks;
use App\Models\damage;

class Recieveing extends Component
{
    use WithPagination;

    public $status;
    public $count = 0;
    public $cars;
    public $id;


    public function submitDamage(){

        $car = cars::findOrFail($this->cars);

        $damage = damage::firstOrCreate([],[]);
    }
    public function edit($id){
        $this->id = $id;
        $this->status = 1;
    }

    public function select($vehicleidno){
        $this->cars = $vehicleidno;
        return dd($this->cars);
    }

    public function increment()
    {
        $this->count++;
    }
    public function render()
    {
        $data = cars::where('status',null)->paginate(10);
        $blocks = blocks::get();
        return view('livewire.recieveing',['data'=>$data,'blocks'=>$blocks]) ->layout('layouts.app');
    }
}
