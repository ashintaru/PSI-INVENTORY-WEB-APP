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

    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function model(array $row)
    {
        return new blockings([
            'blockId'=>$this->id,
            'bloackname'=>$row[1],
            'blockstatus'=>false,
            ]);

    }
    public function batchSize(): int
    {
        return 1000;
    }
}
