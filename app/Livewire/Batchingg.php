<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\batching;
use App\Models\cars;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Models\inventory;


class Batchingg extends Component
{
    use WithPagination;

    public $batchId;

    public function submit(){
        $cars = batching::join('cars','cars.id','batching.vehicleid')->get();

        foreach ($cars as $car ) {
            if($car->status >= 1){
                $car->dateIn =
                inventory::create([
                    'vehicleidno'=>$car->vehicleidno,
                    'status'=>$car->status
                ]);
                $batch = batching::where('vehicleidno',$car->vehicleidno)->first();
                $batch->delete();
            }
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

    #[On('unit-batch'),On('select-batch'),on('relode-batchlist'),On('removed-batch')]
    public function render()
    {
        $userid = Auth::user()->id;
        $batching = batching::where('userid',$userid)->paginate(10);
        return view('livewire.batchingg',['batches'=>$batching]);
    }
}
