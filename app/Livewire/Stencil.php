<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\cars;
use App\Models\inventory;
use App\Models\batching;
use App\Models\stencil as ModelsStencil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Stencil extends Component
{
    public $search = '';
    public $actions = 2;
    public $name = '';
    public $date = '';
    public $userid = '';


    public function submitBatches(){

        $validate = Validator::make(
            ['name' => $this->name , 'date' => $this->name],
            // Validation rules to apply...
            ['name' => 'required|min:3' , 'date' => 'required'],
            // Custom validation messages...
        )->validate();
        $batches = batching::where('userid',$this->userid)->where('actions',$this->actions)->get();
        $car_id = $batches->pluck('vehicleid');
        $inventories = inventory::whereIn('car_id',$car_id)->get();
        // return dd(count($vinarray));
        foreach ($inventories as $inventory ) {
            ModelsStencil::create([
                'cars_id'=>$inventory->car_id,
                'vehicleidno'=>$inventory->vehicleidno,
                'name'=>$this->name,
                'dateFinishStencil'=>$this->date,
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
            $car  = inventory::where('car_id',$batch->vehicleid)->first();
            $car->selectBy = null;
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
        $car  = inventory::where('car_id',$id)->first();
        if($car->selectBy==null){
            $car->selectBy = $this->userid;
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
        $inventory = inventory::where('status',0)
        ->with(['car','stencil'])
        ->where('vehicleidno', 'LIKE', "%{$this->search}%")->paginate(25);
        // dd($inventory);
        $batching = batching::where('userid',$this->userid)->where('actions',$this->actions)->get();
        return view('livewire.stencil',['inventories'=>$inventory,'batches'=>$batching]);
    }
}
