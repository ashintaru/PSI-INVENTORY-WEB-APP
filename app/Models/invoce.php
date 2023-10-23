<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoce extends Model
{
    use HasFactory;
    protected $primaryKey = 'vehicleidno';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable =
    [
        'vehicleidno',
        'status'
    ];
    public function car(){
        return $this->hasOne(cars::class,'vehicleidno','vehicleidno');
    }
    public function blocking(){
        return $this->hasOne(blockings::class,'id','blockings');
    }
}
