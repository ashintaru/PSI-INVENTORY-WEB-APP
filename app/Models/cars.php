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
        'recieveBy',
        'dateIm',
        'dateEncode',
        'dateReleased',
        'releasedBy',
        'dealer',
        'remark',
        'status',
        'invoiceBlock',
        'movedBy',
        'touchBy'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','touchBy');
    }
    public function batch(){
        return $this->hasOne(batching::class,'vehicleidno','vehicleidno');
    }
    public function finding(){
        return $this->hasMany(findings::class,'vehicleid','id');
    }
    public function receive(){
        return $this->belongsTo(recieving::class,'vehicleidno','vehicleidno');
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
    public function logs(){
        return $this->hasMany(Log::class,'idNum','vehicleidno');
    }
    public function inventory(){
        return $this->hasOne(inventory::class,'vehicleidno','vehicleidno');
    }
    public function blocking(){
        return $this->hasOne(blockings::class,'id','blockings');
    }
    public function invblocking(){
        return $this->hasOne(blockings::class,'id','invoiceBlock');
    }
    public function invoice(){
        return $this->hasOne(invoce::class,'vehicleidno','vehicleidno');
    }
    public function stencil(){
        return $this->hasOne(stencil::class,'cars_id','id');
    }
    public function client(){
        return $this->hasOne(client::class,'id','tag');
    }
    public function released(){
        return $this->hasOne(released::class,'vehicleidno','vehicleidno');
    }
}
