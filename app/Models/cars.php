<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cars extends Model
{
    use HasFactory;

    protected $fillable = 
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
        'vehiclestockyard'
    ];
}
