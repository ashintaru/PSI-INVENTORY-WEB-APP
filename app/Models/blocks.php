<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blocks extends Model
{
    use HasFactory;

    protected $fillable = [
        'blockname',
        'status'
    ];

    public function invoice(){
        return $this->belongsTo(invoicedata::class,'block','id');
    }

    public function blockings(){
        return $this->hasMany(blockings::class,'blockId','id');
    }


}
