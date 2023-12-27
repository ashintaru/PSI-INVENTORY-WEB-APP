<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\stencil;
use Illuminate\Support\Facades\Auth;
use App\Models\batching;



class Washing extends Component
{
    public $userid;
    public $actions = 3;
    public $name = '';
    public $date = '';

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
