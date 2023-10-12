<?php

namespace App\Exports;

use App\Http\Controllers\invoice;
use App\Models\invoce;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class invoiceExport implements FromQuery,WithHeadings,ShouldAutoSize
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
        return invoce::
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
                'invoces.stp',
                'invoces.vehicletype',
                'invoces.modeltype',
                'invoces.salesremark',
                'invoces.csrno',
                'invoces.csrtype',
                'invoces.csrdate'
            ]
        )
        ->join('cars','cars.vehicleidno','=','invoces.vehicleidno')
        ->getQuery()
        ->where('cars.tag',$this->tag)
        ->orderBy('cars.id','ASC')
        ->whereBetween('invoces.created_at',[$this->start,$this->end]);
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
            'Vehicle Stockyards',
            'STP',
            'vehicle Type',
            'Model Type',
            'Sales Remark',
            'Cs No.',
            'Csr Type',
            'Csr Date'
        ];
    }
}
