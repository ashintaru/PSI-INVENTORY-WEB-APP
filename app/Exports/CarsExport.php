<?php

namespace App\Exports;

use App\Models\cars;
use Maatwebsite\Excel\Excel;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\FromQuery;



class CarsExport implements FromQuery
{

    use Exportable;

    // private $fileName = 'invoices.xlsx';

    // /**
    // * Optional Writer Type
    // */
    // private $writerType = Excel::XLSX;

    // /**
    // * Optional headers
    // */
    // private $headers = [
    //     'Content-Type' => 'text/csv',
    // ];
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return cars::all();
    // }
    public function __construct(string $tag)
    {
        $this->tag = $tag;
    }

    public function query()
    {
        return cars::query()->where('tag', $this->tag);
    }
}
