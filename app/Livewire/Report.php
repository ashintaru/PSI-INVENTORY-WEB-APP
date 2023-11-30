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
use App\Exports\reportExport;

class Report extends Component
{
    use WithPagination;
    public $datefrom;
    public $dateto;
    public $data;
    public $action;
    public $vinArray;

    public function exportToExcel(){
        switch ($this->action) {
            case 'recieved':
                    $name = "receiving-Report".Carbon::now();
                    return (new reportExport($this->vinArray))->download($name.'.xlsx');
                break;
            case 'stored':
                    $name = "inventory-Report".Carbon::now();
                    return (new reportExport($this->vinArray))->download($name.'.xlsx');
                break;
            case 'invoice':
                    $name = "invoice-Report".Carbon::now();
                    return (new reportExport($this->vinArray))->download($name.'.xlsx');
                break;
            case 'released':
                    $name = "released-Report".Carbon::now();
                    return (new reportExport($this->vinArray))->download($name.'.xlsx');
                break;
            default:
                # code...
                break;
        }
    }
    public function fetchData(){
        switch ($this->action) {
            case 'recieved':
                    $recievedUnits = recieving::whereBetween('created_at',[$this->datefrom,$this->dateto])->get();
                    // dd($recievedUnits);
                    $this->vinArray = $recievedUnits->pluck('vehicleidno');
                    $this->data = cars::select([
                        'mmpcmodelcode','mmpcmodelyear','mmpcoptioncode','extcolorcode','modeldescription','exteriorcolor','csno',
                        'bilingdate','vehicleidno','engineno','productioncbunumber','bilingdocuments','vehiclestockyard',
                    ])
                    ->whereIn('vehicleidno',$this->vinArray)
                    ->get();
                break;
            case 'stored':
                    $storeddUnits = inventory::whereBetween('created_at',[$this->datefrom,$this->dateto])->get();
                    // dd($recievedUnits);
                    $this->vinArray = $storeddUnits->pluck('vehicleidno');
                    $this->data = cars::select([
                        'mmpcmodelcode','mmpcmodelyear','mmpcoptioncode','extcolorcode','modeldescription','exteriorcolor','csno',
                        'bilingdate','vehicleidno','engineno','productioncbunumber','bilingdocuments','vehiclestockyard',
                    ])
                    ->whereIn('vehicleidno',$this->vinArray)
                    ->get();
                break;
            case 'invoice':
                    $invoiceUnits = invoce::whereBetween('created_at',[$this->datefrom,$this->dateto])->get();
                    // dd($recievedUnits);
                    $this->vinArray = $invoiceUnits->pluck('vehicleidno');
                    $this->data = cars::select([
                        'mmpcmodelcode','mmpcmodelyear','mmpcoptioncode','extcolorcode','modeldescription','exteriorcolor','csno',
                        'bilingdate','vehicleidno','engineno','productioncbunumber','bilingdocuments','vehiclestockyard',
                    ])
                    ->whereIn('vehicleidno',$this->vinArray)
                    ->get();
                break;
            case 'released':
                    $releasUnits = released::whereBetween('created_at',[$this->datefrom,$this->dateto])->get();
                    // dd($recievedUnits);
                    $this->vinArray = $releasUnits->pluck('vehicleidno');

                    $this->data = cars::select([
                        'mmpcmodelcode','mmpcmodelyear','mmpcoptioncode','extcolorcode','modeldescription','exteriorcolor','csno',
                        'bilingdate','vehicleidno','engineno','productioncbunumber','bilingdocuments','vehiclestockyard',
                    ])
                    ->whereIn('vehicleidno',$this->vinArray)
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
