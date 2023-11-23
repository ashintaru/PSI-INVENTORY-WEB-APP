<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\cars;
use App\Models\blocks as bloke;
use App\Models\batching;
use App\Models\blockings;
use Livewire\Attributes\Rule;
use App\Models\findings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\blockingHistory as history;

class Recieveing extends Component
{

    public $editFinding = false;

    #[Rule('required')]
    public $vehicleidno = null;

    // #[Rule('required')]
    // public $selectedBlocks;

    public $selectedBlockings = [];

    #[Rule('required')]
    public $recievedBy;

    // public $recievedBy;

    #[Rule('required')]
    public $blockings = null;
    public $findings = null;
    public $showfindings = false;

    #[On('get-blockings')]
    public function selectedBlocks($blockid){
        // dd($value);
        $this->selectedBlockings = blockings::select(['id','bloackname'])->where('blockId',$blockid)->where('blockstatus',0)->get();
    }
    #[On('relode-batchlist')]
    public function resetselectedBlocks(){
        // dd($value);
        $this->selectedBlockings = blockings::select(['id','bloackname'])->where('blockId',0)->where('blockstatus',0)->get();
    }

    #[On('unit-inspection')]
    public function setUnitforInspection($vin,$edit = null){
        $this->reset(['vehicleidno','recievedBy','findings']);
        $this->vehicleidno = $vin;
    }
    #[On('select-batch')]
    public function setvehicleidno($car){
        // return dd($car);
        $this->reset(['vehicleidno','recievedBy','findings']);
        $this->vehicleidno = $car['vehicleidno'];
        $this->findings = $car['findings'];
        $this->recievedBy = $car['recieveBy'];
        $this->blockings = $car['blockings'];
    }

    public function triggerfinding(){
        $this->dispatch('show-findings');
        $this->showfindings = !$this->showfindings;
    }

    public function goodswithfindings(){
        $validate = Validator::make(
            ['vehicleidno' => $this->vehicleidno, 'blockings' => $this->blockings,'recievedBy'=>$this->recievedBy,'findings'=>$this->findings],
            // Validation rules to apply...
            ['vehicleidno' => 'required', 'blockings' => 'required','recievedBy'=>'required|min:3','findings'=>'required'],
            // Custom validation messages...
            ['required' => 'The :attribute field is required'],
        )->validate();
        $this->receivingproccess($this->vehicleidno,2,$this->findings);
        $this->dispatch('relode-batchlist');
    }

    public function isexsist($vin = null){
        return DB::table('batching')->where('vehicleidno', $vin)->exists();
    }

    public function receivingproccess($vin = null , $status = null , $findings = "ALL GOODS"){
        if ($this->isexsist($vin)) {
            $car = cars::where('vehicleidno',$vin)->first();
            $this->checkBlockings($car);
            $car->recieveBy = $this->recievedBy;
            $car->status = $status;
            $car->save();
            $findinglists = findings::firstOrCreate(
                ['vehicleid'=>$car->id],
                [
                    'vehicleid'=>$car->id,
                    'vehicleidno'=>$car->vehicleidno,
                    'findings'=>strtoupper($findings),
                ]
            );
            $this->dispatch('post-created');
            $findinglists->findings =strtoupper( $findings);
            $findinglists->save();
        }else{
            $car = cars::where('vehicleidno',$vin)->first();
            $this->checkBlockings($car);
            $car->recieveBy = $this->recievedBy;
            $car->status = $status;
            $car->save();
            findings::create(
                [
                    'vehicleid'=>$car->id,
                    'vehicleidno'=>$car->vehicleidno,
                    'findings'=>strtoupper($findings),
                ]
            );
             batching::create([
                'vehicleid'=>$car->id,
                'vehicleidno'=>$car->vehicleidno,
                'userid'=>Auth::user()->id
            ]);
            $this->dispatch('post-created');
        }
        $this->reset(['vehicleidno','findings','recievedBy','blockings']);
        request()->session()->flash('success','Action Have been finished!!');
    }

    public function blockingHistory(cars $car , $blockings)
    {
        history::create(
            [
                'vehicleid'=>$car->id,
                'from'=>$car->blockings,
                'to'=>$blockings,
                'user'=>Auth::user()->name
            ]
        );

    }

    public function goods(){
        $validatedData = $this->validate();
        $this->receivingproccess($this->vehicleidno,1);
        $this->dispatch('relode-batchlist');
    }

    public function checkBlockings(cars $car){
        if($car->blockings === null){
            $car->blockings = $this->blockings;
            $this->blockingHistory($car,$this->blockings);
            $blockings = blockings::find($this->blockings);
            $blockings->blockstatus = 1;
            $blockings->save();
        }else{
            $this->blockingHistory($car,$this->blockings);
            $oldblockings = blockings::find($car->blockings);
            $oldblockings->blockstatus = 0;
            $oldblockings->save();
            $car->blockings = $this->blockings;
            $blockings = blockings::find($this->blockings);
            $blockings->blockstatus = 1;
            $blockings->save();
        }
    }

    public function render()
    {
        $blocks = bloke::get();
        return view('livewire.recieveing',['blocks'=>$blocks]);
    }
}
