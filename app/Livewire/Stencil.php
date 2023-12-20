<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\cars;
use App\Models\inventory;
use App\Models\batching;
use Livewire\Attributes\On;
use App\Events\unitSelected;
use Illuminate\Support\Facades\Auth;


class Stencil extends Component
{
    public $search = '';
    public $actions = 2;

    public function isexsist($id = null){
        return batching::where('vehicleid', $id)->where('actions', 1)->exists();
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
            $car->selectBy = Auth::user()->id;
            $car->save();
            batching::create([
                'vehicleid'=>$id,
                'vehicleidno'=>$car->vehicleidno,
                'userid'=>Auth::user()->id,
                'actions'=>$this->actions
            ]);
        }else{
            request()->session()->flash('failed','the unit have been selected by other user !!');
        }
        // unitSelected::dispatch();
    }
    public function render()
    {
        $inventory = inventory::where('status',0)
        ->with(['car','stencil'])
        ->where('vehicleidno', 'LIKE', "%{$this->search}%")->paginate(25);
        // dd($inventory);
        $batching = batching::where('userid',Auth::user()->id)->where('actions',$this->actions)->get();
        return view('livewire.stencil',['inventories'=>$inventory,'batches'=>$batching]);
    }
}
