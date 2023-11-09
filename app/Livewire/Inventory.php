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


class Inventory extends Component
{
    use WithPagination;
    public $search = '';
    public $status = 2;
    public $startdate ;
    public $enddate ;
    public $findings = [];
    public $clienttag ;
    public $display;


    public function getFindings($id = null){
        $this->findings = findings::where('vehicleid',$id)->get();
        // dd($this->findings);
        $this->display = true;
    }

    public function render()
    {

        $clients = client::get();

        // $this->enddate = Carbon::now();
        $inventory = modelinventory::where('status',0)
        ->whereBetween('created_at',[$this->startdate, $this->enddate])
        ->get();

        $vinArray = $inventory->pluck('vehicleidno');
        $cars = cars::with(['blocking','finding'])
        ->whereIn('vehicleidno',$vinArray)
        ->where('vehicleidno', 'LIKE', "%{$this->search}%")
        ->Where('status', 'LIKE', "%{$this->status}%")
        ->Where('tag', 'LIKE', "%{$this->clienttag}%")
        ->paginate(25);

        // return dd($cars);
        return view('livewire.inventory',['cars'=>$cars,'clients'=>$clients]);
    }
}
