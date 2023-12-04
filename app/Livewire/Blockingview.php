<?php

namespace App\Livewire;

use Livewire\Component;

class Blockingview extends Component
{
    public $blockId = '';
    public function mount($blockid){
        $this->blockId = $blockid;
    }

    public function render()
    {
        return view('livewire.blockingview');
    }
}
