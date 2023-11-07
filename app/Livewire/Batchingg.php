<?php

namespace App\Livewire;

use App\Http\Controllers\receiving;
use Livewire\Component;
use App\Models\batching;
use App\Models\cars;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Models\recieving;
use App\Models\inventory;


class Batchingg extends Component
{
    use WithPagination;

    public $batchId;

    public $datein;
    public $dateencode;


    public function submitToInventory(){

    }

    public function submit(){
        $batches = batching::join('cars','cars.vehicleidno','batching.vehicleidno')->where('cars.status','!=',null)->where('cars.status','>',0)->where('batching.userid',Auth::user()->id)->get();
        $vinarray = $batches->pluck('vehicleidno');
        $cars = cars::whereIn('vehicleidno',$vinarray)->get();
        // return dd(count($vinarray));
        foreach ($cars as $car ) {
            if($car->status != 0){
                recieving::create([
                    'vehicleidno'=>$car->vehicleidno,
                    'status'=>1
                ]);
                inventory::create([
                    'vehicleidno'=>$car->vehicleidno,
                    'status'=>0
                ]);
                $car->dateIn = $this->datein;
                $car->dateEncode = $this->dateencode;
                $car->update();
            }
        }
        if( count($vinarray) > 0 ){
            batching::whereIn('vehicleidno',$vinarray)->delete();
            $this->dispatch('refresh-batch');
            request()->session()->flash('success','the unit have been selected !!');
        }else{
            request()->session()->flash('failed','the unit have been selected !!');
        }
    }

    public function removed($batchId){
        try {
            //code...
            $batch = batching::find($batchId);
            $id = $batch->vehicleid;
            $batch->delete();
            $car = cars::where('id',$id)->first();
            $car->status = null;
            $car->save();
            $this->dispatch('delete-vin');
            $this->dispatch('removed-batch');
            request()->session()->flash('success','the unit have been selected !!');
        } catch (\Throwable $th) {
            //throw $th;
            $th = "System Error : Call the System Admin";
            request()->session()->flash('error',$th);
        }
    }

    public function select($batchId){
        $this->batchId = $batchId;
        $this->dispatch('select-batch',$this->batchId);
        request()->session()->flash('success','the unit have been selected !!');
    }

    #[On('unit-batch'),On('select-batch'),On('relode-batchlist'),On('removed-batch'),On('refresh-batch')]
    public function render()
    {
        $userid = Auth::user()->id;
        $batching = batching::where('userid',$userid)->paginate(10);
        return view('livewire.batchingg',['batches'=>$batching]);
    }
}
