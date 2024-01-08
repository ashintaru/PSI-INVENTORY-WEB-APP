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
    public $car_id = null;
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

    public function submit(){
        $status = 0;
        $stringtify = '';
        $validate = Validator::make(
            ['csno'=> $this->csno ,'personel'=>$this->personel,'date'=>$this->date , 'toolsList'=>$this->toolsList],
            // Validation rules to apply...
            ['csno'=>'required|min:3','personel'=>'required|min:3','date'=>'required','toolsList'=>'required'],
        )->validate();
        $forInstalation = modelWashing::Where('car_id',$this->car_id)->first();
        foreach ($this->toolsList as $tool ) {
            $stringtify .= $tool.', ';
        }
        modelInstaldation::create([
            'car_id'=>$this->car_id,
            'vehicleidno'=>$this->vin,
            'status'=>$status,
            'csno'=>$this->csno,
            'personel'=>$this->personel,
            'tools'=>$stringtify,
            'remark'=>$this->remark,
            'dateFinishedinstallation'=>$this->date,
            'selectedBy'=>null
        ]);
        // dd($forInstalation);
        $forInstalation->status = 1;
        $forInstalation->selectedBy = null;
        $forInstalation->save();
        $this->reset(['vin','car_id','csno','personel','date','toolsList']);
        request()->session()->flash('success','the data have been save');
        array_pop($this->batch);

    }

    public function selectAction(modelWashing $unit){
        if($unit->selectedBy == null){
            $this->car_id = $unit->car_id;
            $this->vin = $unit->vehicleidno;
            $unit->selectedBy = Auth::user()->id;
            $unit->save();
            //Generate tool/s
            $this->toolsList = $this->generateToolList($unit->car->modeldescription);
        }else
            if($unit->selectedBy == Auth::user()->id){
                $this->car_id = $unit->car_id;
                $this->vin = $unit->vehicleidno;
                $unit->selectedBy = Auth::user()->id;
                $unit->save();
                //Generate tool/s
                $this->toolsList = $this->generateToolList($unit->car->modeldescription);
            }
            else
                request()->session()->flash('failed','the unit have been selected by somone');

    }

    public function cancelSelectedUnit(){
        if($this->car_id){
            $forInstalation = modelWashing::Where('car_id',$this->car_id)->first();
            $forInstalation->selectedBy = null;
            $forInstalation->save();
            $this->reset(['vin','car_id','toolsList']);
            request()->session()->flash('success','the unit have been clear');

        }
    }

    public function checkUser(int $id , int $userId):bool{
        $forInstalation = modelWashing::where('car_id',$id)->first();
        return ( $forInstalation->selectedBy == Auth::user()->id)?true:false;
    }


    public function select(int $id = null){
        $forInstalation = modelWashing::with(['car'])->Where('car_id',$id)->first();
        $this->selectAction($forInstalation);
        request()->session()->flash('success','the unit have been selected');
    }

    public function cancelSelected(int $id = null){
        $forInstalation = modelWashing::with('car')->where('car_id',$id)->first();
    }




    public function render()
    {
        $forInstalation = modelWashing::where('status',0)->with(['car','instalation'])->paginate(25);
        return view('livewire.instaled-tools',['forInstalation'=>$forInstalation]);
    }
}
