<?php

namespace App\Livewire;

use App\Http\Controllers\blocks;
use App\Models\cars;
use App\Models\findings;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\inventory as modelinventory;
use App\Models\client;
use App\Models\blockings;
use App\Models\blockingHistory as history;
use Illuminate\Support\Facades\Auth;



class Inventory extends Component
{
    use WithPagination;
    public $search = '';
    public $status = '';
    public $startdate ;
    public $enddate ;
    public $findings = [];
    public $clienttag ;
    public $display;
    public $selectedUnitforblocking;
    public $isEditBlocking=false;
    public $selectedBlockings = [];
    public $blockingselect;
    public $unit = [];
    public $vin;
    public $isEditFinding = false;
    public $selectedUnitforfinding;
    public $finding;
    public $statusFinding;

    public $movedBy='';


    #[On('get-blockings'),On('reset-block')]
    public function selectedBlocks($blockid){
        $this->selectedBlockings = blockings::select(['id','bloackname'])->where('blockId',$blockid)->where('blockstatus',0)->get();
        // dd($this->selectedBlockings);
    }
    public function getFindings($id = null){
        $this->findings = findings::where('vehicleid',$id)->get();
        $this->display = true;
    }


    public function editBlocking($id = null){
        $this->reset(['isEditBlocking', 'selectedUnitforblocking' , 'unit' ,'vin' ]);
        $this->isEditBlocking = true;
        $this->selectedUnitforblocking = ($this->isEditBlocking)?$id:null;
        $car = cars::where('id',$this->selectedUnitforblocking)->first();
        $this->vin = $car->vehicleidno;
    }


    public function editFinding($id = null){
        $this->reset(['isEditFinding', 'selectedUnitforfinding','vin']);
        $this->isEditFinding = true;
        $this->selectedUnitforfinding = ($this->isEditFinding)?$id:null;
        $car = cars::where('id',$this->selectedUnitforfinding)->first();
        $this->vin = $car->vehicleidno;
    }

    public function updateFinding(){
        $validate = Validator::make(
            ['statusFinding' => $this->statusFinding],
            // Validation rules to apply...
            ['statusFinding' => 'required'],
            // Custom validation messages...
            ['required' => 'the Unit is required to give  a status'],
        )->validate();
        // dd($this->statusFinding);
        $car = cars::where('id',$this->selectedUnitforfinding)->first();
        $car->status = $this->statusFinding;
        $car->save();
        if($this->statusFinding == 1){
            $this->finding = "ALL GOODS";
        }

        findings::create([
            'vehicleid'=>$car->id,
            'vehicleidno'=>$car->vehicleidno,
            'findings'=>strtoupper($this->finding),
        ]);
        // return dd($this->finding);
        $this->reset(['isEditFinding', 'selectedUnitforfinding','vin']);
        $this->isEditFinding = false;
        request()->session()->flash('success','Update successfully !!');
    }
    public function cancelBlocking(){
        $this->isEditBlocking = false;
        $this->selectedUnitforblocking = null;
    }

    public function cancelFinding(){
        $this->isEditFinding = false;
        $this->selectedUnitforfinding = null;
    }

    public function updateBlocking(){
        // $validatedData ?= $this->validate();
        $validate = Validator::make(
            ['blockingselect'=> $this->blockingselect ,'movedBy'=>$this->movedBy],
            // Validation rules to apply...
            ['blockingselect'=>'required','movedBy'=>'required|min:3'],
            // Custom validation messages...
            ['required' => 'the Unit is required to give Blocking'],
        )->validate();
        // dd("click");
        $car = cars::where('id',$this->selectedUnitforblocking)->first();
        $car->movedBy = $this->movedBy;
        $oldBlocking = blockings::find($car->blockings);
        $this->blockingHistory($car,$this->blockingselect);
        if(isset($oldBlocking)){
            $oldBlocking->blockstatus = 0;
            $oldBlocking->save();
            $car->blockings = $this->blockingselect;
            $car->save();
            $newblocking = blockings::find($this->blockingselect);
            $newblocking->blockstatus = 1;
            $newblocking->save();
        }else{
            $car->blockings = $this->blockingselect;
            $car->save();
            $newblocking = blockings::find($this->blockingselect);
            $newblocking->blockstatus = 1;
            $newblocking->save();
        }
        $this->isEditBlocking = false;
        $this->reset(['blockingselect']);
        $this->dispatch('reset-block','');
        request()->session()->flash('success','the unit have been selected !!');
    }

    public function blockingHistory(cars $car , $blockings)
    {
        history::create(
            [
                'vehicleid'=>$car->id,
                'from'=>$car->blockings,
                'to'=>$blockings,
                'user'=> $this->movedBy,
                'createdBy'=>Auth::user()->id
            ]
        );

    }


    // #[On('reload')]
    public function render()
    {
        $clients = client::get();
        $inventory = modelinventory::whereIn('status',[0,1])->get();
        $vinArray = $inventory->pluck('vehicleidno');
        $cars = cars::with(['inventory','blocking','client'])
        ->whereIn('vehicleidno',$vinArray)
        ->where('vehicleidno', 'LIKE', "%{$this->search}%")
        ->Where('status', 'LIKE', "%{$this->status}%")
        ->Where('tag', 'LIKE', "%{$this->clienttag}%")
        ->paginate(25);
        return view('livewire.inventory',['cars'=>$cars,'clients'=>$clients]);
    }



}
