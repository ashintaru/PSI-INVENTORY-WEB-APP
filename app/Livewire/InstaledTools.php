<?php

namespace App\Livewire;

use App\Models\cars;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Validator;
use App\Models\washing as modelWashing;
use App\Models\instaledTools as modelTools;
use App\Models\carModel as modelUnit;
use App\Models\instalation as modelInstaldation;

class InstaledTools extends Component
{
    public int $userid ;
    public string $vin ='';
    public int $car_id = null;
    public string $csno = '';
    public string $personel = '';
    public $date;


    public array $toolsList = [];
    public $selectedTools = [];


    public function generateToolList(string $modelName):array{
        $uppreStr = strtoupper($modelName);
        $model = modelUnit::where('modelName',$uppreStr)->first();
        $tool = modelTools::where('model_id',$model->id)->first();
        if ($tool) {
            return explode(',',$tool->tools);
        }
        else
            return [];
    }

    public function submit(){

        $status = 0;

        $validate = Validator::make(
            ['csno'=> $this->csno ,'personel'=>$this->personel,'date'=>$this->date],
            // Validation rules to apply...
            ['csno'=>'required|min:3','personel'=>'required|min:3','date'=>'required'],
            // Custom validation messages...
            ['required' => 'the Unit is required to give Blocking'],
        )->validate();
        modelInstaldation::create([
            'car_id'=>$this->car_id,
            'vehicleidno'=>$this->vehicleidno,
            'status'=>$status,
            'csno'=>$this->csno,
            'personel'=>$this->personel,
            'tools'=>$this->toolsList,
            'remark',
            'dateFinishedinstallation',
            'selectedBy'
        ]);







    }

    public function select(int $id = null){
        $car = cars::where('id',$id)->first();
        $this->car_id = $car->id;
        $this->vin = $car->vehicleidno;
        //Generate tool/s
        $this->toolsList = $this->generateToolList($car->modeldescription);

    }

    public function render()
    {
        $forInstalation = modelWashing::where('status',0)->with(['car','instalation'])->paginate(25);
        return view('livewire.instaled-tools',['forInstalation'=>$forInstalation]);
    }
}
