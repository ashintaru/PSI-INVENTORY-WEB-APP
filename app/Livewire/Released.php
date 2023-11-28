<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\released as modelReleased;
use App\Models\cars;

class Released extends Component
{
    public function render()
    {
        $released = modelReleased::get();
        $vinArray = $released->pluck('vehicleidno');
        $cars = cars::with(['released','blocking','client'])
        ->whereIn('vehicleidno',$vinArray)
        ->paginate(25);
        return view('livewire.released',['cars'=>$cars]);
    }
}
