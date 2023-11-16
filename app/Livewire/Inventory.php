<?php

namespace App\Livewire;

use App\Http\Controllers\blocks;
use App\Models\cars;
use App\Models\findings;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\inventory as modelinventory;
use Carbon\Carbon;
use App\Models\client;
use App\Models\blockings;


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
    public $statusFinding;
    public $finding;


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
        $this->reset(['isEditFinding', 'selectedUnitforfinding','vin']);
        $this->isEditFinding = false;
        request()->session()->flash('success','Update successfully !!');
    }
    public function cancelBlocking(){
        $this->isEditBlocking = false;
        $this->selectedUnitforblocking = null;
    }
    public function updateBlocking(){
        $car = cars::where('id',$this->selectedUnitforblocking)->first();
        $oldBlocking = blockings::find($car->blockings);
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

    // #[On('reload')]
    public function render()
    {
        $clients = client::get();
        $inventory = modelinventory::where('status',0)->get();
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
