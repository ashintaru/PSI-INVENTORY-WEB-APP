<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recieving extends Model
{
    use HasFactory;
    protected $table = 'receiving';
    protected $primaryKey = 'vehicleidno';
    public $incrementing = false;
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
        'receiveBy',
        'dateIn',
        'dateEncode'
    ];
    public function blocking(){
        return $this->hasOne(blockings::class,'id','blockings');
    }
    public function settools(){
        return $this->hasOne(set_tool::class,'vehicleidno','vehicleidno');
    }
    public function loosetools(){
        return $this->hasOne(tool::class,'vehicleidno','vehicleidno');
    }
    public function damage(){
        return $this->hasOne(damage::class,'vehicleidno','vehicleidno');
    }


}
