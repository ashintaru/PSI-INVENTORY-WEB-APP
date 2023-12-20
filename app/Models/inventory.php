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
        'car_id',
        'vehicleidno',
        'status',
        'selectBy'
    ];
    public function user(){
        return $this->hasOne(User::class,'id','selectBy');
    }

    public function car(){
        return $this->hasOne(cars::class,'vehicleidno','vehicleidno');
    }
    // class ,fk , ownkey
    public function invoice(){
        return $this->hasOne(invoce::class,'vehicleidno','vehicleidno');
    }
    public function stencil(){
        return $this->hasOne(stencil::class,'cars_id','car_id');
    }

}
