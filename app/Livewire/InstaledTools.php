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
use Illuminate\Support\Facades\Auth;

class InstaledTools extends Component
 {
    public int $userid ;
    public string $vin ='';
    public int $car_id ;
    public string $csno = '';
    public string $personel = '';
    public $date;
    public string $remark = '';


    public array $toolsList = [];
    public $selectedTools = [];

    public array $batch = [];

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

    public function submit($id = null){
        $status = 0;
        $stringtify = '';
        $forInstalation = modelWashing::find($id);

        $validate = Validator::make(
            ['csno'=> $this->csno ,'personel'=>$this->personel,'date'=>$this->date , 'toolsList'=>$this->toolsList ],
            // Validation rules to apply...
            ['csno'=>'required|min:3','personel'=>'required|min:3','date'=>'required','toolsList'=>'required'],
            // Custom validation messages...
            ['required' => 'the Unit is required to give Blocking'],
        )->validate();

        foreach ($this->toolsList as $tool ) {
            $stringtify .= $tool.', ';
        }

        modelInstaldation::create([
            'car_id'=>$this->car_id,
            'vehicleidno'=>1,
            'status'=>$status,
            'csno'=>$this->csno,
            'personel'=>$this->personel,
            'tools'=>$stringtify,
            'remark'=>$this->remark,
            'dateFinishedinstallation'=>$this->date,
            'selectedBy'=>0
        ]);

        $forInstalation->status = 1;
        $forInstalation->selectedBy = null;
        $forInstalation->save();
        $this->reset(['csno','personel','date']);
        request()->session()->flash('success','the data have been save');
        array_pop($this->batch);


    }

    public function selectAction(int $id = null){
        $forInstalation = modelWashing::with('car')->where('car_id',$id)->first();
        if(isset($forInstalation->id)){
            $this->car_id = $forInstalation->car_id;
            $this->vin = $forInstalation->vehicleidno;
            $forInstalation->selectedBy = Auth::user()->id;
            $forInstalation->save();
            //Generate tool/s
            $this->toolsList = $this->generateToolList($forInstalation->car->modeldescription);
        }else
        request()->session()->flash('failed','the data have been save');

    }

    public function checkUser(int $id , int $userId):bool{
        $forInstalation = modelWashing::where('car_id',$id)->first();
        return ( $forInstalation->selectedBy == Auth::user()->id)?true:false;
    }


    public function select(int $id = null){
        // dd($id);
        if(count($this->batch) == 0){
            array_push($this->batch,$id);
            $this->selectAction($id);
        }else{
            if(in_array($id,$this->batch)){
                if($this->checkUser($id,Auth::user()->id))
                    $this->selectAction($id);
                else
                request()->session()->flash('failed','the data have been save');
            }else{

            }
        }

    }

    public function render()
    {
        $forInstalation = modelWashing::where('status',0)->with(['car','instalation'])->paginate(25);
        return view('livewire.instaled-tools',['forInstalation'=>$forInstalation]);
    }
}
