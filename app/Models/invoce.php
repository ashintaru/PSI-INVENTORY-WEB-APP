<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoce extends Model
{
    use HasFactory;
    protected $fillable =  [
        'vehicleid','vehicleidno','status'
    ];
    public function car(){
        return $this->belongsTo(cars::class,'vehicleidno','vehicleidno');
    }
    public function invoicedata(){
        return $this->hasOne(invoicedata::class,'invoiceid','id');
    }
}
