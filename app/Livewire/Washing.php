<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\stencil;



class Washing extends Component
{
    public function render()
    {

        dd(stencil::with(['washing'])->get());

        return view('livewire.washing');
    }
}
