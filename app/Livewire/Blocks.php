<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\blocks as bloke;
class Blocks extends Component
{
    public $blockid;
    public function select(){
        $blocks = bloke::findOrFail($this->blockid);
        $this->dispatch('get-blockings',$blocks);
    }
    public function render()
    {
        $blocks = bloke::get();
        return view('livewire.blocks',['blocks'=>$blocks]);
    }
}
