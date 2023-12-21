<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class washing extends Model
{
    use HasFactory;
    protected $table = 'washing';
    protected $fillable = [
        'cars_id',
        'vehicleidno',
        'name',
        'dateFinishedWashing',
        'status',
        'selectedBy'
    ];
    public $timestamps = false;
}
