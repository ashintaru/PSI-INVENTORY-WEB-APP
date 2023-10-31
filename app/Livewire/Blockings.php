<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\blockings as child;


class Blockings extends Component
{

    public $blockings;
    public $blockingsId;

    #[On('get-blockings'),On('relode-batchlist')]
    public function get($blocks){
        $this->blockings = child::select(['id','bloackname'])->where('blockid',$blocks)->where('blockstatus',0)->get();
    }

    public function select(){
        $this->dispatch('select-blockings',$this->blockingsId);
        // return dd();
    }

    public function render()
    {
        return view('livewire.blockings',['blockings'=>$this->blockings]);

    }
}
