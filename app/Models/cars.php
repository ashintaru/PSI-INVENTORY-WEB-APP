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

    public function settools(){
        return $this->hasOne(set_tool::class,'vehicleidno','vehicleidno');
    }
    public function loosetools(){
        return $this->hasOne(tool::class,'vehicleidno','vehicleidno');
    }

    public function damage(){
        return $this->hasOne(damage::class,'vehicleidno','vehicleidno');
    }

    public function status(){
        return $this->hasOne(carstatus::class,'vehicleidno','vehicleidno');
    }
    public function logs(){
        return $this->hasMany(Log::class,'idNum','vehicleidno');
    }
    public function inventory(){
        return $this->hasOne(inventory::class,'vehicleidno','vehicleidno');
    }
}
