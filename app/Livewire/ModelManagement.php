<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\client as modelClient;
use Illuminate\Support\Facades\Validator;
use App\Models\carModel as modelModel;
use App\Models\instaledTools as modelTools;

class ModelManagement extends Component
{
    public int $clientId;
    public string $strinfy = '';
    public array $list = [];
    public string $modelName;
    public String $name;
    public int $modelId;
    public string $updatedModelName = '';



    public bool $isAdding = false;
    public bool $isEditing = false;



    public function selectTools(int $id , string $actions){
        switch ($actions) {
            case 'add':
                if($id != null){
                    $this->modelId = $id;
                    $this->isAdding = true;
                    $this->isEditing = false;
                    $model = modelModel::select('modelName')->where('id',$id)->first();
                    $this->name = $model->modelName;
                    // dd("$this->name");
                }
                break;
            case 'edit':
                if($id != null){
                    $this->modelId = $id;
                    $this->isEditing = true;
                    $this->isAdding = false;
                }
                break;

            default:
                # code...
                break;
        }
    }

    public function preview(){
        ($this->strinfy!=null)?$this->list = explode(',',$this->strinfy):$this->reset(['list']);
    }

    public function mount($id){
        $this->clientId = $id;
    }

    public function updateModel(){
        $validate = Validator::make(
            ['updatedModelName' => $this->updatedModelName],
            // Validation rules to apply...
            ['updatedModelName' => 'required|min:3'],
            // Custom validation messages...
            ['required' => 'The :attribute field is required'],
        )->validate();
        if(!modelModel::where('modelName',$this->updatedModelName)->exists()){
            $model = modelModel::find($this->modelId)->first();
            $model->modelName = $this->updatedModelName;
            $model->save();
            session()->flash('success','the model name have been update properly');
            $this->reset(['updatedModelName']);
        }
        else{
            session()->flash('failed','opps something happend');
        }
    }

    public function createTools(){
        $validate = Validator::make(
            ['updatedModelName' => $this->updatedModelName],
            // Validation rules to apply...
            ['updatedModelName' => 'required|min:3' ],
            // Custom validation messages...
            ['required' => 'The :attribute field is required'],
        )->validate();

        $tool = modelTools::firstOrCreate(
            ['model_id' =>  $this->modelId],
            [
                'model_id'=>$this->modelId,
                'tools'=>$this->strinfy,
            ]
        );

        //the model is exsist
        $tool->tools = $this->strinfy;
        $tool->save();

        session()->flash('success','the data have been save properly');
        $this->reset(['modelId','strinfy', ]);
    }

    public function delete($id){

    }

    public function createModel(){
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
        $models = modelModel::with(['tools'])->get();
        // dd($models);
        return view('livewire.model-management',['client'=>$client,'models'=>$models]);
    }
}
