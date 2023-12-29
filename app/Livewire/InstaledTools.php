<?php

namespace App\Livewire;

use App\Models\cars;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\client;


class InstaledTools extends Component
{
    public $modelList =[];
    public $clientTag;
    public $tools = array();
    public $data = '';
    public $string = '';

    #[On('select-client')]
    public function setModel($clientid){
        $this->modelList = cars::select('modeldescription')->where('tag',$clientid)->distinct()->get();
    }
    public function fetchModel()
    {
        $this->dispatch('select-client',$this->clientTag);
    }
    public function convert(){
        $newArray = explode('_',$this->string);
        dd($newArray);
    }
    public function submit(){

        foreach($this->tools as $tool){
            $this->string .= $tool.'_';
        }
        // dd($this->string);
    }
    public function removeTool($id){
        unset($this->tools[$id]);
    }
    public function addTool(){
        array_push($this->tools,$this->data);
    }
    public function render()
    {
        $client = client::select(['id','clientName'])->get();

        return view('livewire.instaled-tools',['clients'=>$client]);
    }
}
