<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\client as modelClient;
use Illuminate\Support\Facades\Validator;
use App\Models\carModel as modelModel;

class ModelManagement extends Component
{
    public $clientId;
    public $strinfy;
    public $list;
    public $modelName;

    public function preview(){
        $this->list = explode(',',$this->strinfy);
        // dd($this->list);
    }
    public function mount($id){
        $this->clientId = $id;
    }
    public function create(){
        $validate = Validator::make(
            ['modelName' => $this->modelName],
            // Validation rules to apply...
            ['modelName' => 'required|min:3'],
            // Custom validation messages...
            ['required' => 'The :attribute field is required'],
        )->validate();

        if(!modelModel::where('modelName',$this->modelName)->exists()){
            modelModel::create([
                'modelName'=>$this->modelName,
                'clientId'=>$this->clientId
            ]);
            session()->flash('success','the Client have been update properly');
            $this->reset(['modelName']);
        }
        else{
            session()->flash('failed','opps something happend');
        }
    }
    public function render()
    {
        $client = modelClient::find($this->clientId);
        $models = modelModel::get();
        // dd($client->modelName);
        return view('livewire.model-management',['client'=>$client,'models'=>$models]);
    }
}
