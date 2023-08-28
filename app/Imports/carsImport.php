<?php

namespace App\Imports;

use App\Models\cars;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class carsImport implements ToModel,WithBatchInserts     
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new cars([
            //
            'mmpcmodelcode'=> $row[0], 	
            'mmpcmodelyear'=> $row[1] ,	
            'mmpcoptioncode'=> $row[2],	
            'extcolorcode'=> $row[3],	
            'modeldescription'=> $row[4],	
            'exteriorcolor'=> $row[5],	
            'csno'=> $row[6],	
            'bilingdate'=> Carbon::parse($row[7]),	
            'vehicleidno'=> $row[8],
            'engineno'=> $row[9],	
            'productioncbunumber'=> $row[10],	
            'bilingdocuments'=> $row[11],	
            'vehiclestockyard'=> $row[12],	
        ]);
    }
    public function batchSize(): int
    {
        return 1000;
    }
}
