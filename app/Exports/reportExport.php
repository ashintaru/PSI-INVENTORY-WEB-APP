<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\cars;

class reportExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function __construct($vinArray = null)
    {
        $this->vinArray = $vinArray;
    }
    public function collection()
    {
        return cars::select([
            'mmpcmodelcode','mmpcmodelyear','mmpcoptioncode','extcolorcode','modeldescription','exteriorcolor','csno',
            'bilingdate','vehicleidno','engineno','productioncbunumber','bilingdocuments','vehiclestockyard',
        ])
        ->whereIn('vehicleidno',$this->vinArray)
        ->get();
    }
    public function headings(): array
    {
        return [
            'Model Code',
            'MModel Year',
            'Caption Code',
            'Extra Color',
            'Model Description',
            'Exterior Color',
            'CS No',
            'Billing Date',
            'Vehicle Id No',
            'Engine No',
            'Production Number',
            'Billing Documents',
            'Vehicle Stockyards'
        ];
    }
}
