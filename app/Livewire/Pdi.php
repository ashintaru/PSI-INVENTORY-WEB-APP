<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\instalation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\pdi as modelPdi;

class Pdi extends Component
{
    public string $vin = '';
    public $car_id;
    public string $person = '';
    public $date;
    public string $pdi = "d";
    public string $chassis = '';
    public $wordcount = 0;

    public function counting(){

        $this->wordcount = strlen($this->pdi);
    }
    public function submit(){
        $validate = Validator::make(
            ['person'=> $this->person,'date'=>$this->date,'pdi'=>$this->pdi,'chassis'=>$this->chassis],
            // Validation rules to apply...
            ['person'=>'required|min:3','date'=>'required','pdi'=>'required|max:1000','chassis'=>'max:1000'],
        )->validate();
        $forpdi = instalation::Where('car_id',$this->car_id)->first();
        $status = 0;
        modelPdi::create([
            'car_id'=>$this->car_id,
            'vehicleidno'=>$this->vin,
            'pdi_sumary'=>$this->pdi,
            'underchassis_sumary'=>$this->chassis,
            'name'=>$this->person,
            'dateFinish'=>$this->date,
            'status'=>$status,
            'selectedBy'=>null
        ]);

         // dd($forpdi);
        $forpdi->status = 1;
        $forpdi->selectedBy = null;
        $forpdi->save();
        $this->reset(['vin','car_id','person','date','pdi','chassis']);
        request()->session()->flash('success','the data have been save');

    }

    public function select(int $id = null){
        $forpdi = instalation::Where('car_id',$id)->first();
        $this->selectAction($forpdi);
        request()->session()->flash('success','the unit have been selected');
    }
    public function selectAction(instalation $unit){
        if($unit->selectedBy == null){
            $this->car_id = $unit->car_id;
            $this->vin = $unit->vehicleidno;
            $unit->selectedBy = Auth::user()->id;
            $unit->save();
            //Generate tool/s
        }else{
            if($unit->selectedBy == Auth::user()->id){
                $this->car_id = $unit->car_id;
                $this->vin = $unit->vehicleidno;
                $unit->selectedBy = Auth::user()->id;
                $unit->save();
                //Generate tool/s
            }
            else
                request()->session()->flash('failed','the unit have been selected by somone');
        }
    }
    public function cancelSelectedUnit(){
        if($this->car_id != null){
            $forpdi = instalation::Where('car_id',$this->car_id)->first();
            $forpdi->selectedBy = null;
            $forpdi->save();
            $this->reset(['vin','car_id']);
            request()->session()->flash('success','the unit have been clear');

        }
    }

    public function render()
    {
        $forPdi = instalation::where('status',0)
                   ->with(['car','pdi'])->paginate(25);
        // dd($forPdi);
        return view('livewire.pdi',['forPdi'=>$forPdi]);
    }
}
