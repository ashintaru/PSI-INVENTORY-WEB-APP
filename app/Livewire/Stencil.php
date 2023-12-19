<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\cars;
use App\Models\inventory;
use Livewire\Attributes\On;

class Stencil extends Component
{
    public $search = '';
    public $collection = [];


    public function getCollection(){
        dd($this->collection);
    }

    public function removeArray($id){

        if(count($this->collection)<=1){
            array_pop($this->collection);
        }else
            unset($this->collection[$id]);

        return $this->collection;
    }

    public function select($id){
        $cars = cars::where('id',$id)->first();
        $selectedUnit = $cars->vehicleidno;
        array_push($this->collection, $selectedUnit);

        if(count($this->collection)==0){
            array_push($this->collection, $selectedUnit);
        }else{
            foreach ($this->collection as $key ) {
                if(in_array($selectedUnit,$this->collection)){
                    break;
                }else{
                    array_push($this->collection, $selectedUnit);
                }
            }
        }
    }


    public function render()
    {
        $inventory = inventory::where('status',0)->get();
        $vinArray = $inventory->pluck('vehicleidno');
        $cars = cars::with(['stencil'])
        ->whereIn('vehicleidno',$vinArray)
        ->where('vehicleidno', 'LIKE', "%{$this->search}%")->get();
        // dd($cars);
        return view('livewire.stencil',['cars'=>$cars]);
    }
}
