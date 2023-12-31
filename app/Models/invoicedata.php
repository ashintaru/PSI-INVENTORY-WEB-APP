<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoicedata extends Model
{

    use HasFactory;
    protected $table = 'invoicedatas';
    protected $fillable = [
        'invoiceid',
        'name',
        'date',
        'block'
    ];

    public function invoice(){
        return $this->belongsTo(invoce::class,'id','invoiceid');
    }
    public function blockings(){
        return $this->hasOne(blockings::class,'id','block');
    }
}
