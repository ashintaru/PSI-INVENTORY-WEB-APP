<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoicelist extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicleidno',
        'idinvoicecount',
        'status'
    ];
}
