<?php

namespace App\Imports;
use App\Models\cars;
use App\Models\invoce as invoice;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use App\Models\inventory;



//we shuold implement queue job
class Importinvoce implements ToModel,WithBatchInserts
{
    public function model(array $row)
    {
        $bin = inventory::get();
        $bin_number = $bin->pluck('vehicleidno');
        $invoice = invoice::get();
        $invoice_number = $invoice->pluck('vehicleidno');

        if ($bin_number->contains($row[11]) == true && $invoice_number->contains($row[11]) != true)
        {
            $car = inventory::where('vehicleidno',$row[11])->first();
            $temp = $car;
            $car->delete();
            return new invoice([
                'mmpcmodelcode'=> $temp->mmpcmodelcode,
                'mmpcmodelyear'=> $temp->mmpcmodelyear ,
                'mmpcoptioncode'=> $temp->mmpcoptioncode,
                'extcolorcode'=> $temp->extcolorcode,
                'modeldescription'=> $temp->modeldescription,
                'exteriorcolor'=> $temp->exteriorcolor,
                'csno'=> $temp->csno,
                'tag'=>$temp->tag,
                'bilingdate'=> Carbon::parse($temp->bilingdate)->format('Y-m-d'),
                'vehicleidno'=> $temp->vehicleidno,
                'engineno'=> $temp->engineno,
                'productioncbunumber'=> $temp->productioncbunumber,
                'bilingdocuments'=> $temp->bilingdocuments,
                'vehiclestockyard'=> $temp->vehiclestockyard,
                'blockings'=>$temp->blockings,
                'receiveBy'=>$temp->receiveBy,
                'dateIn'=>$temp->dateIn,
                'dateEncode'=>$temp->dateEncode
            ]);
        }
        else
            return null;
     }
     public function batchSize(): int
     {
         return 500;
     }
}
