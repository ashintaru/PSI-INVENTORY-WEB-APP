<?php

namespace App\Imports;

use App\Models\cars;
use App\Models\carstatus;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class carsImport implements ToModel,WithChunkReading,WithValidation,ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $bin = DB::table('cars')->get();

    // Get all bin number from the $bin collection
        $bin_number = $bin->pluck('vehicleidno');

    // Checking if the bin number is already in the database
    if ($bin_number->contains($row[8]) == false)
    {

        $description = explode(' ',$row[4]);

        if( strtolower($description[0]) == strtolower("mirage") )
            $tag = "MAZDA";
        elseif ( strtolower($description[0]) == strtolower("l300") )
            $tag = "MMPC";
        else
            $tag = "SUBURU";

        return [
            new cars([
            'mmpcmodelcode'=> $row[0],
            'mmpcmodelyear'=> $row[1] ,
            'mmpcoptioncode'=> $row[2],
            'extcolorcode'=> $row[3],
            'modeldescription'=> $row[4],
            'exteriorcolor'=> $row[5],
            'csno'=> $row[6],
            'tag'=>$tag,
            'bilingdate'=> Carbon::parse($row[7]),
            'vehicleidno'=> $row[8],
            'engineno'=> $row[9],
            'productioncbunumber'=> $row[10],
            'bilingdocuments'=> $row[11],
            'vehiclestockyard'=> $row[12],
        ]),
        new carstatus([
            'vehicleidno'=>$row[8],
            'havebeenpassed'=>false,
            'havebeenchecked'=>false,
            'havebeenreleased'=>false,
            'havebeenstored'=>false,
            'hasloosetool'=>false,
            'hassettool'=>false,
            'hasdamage'=>false
            ])
        ];
    }
    else null;

    }
    public function chunkSize(): int
    {
        return 1000;
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
