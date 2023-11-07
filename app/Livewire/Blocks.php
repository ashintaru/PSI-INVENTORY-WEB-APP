<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\blocks as bloke;
use Livewire\Attributes\On;
class Blocks extends Component
{
    public $blockid;

    public function select(){
        $this->dispatch('get-blockings',$this->blockid);
    }


    #[On('relode-batchlist')]
    public function render()
    {
        $blocks = bloke::orderBy('created_at', 'asc')->get();
        return view('livewire.blocks',['blocks'=>$blocks]);
    }
}
