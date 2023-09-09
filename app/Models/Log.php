<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'log';
    protected $fillable = [
        'idNum',
        'logs',
    ];
    public function cars(){
        return $this->belongsTo(cars::class,'vehicleidno','idNum');
    }
}
