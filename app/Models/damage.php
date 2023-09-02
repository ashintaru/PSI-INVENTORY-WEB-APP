<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class damage extends Model
{
    use HasFactory;
    protected $table = 'damage';
    protected $fillable = [
        'vehicleidno',
        'dents',
        'dings',
        'scratches',
        'paintdefects',
        'damage',
        'other',
        'remark'
    ];
}
