<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Account extends Component
{

    public function render()
    {
        $accounts = User::all();
        return view('livewire.account',['accounts'=>$accounts]);
    }
}
