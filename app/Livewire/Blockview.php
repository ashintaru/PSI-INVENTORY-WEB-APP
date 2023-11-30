<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\blocks;

class Blockview extends Component
{
    public $siteId = '';

    public function moun($id){
        $this->siteId = $id;
    }


    public function render()
    {
        $blocks = blocks::where('siteId',$this->siteId)->get();
        return view('livewire.blockview',['blocks'=>$blocks]);
    }
}
