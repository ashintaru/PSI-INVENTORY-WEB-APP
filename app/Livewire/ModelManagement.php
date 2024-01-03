<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\client as modelClient;
use Illuminate\Support\Facades\Validator;
use App\Models\carModel as modelModel;
use App\Models\instaledTools as modelTools;
use PhpParser\Node\Stmt\Switch_;
use Symfony\Component\Console\Input\StringInput;

class ModelManagement extends Component
{
    public int $clientId;
    public string $strinfy = '';
    public array $list = [];
    public string $modelName;
    public String $name;
    public int $modelId;

    public $isAdding = false;

    public function addTools(int $id , string $actions){
        switch ($actions) {
            case 'add':
                if($id != null){
                    $this->modelId = $id;
                    $this->isAdding = true;
                    $model = modelModel::select('modelName')->where('id',$id)->first();
                    $this->name = $model->modelName;
                    // dd("$this->name");
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

    public function createTools(){
        $validate = Validator::make(
            ['strinfy' => $this->strinfy ,'modelid'=>$this->modelId ],
            // Validation rules to apply...
            ['strinfy' => 'required' , 'modelid'=>'required' ],
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

    public function delete(){
        dd('click');
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
