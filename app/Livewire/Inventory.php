<?php

namespace App\Livewire;

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
    public $selectedUnit;
    public $isEditBlocking=false;
    public $selectedBlockings = [];
    public $blocking;
    public $unit = [];
    public $vin;


    #[On('get-blockings')]
    public function selectedBlocks($blockid){
        $this->selectedBlockings = blockings::select(['id','bloackname'])->where('blockId',$blockid)->where('blockstatus',0)->get();
        // dd($this->selectedBlockings);
    }


    public function getFindings($id = null){
        $this->findings = findings::where('vehicleid',$id)->get();
        $this->display = true;
    }


    public function editBlocking($id = null){
        $this->isEditBlocking = true;
        $this->selectedUnit = ($this->isEditBlocking)?$id:null;
        $this->unit = cars::where('id',$this->selectedUnit)->first();
        $this->vin = $this->unit->vehicleidno;
        // dd($this->unit);
    }


    public function updateBlocking(){
        // $cars = cars:
    }

    public function render()
    {
        $clients = client::get();
        // $this->enddate = Carbon::now();
        $inventory = modelinventory::where('status',0)
        ->where('vehicleidno', 'LIKE', "%{$this->search}%")
        ->where('created_at',[$this->startdate, $this->enddate])
        ->get();

        // $vinArray = $inventory->pluck('vehicleidno');
        $cars = cars::with(['inventory','blocking'])
        ->where('vehicleidno', 'LIKE', "%{$this->search}%")
        ->Where('status', 'LIKE', "%{$this->status}%")
        ->paginate(25);

        // return dd($cars);
        return view('livewire.inventory',['cars'=>$cars,'clients'=>$clients]);
    }
}
