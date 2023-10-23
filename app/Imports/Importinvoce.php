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
        $bin = inventory::where('status',1)->get();
        $bin_number = $bin->pluck('vehicleidno');
        $invoice = invoice::where('status',0)->get();
        $invoice_number = $invoice->pluck('vehicleidno');
        if ($bin_number->contains($row[11]) == true && $invoice_number->contains($row[11]) != true)
        {
            $car = inventory::where('vehicleidno',$row[11])->first();
            $car->status = 0;
            $car->update();
            return new invoice([
                'vehicleidno'=> $car->vehicleidno,
                'status' => 0
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
