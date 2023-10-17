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
            return new invoice([
                'vehicleidno'=>$row[11],
                'status'=>0,
                'stp'=>$row[0],
                'vehicletype'=>$row[6],
                'modeltype'=>$row[7],
                'salesremark'=>$row[16],
                'csrno'=>$row[17],
                'csrtype'=>$row[18],
                'csrdate'=>Carbon::parse($row[19]),
                'dateModifier'=>null
            ]);
            $car->delete();
        }
        else
            return null;
     }
     public function batchSize(): int
     {
         return 500;
     }
}
