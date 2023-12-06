<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\blocks;
use App\Models\blockings;
use App\Models\site;

class Blockview extends Component
{
    public $siteId = '';

    public $isCreatingBlockings = false;
    public $isEditingBlock = false;
    public $number = 0;


    public $loopVal = false;
    public $blockName = '';
    public $updateBlockName = '';


    public $selectedBlock = '';
    public $blockingName = '';
    public $editedBlock = '';


    public function mount($id){

        $this->siteId = $id;
    }

    public function toggleLoop(){
        $this->loopVal = !$this->loopVal;
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
        if($this->loopVal && $this->number > 0){
            $index = 1;
            while($this->number >= $index){
                $name = strtoupper($this->blockingName).' '.$index;
                blockings::create([
                    'blockId'=>$this->selectedBlock,
                    'bloackname'=>$name,
                    'blockstatus'=>0,
                ]);
            $index++;
            }
        }else{
            blockings::create([
                'blockId'=>$this->selectedBlock,
                'bloackname'=>strtoupper($this->blockingName),
                'blockstatus'=>0,
            ]);
        }
    }
    public function render()
    {
        $site = site::where('id',$this->siteId)->first();
        $blocks = blocks::where('siteId',$this->siteId)->get();
        return view('livewire.blockview',['blocks'=>$blocks,'site'=>$site]);
    }
}
