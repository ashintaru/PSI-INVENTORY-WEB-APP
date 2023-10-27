<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\blockings as child;


class Blockings extends Component
{

    public $blockings;
    public $blocks;
    #[On('get-blockings')]
    public function get($blocks){
        $this->blockings = child::where('blockid',$blocks['id'])->get();
    }

    public function render()
    {
        return view('livewire.blockings',['blockings'=>$this->blockings]);

    }
}
