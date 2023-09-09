<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;
    protected $fillable =  ['vehicleidno'];

    public function car(){
        return $this->belongsTo(cars::class,'vehicleidno','vehicleidno');
    }
}
