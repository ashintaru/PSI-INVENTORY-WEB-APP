<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoce extends Model
{
    use HasFactory;
    protected $fillable =  [
        'vehicleidno','status','stp','vehicletype','modeltype','salesremark','csrno','csrtype','csrdate','dateModifier'
    ];
    public function car(){
        return $this->belongsTo(cars::class,'vehicleidno','vehicleidno');
    }
}
