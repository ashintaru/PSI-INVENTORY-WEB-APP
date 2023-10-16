<?php

namespace App\Services;
use App\Models\cars;
use App\Models\recieving as unit;


class carsService{
    public function store(cars $cars){

        unit::create(
            [
                'mmpcmodelcode'=>$cars->mmpcmodelcode,
                'mmpcmodelyear'=>$cars->mmpcmodelyear,
                'mmpcoptioncode'=>$cars->mmpcoptioncode,
                'extcolorcode'=>$cars->extcolorcode,
                'modeldescription'=>$cars->modeldescription,
                'exteriorcolor'=>$cars->exteriorcolor,
                'csno'=>$cars->csno,
                'tag'=>$cars->tag,
                'bilingdate'=>$cars->bilingdate,
                'vehicleidno'=>$cars->vehicleidno,
                'engineno'=>$cars->engineno,
                'productioncbunumber'=>$cars->productioncbunumber,
                'bilingdocuments'=>$cars->bilingdocuments,
                'vehiclestockyard'=>$cars->vehiclestockyard,
                'blockings'=>$cars->blockings
            ]
        );
        $cars->remove();
    }

}
