<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cars extends Model
{
    use HasFactory;
    protected $primaryKey = 'vehicleidno';

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
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
        'vehiclestockyard',
        'blockings',
        ''
    ];

    public function batch(){
        return $this->hasOne(batching::class,'vehicleidno','vehicleidno');
    }
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
        return $this->hasOne(carstatus::class,'vehicleid','id');
    }
    public function logs(){
        return $this->hasMany(Log::class,'idNum','vehicleidno');
    }
    public function inventory(){
        return $this->hasOne(inventory::class,'vehicleid','id');
    }
    public function blocking(){
        return $this->hasOne(blockings::class,'id','blockings');
    }
    // class ,fk ,lk
    public function invoice(){
        return $this->hasOne(invoce::class,'vehicleidno','vehicleidno');
    }
}
