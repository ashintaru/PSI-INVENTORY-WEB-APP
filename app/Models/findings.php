<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class findings extends Model
{
    use HasFactory;
    protected $primaryKey = 'vehicleidno';
    protected $table = 'findings';
    protected $fillable = [
        'vehicleid',
        'vehicleidno',
        'settool',
        'looseitem',
        'findings',
    ];


}
