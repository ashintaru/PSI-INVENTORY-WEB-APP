<?php

namespace App\Imports;

use App\Models\cars;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\carstatus;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;


class mzdsImport implements ToModel,WithBatchInserts,WithValidation,WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable;
    public function model(array $row)
    {
        $bin = DB::table('cars')->get();
        $bin_number = $bin->pluck('vehicleidno');

    if ($bin_number->contains($row[8]) == false)
    {

        return [
            new cars([
                'mmpcmodelcode'=> $row[0],
                'mmpcmodelyear'=> $row[1] ,
                'mmpcoptioncode'=> $row[2],
                'extcolorcode'=> $row[3],
                'modeldescription'=> $row[4],
                'exteriorcolor'=> $row[5],
                'csno'=> $row[6],
                'tag'=>"mazda",
                'bilingdate'=> Carbon::parse($row[7])->format('Y-m-d'),
                'vehicleidno'=> $row[8],
                'engineno'=> $row[9],
                'productioncbunumber'=> $row[10],
                'bilingdocuments'=> $row[11],
                'vehiclestockyard'=> $row[12],
                'blockings'=>'',
                'recieveBy'=>'',
            ])
     ];
    }
    else null;

    }
    public function batchSize(): int
    {
        return 500;
    }
    public function uniqueBy()
    {
        return 'vehicleidno';
    }
    public function rules(): array
    {
        return [
            'nim' => Rule::unique('cars', 'vehicleidno'), // Table name, field in your db
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nim.unique' => 'Custom message',
        ];
    }

}
