<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\cars;
use App\Models\findings;

class UnitProfile extends Component
{
    public $id;
    public function mount($id){
        $this->id = $id;
    }
    public function render()
    {
        $car = cars::where('id',$this->id)->with(['blocking','receive','inventory'])->first();
        $findings = findings::where('vehicleid',$this->id)->orderBy('created_at','DESC')->paginate(3);
        // return dd($findings);
        return view('livewire.unit-profile',['car'=>$car,'findings'=>$findings]);
    }
}
