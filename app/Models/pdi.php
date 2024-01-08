<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pdi extends Model
{
    use HasFactory;
    protected $table = 'pdi';
    protected $fillable = [
        'car_id',
        'vehicleidno',
        'pdi_sumary',
        'underchassis_sumary',
        'name',
        'dateFinish',
        'status',
        'selectedBy'
    ];
    public $timestamps = false;


}
