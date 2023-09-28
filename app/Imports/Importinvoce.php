<?php
namespace App\Imports;

use App\Models\cars;
use App\Models\invoce as invoice;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
class Importinvoce implements ToModel,WithChunkReading,ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
            $bin = cars::join('carstatus','cars.vehicleidno','=','carstatus.vehicleidno')->where('havebeenpassed',1)->get();
            $bin_number = $bin->pluck('vehicleidno');
            $invoice = invoice::all();
            $invoice_number = $invoice->pluck('vehicleidno');
            if ($bin_number->contains($row[11]) == true && $invoice_number->contains($row[11]) != true)
            {
                return new invoice([
                    'vehicleidno'=>$row[11],
                    'status'=>0,
                    'stp'=>$row[0],
                    'vehicletype'=>$row[6],
                    'modeltype'=>$row[7],
                    'salesremark'=>$row[16],
                    'csrno'=>$row[17],
                    'csrtype'=>$row[18],
                    'csrdate'=>Carbon::parse($row[19])
                ]);

            }
     }
    public function chunkSize(): int
    {
        return 1000;
    }

}
