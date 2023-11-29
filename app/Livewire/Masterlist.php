<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\cars;
use Livewire\WithPagination;

class Masterlist extends Component
{
    use withPagination;
    public function render()
    {
        $cars = cars::paginate(25);
        return view('livewire.masterlist',['cars'=>$cars]);
    }
}
