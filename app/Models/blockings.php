<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blockings extends Model
{
    protected $table = 'blockings';
    use HasFactory;
    protected $fillable = [
        'blockId',
        'bloackname',
        'blockstatus',
    ];
    public function block(){
        return $this->belongsTo(blocks::class,'blockId','id');
    }
    public function car(){
        return $this->belongsTo(cars::class,'blockings','id');
    }
}
