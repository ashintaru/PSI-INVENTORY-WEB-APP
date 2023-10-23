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
    public function __construct(string $tag = null ,$start = null,$end = null)
    {
        $this->start = $start;
        $this->end = $end;
        $this->tag = $tag;
    }

    public function query()
    {
        if($this->tag == null){
            return invoce::
            select(
                [
                    'mmpcmodelcode',
                    'mmpcmodelyear',
                    'mmpcoptioncode',
                    'extcolorcode',
                    'modeldescription',
                    'exteriorcolor',
                    'csno',
                    'bilingdate',
                    'vehicleidno',
                    'engineno',
                    'productioncbunumber',
                    'bilingdocuments',
                    'vehiclestockyard',
                ]
            )
            ->getQuery()
            ->orderBy('vehicleidno','ASC')
            ->whereBetween('invoces.created_at',[$this->start,$this->end]);
        }else{
            return invoce::
            select(
                [
                    'mmpcmodelcode',
                    'mmpcmodelyear',
                    'mmpcoptioncode',
                    'extcolorcode',
                    'modeldescription',
                    'exteriorcolor',
                    'csno',
                    'bilingdate',
                    'vehicleidno',
                    'engineno',
                    'productioncbunumber',
                    'bilingdocuments',
                    'vehiclestockyard',
                ]
            )
            ->getQuery()
            ->where('tag',$this->tag)
            ->orderBy('vehicleidno','ASC')
            ->whereBetween('invoces.created_at',[$this->start,$this->end]);
        }

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
