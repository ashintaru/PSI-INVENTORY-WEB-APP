<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\blocks as bloke;
use Livewire\Attributes\On;
class Blocks extends Component
{

    public $selectedBlocks = [];
    public $blockid;

    public function select(){
        $this->dispatch('get-blockings',$this->blockid);
    }
    #[On('get-site')]
    public function selectedBlocks($siteid){
        $this->blockid = "";
        $this->selectedBlocks = bloke::select(['id','blockname'])->where('siteid',$siteid)->get();
    }

    #[On('relode-batchlist')]
    public function render()
    {
        return view('livewire.blocks');
    }
}
