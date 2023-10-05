<?php

namespace App\Imports;

use App\Models\blockings;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class importBlockings implements ToModel,WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[0]=='A'){
            return new blockings([
                'blockId'=>1,
                'bloackname'=>$row[1],
                'blockstatus'=>false,
                ]);
        }elseif($row[0]=='B'){
            return new blockings([
                'blockId'=>2,
                'bloackname'=>$row[1],
                'blockstatus'=>false,
                ]);
        }elseif($row[0]=='C'){
            return new blockings([
                'blockId'=>3,
                'bloackname'=>$row[1],
                'blockstatus'=>false,
                ]);
        }elseif($row[0]=='D'){
            return new blockings([
                'blockId'=>4,
                'bloackname'=>$row[1],
                'blockstatus'=>false,
                ]);
        }elseif($row[0]=='E'){
            return new blockings([
                'blockId'=>5,
                'bloackname'=>$row[1],
                'blockstatus'=>false,
                ]);
        }elseif($row[0]=='F'){
            return new blockings([
                'blockId'=>6,
                'bloackname'=>$row[1],
                'blockstatus'=>false,
                ]);
        }elseif($row[0]=='G'){
            return new blockings([
                'blockId'=>7,
                'bloackname'=>$row[1],
                'blockstatus'=>false,
                ]);
        }elseif($row[0]=='H'){
            return new blockings([
                'blockId'=>8,
                'bloackname'=>$row[1],
                'blockstatus'=>false,
                ]);
        }else{
            return new blockings([
                'blockId'=>$row[0],
                'bloackname'=>$row[1],
                'blockstatus'=>false,
                ]);
        }
    }
    public function batchSize(): int
    {
        return 1000;
    }
}
