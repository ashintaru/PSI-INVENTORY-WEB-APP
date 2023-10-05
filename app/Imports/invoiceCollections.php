<?php

namespace App\Imports;

use App\Models\invoce;
use Maatwebsite\Excel\Concerns\ToModel;

class invoiceCollections implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new invoce([
            //
        ]);
    }
}
