<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\site;
USE Livewire\Attributes\On;

class Siteselection extends Component
{
    public $siteid;
    public function select(){
        $this->dispatch('get-site',$this->siteid);
    }

    #[On('post-created')]
    public function setSite(){
        $this->siteid = null;
    }

    #[On('post-created')]
    public function render()
    {
        $sites = site::get();
        return view('livewire.siteselection',['sites'=>$sites]);
    }
}
