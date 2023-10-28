<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\blocks as bloke;
class Blocks extends Component
{
    public $blockid;
    public function select(){
        $this->dispatch('get-blockings',$this->blockid);
    }
    public function render()
    {
        $blocks = bloke::get();
        return view('livewire.blocks',['blocks'=>$blocks]);
    }
}
