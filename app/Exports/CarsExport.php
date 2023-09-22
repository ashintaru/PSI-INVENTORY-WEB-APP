<?php

namespace App\Exports;

use App\Models\cars;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class CarsExport implements FromQuery
{
    use Exportable;

    public function __construct(string $tag ,int $status = null)
    {
        $this->status = $status;
        $this->tag = $tag;
    }

    public function query()
    {
        if($this->status == null)
            return cars::query()->where('tag', $this->tag);
        else
            return cars::join('carstatus','carstatus.vehicleidno','=','cars.vehicleidno')->query()
            ->where('tag', $this->tag)->where('havebeenpassed',$this->status);
    }
}
