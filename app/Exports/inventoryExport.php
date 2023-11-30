<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
// use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class inventoryExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    use Exportable;
    public function __construct($data = null)
    {
        $this->data = $data;
    }
    public function collection()
    {
        return $this->data;
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
