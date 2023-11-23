<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\cars;
use App\Models\findings;
use App\Models\blockingHistory;

class UnitProfile extends Component
{
    public $id;
    public function mount($id){
        $this->id = $id;
    }
    public function render()
    {
        $car = cars::where('id',$this->id)->with(['blocking','receive','inventory','released'])->first();
        $findings = findings::where('vehicleid',$this->id)->orderBy('created_at','DESC')->paginate(3);
        $history = blockingHistory::where('vehicleid',$this->id)->with(['car','fromblocking','toblocking'])->orderBy('created_at','DESC')->get();
        // return dd($history);
        // return dd($findings);
        return view('livewire.unit-profile',['car'=>$car,'findings'=>$findings,'history'=>$history]);
    }
}
