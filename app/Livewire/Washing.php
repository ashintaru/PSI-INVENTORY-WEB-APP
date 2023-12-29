<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\stencil;
use Illuminate\Support\Facades\Auth;
use App\Models\batching;
use App\Models\washing as ModelsWashing;
use Illuminate\Support\Facades\Validator;



class Washing extends Component
{
    public $userid;
    public $actions = 3;
    public $name = '';
    public $date = '';

    public function submitBatches(){

        $validate = Validator::make(
            ['name' => $this->name , 'date' => $this->name],
            // Validation rules to apply...
            ['name' => 'required|min:3' , 'date' => 'required'],
            // Custom validation messages...
        )->validate();
        $batches = batching::where('userid',$this->userid)->where('actions',$this->actions)->get();
        $car_id = $batches->pluck('vehicleid');
        $forwashing = stencil::whereIn('cars_id',$car_id)->get();
        // return dd(count($vinarray));
        foreach ($forwashing as $washing ) {
            ModelsWashing::create([
                'car_id'=>$washing->cars_id,
                'vehicleidno'=>$washing->vehicleidno,
                'name'=>$this->name,
                'dateFinishedWashing'=>$this->date,
                'status'=>0,
                'selectedBy'=>null
            ]);
        }
        if(count($car_id) > 0 ){
            batching::where('actions',$this->actions)->whereIn('vehicleid',$car_id)->delete();
            request()->session()->flash('success','the unit have been selected !!');
        }else{
            request()->session()->flash('failed','the unit have been selected !!');
        }
    }


    public function removeBatch($id){
        try {
            $batch = batching::find($id);
            $car  = stencil::where('cars_id',$batch->vehicleid)->first();
            $car->selectedBy = null;
            $batch->delete();
            $car->save();
            request()->session()->flash('success','the unit have been selected !!');
        } catch (\Throwable $th) {
            //throw $th;
            $th = "System Error : Call the System Admin";
            request()->session()->flash('error',$th);
        }
    }


    public function select($id = null){
        $car  = stencil::where('cars_id',$id)->first();
        if($car->selectedBy==null){
            $car->selectedBy = $this->userid;
            $car->save();
            batching::create([
                'vehicleid'=>$id,
                'vehicleidno'=>$car->vehicleidno,
                'userid'=>$this->userid,
                'actions'=>$this->actions
            ]);
        }else{
            request()->session()->flash('failed','the unit have been selected by other user !!');
        }
        // unitSelected::dispatch();
    }

    public function render()
    {

        $this->userid = Auth::user()->id;
        $batching = batching::where('userid',$this->userid)->where('actions',$this->actions)->get();
        $forWashing = stencil::with(['car','washing'])->paginate(25);
        return view('livewire.washing',['forWashing'=>$forWashing,'batches'=>$batching]);
    }
}
