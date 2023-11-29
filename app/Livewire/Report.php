<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\recieving;
use Livewire\WithPagination;
use App\Models\cars;
use App\Models\inventory;
use App\Models\invoce;
use App\Models\released;

class Report extends Component
{
    use WithPagination;
    public $datefrom;
    public $dateto;
    public $data;
    public $action;

    // public function mount(){
    //     $this->dateto =  Carbon::now()->format('d-m-Y');
    // }
    public function fetchData(){
        switch ($this->action) {
            case 'recieved':
                    $recievedUnits = recieving::whereBetween('created_at',[$this->datefrom,$this->dateto])->get();
                    // dd($recievedUnits);
                    $vinArray = $recievedUnits->pluck('vehicleidno');
                    $this->data = cars::with(['blocking','client'])
                    ->whereIn('vehicleidno',$vinArray)
                    ->get();
                break;
            case 'stored':
                    $storeddUnits = inventory::whereBetween('created_at',[$this->datefrom,$this->dateto])->get();
                    // dd($recievedUnits);
                    $vinArray = $storeddUnits->pluck('vehicleidno');
                    $this->data = cars::with(['blocking','client'])
                    ->whereIn('vehicleidno',$vinArray)
                    ->get();
                break;
            case 'invoice':
                    $invoiceUnits = invoce::whereBetween('created_at',[$this->datefrom,$this->dateto])->get();
                    // dd($recievedUnits);
                    $vinArray = $invoiceUnits->pluck('vehicleidno');
                    $this->data = cars::with(['blocking','client'])
                    ->whereIn('vehicleidno',$vinArray)
                    ->get();
                break;
            case 'released':
                    $releasUnits = released::whereBetween('created_at',[$this->datefrom,$this->dateto])->get();
                    // dd($recievedUnits);
                    $vinArray = $releasUnits->pluck('vehicleidno');
                    $this->data = cars::with(['blocking','client'])
                    ->whereIn('vehicleidno',$vinArray)
                    ->get();
                break;
            default:
                # code...
                break;
        }
        // dd($this->data);

    }
    public function check(){
        dd($this->dateto);
    }
    public function render()
    {
        return view('livewire.report');
    }
}
