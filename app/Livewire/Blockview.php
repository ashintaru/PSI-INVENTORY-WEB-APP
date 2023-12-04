<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\blocks;
use App\Models\blockings;


class Blockview extends Component
{
    public $siteId = '';

    public $isCreatingBlock = false;
    public $isCreatingBlockings = false;
    public $isEditingBlock = false;


    public $blockName = '';
    public $updateBlockName = '';

    public $selectedBlock = '';
    public $blockingName = '';
    public $editedBlock = '';


    public function mount($id){

        $this->siteId = $id;
    }

    public function toogleCreateBlock(){
        $this->isCreatingBlock = !$this->isCreatingBlock;
    }
    public function toogleCreateBlocking(){
        $this->isCreatingBlockings = !$this->isCreatingBlockings;
    }

    public function editBlock($block){
        $this->isEditingBlock = true;
        $this->editedBlock = $block;
    }

    public function updateBlock(){
        $block = blocks::where('id',$this->editedBlock)->first();
        $block->blockname =strtoupper($this->updateBlockName);
        $block->save();
        $this->reset(['isEditingBlock','editedBlock']);
    }

    public function createBlock(){
        blocks::create([
            'siteId'=>$this->siteId,
            'blockname'=>strtoupper($this->blockName),
            'status'=>0
        ]);
    }
    public function createBlockings(){
        // dd($this->selectedBlock);
        blockings::create([
            'blockId'=>$this->selectedBlock,
            'bloackname'=>strtoupper($this->blockingName),
            'blockstatus'=>0,
        ]);



    }
    public function render()
    {
        $blocks = blocks::where('siteId',$this->siteId)->get();
        return view('livewire.blockview',['blocks'=>$blocks]);
    }
}
