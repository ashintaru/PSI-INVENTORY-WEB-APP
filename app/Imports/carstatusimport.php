<?php

namespace App\Imports;

use App\Models\carstatus;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;


class carstatusimport implements ToModel,WithBatchInserts  
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new carstatus([
        'vehicleidno'=>$row[8],
        'havebeenpassed'=>false,
        'havebeenchecked'=>false,
        'havebeenreleased'=>false
        ]);
    }
    public function batchSize(): int
    {
        return 1000;
    }
}
