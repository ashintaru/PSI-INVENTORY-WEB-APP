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
        'tag',
        'bilingdate',
        'vehicleidno',
        'engineno',
        'productioncbunumber',
        'bilingdocuments',
        'vehiclestockyard'
    ];

    public function settools(){
        return $this->hasOne(set_tool::class,'vehicleid','id');
    }
    public function loosetools(){
        return $this->hasOne(tool::class,'vehicleid','id');
    }

    public function damage(){
        return $this->hasOne(damage::class,'vehicleid','id');
    }


    public function status(){
        return $this->hasOne(carstatus::class,'vehicleidno','vehicleidno');
    }
    public function logs(){
        return $this->hasMany(Log::class,'idNum','vehicleidno');
    }
    public function inventory(){
        return $this->hasOne(inventory::class,'vehicleid','id');
    }
    // class ,fk ,lk
    public function invoice(){
        return $this->hasOne(invoce::class,'vehicleidno','vehicleidno');
    }
}
