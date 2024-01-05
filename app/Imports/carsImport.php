<?php

namespace App\Imports;
use App\Models\cars;
use App\Models\carstatus;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;


class carsImport implements ToModel,WithBatchInserts,WithValidation,WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    use Importable;

    private $tags;
    public function __construct(int $tag)
    {
        $this->tags = $tag;
    }

    public function model(array $row)
    {
            $bin = DB::table('cars')->get();
            $bin_number = $bin->pluck('vehicleidno');
        switch ($row[2]) {
            case 'WULING':
                if ($bin_number->contains($row[1]) == false)
                {
                    return [
                        new cars([
                            'mmpcmodelcode'=> null,
                            'mmpcmodelyear'=> $row[14] ,
                            'mmpcoptioncode'=>null,
                            'extcolorcode'=> null,
                            'modeldescription'=> $row[3],
                            'exteriorcolor'=> $row[10],
                            'csno'=> $row[11],
                            'tag'=>$this->tags,
                            'bilingdate'=> null,
                            'vehicleidno'=> $row[1],
                            'engineno'=> $row[5],
                            'productioncbunumber'=> null,
                            'bilingdocuments'=> null,
                            'vehiclestockyard'=> null,
                            'blockings'=>null,
                            'recieveBy'=>null,
                            'dateIn'=>null,
                            'dateEncode'=>null,
                            'dateReleased'=>null,
                            'releasedBy'=>null,
                            'dealer'=>null,
                            'remark'=>null,
                            'status'=>null,
                            'invoiceBlock'=>null,
                            'movedBy'=>null,
                            'touchBy'=>null
                        ])
                    ];
                }
                else null;
            break;

            default:
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
                            'tag'=>$this->tags,
                            'bilingdate'=> Carbon::parse($row[7])->format('Y-m-d'),
                            'vehicleidno'=> $row[8],
                            'engineno'=> $row[9],
                            'productioncbunumber'=> $row[10],
                            'bilingdocuments'=> $row[11],
                            'vehiclestockyard'=> $row[12],
                            'blockings'=>null,
                            'recieveBy'=>null,
                            'dateIn'=>null,
                            'dateEncode'=>null,
                            'dateReleased'=>null,
                            'releasedBy'=>null,
                            'dealer'=>null,
                            'remark'=>null,
                            'status'=>null,
                            'invoiceBlock'=>null,
                            'movedBy'=>null,
                            'touchBy'=>null
                        ])
                    ];
                }
                else null;
            break;
        }

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
