<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;
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
    // class ,fk , ownkey
    public function invoice(){
        return $this->hasOne(invoce::class,'vehicleidno','vehicleidno');
    }
}
