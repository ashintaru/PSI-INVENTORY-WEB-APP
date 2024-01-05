<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instalation extends Model
{
    protected $table = 'installation';
    protected $fillable = [
        'car_id',
        'vehicleidno',
        'status',
        'csno',
        'personel',
        'tools',
        'remark',
        'dateFinishedinstallation',
        'selectedBy'
    ];
    use HasFactory;
}
