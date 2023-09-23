<?php
namespace App\Exports;

use App\Models\inventory;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;


class inventoryExport implements FromQuery,WithHeadings
{
    use Exportable;
    public function __construct(string $tag ,$start = null,$end = null)
    {
        $this->start = $start;
        $this->end = $end;
        $this->tag = $tag;
    }

    public function query()
    {
        return inventory::
        select(
            [
                'cars.mmpcmodelcode',
                'cars.mmpcmodelyear',
                'cars.mmpcoptioncode',
                'cars.extcolorcode',
                'cars.modeldescription',
                'cars.exteriorcolor',
                'cars.csno',
                'cars.bilingdate',
                'cars.vehicleidno',
                'cars.engineno',
                'cars.productioncbunumber',
                'cars.bilingdocuments',
                'cars.vehiclestockyard',
            ]
        )
        ->join('cars','cars.vehicleidno','=','inventories.vehicleidno')
        ->getQuery()
        ->where('cars.tag',$this->tag)
        ->orderBy('cars.id','ASC')
        ->whereBetween('inventories.created_at',[$this->start,$this->end]);
    }

    public function headings(): array
    {
        return [
            'MMPC Model Code',
            'MMPC MModel Year',
            'MMPC Caption Code',
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
