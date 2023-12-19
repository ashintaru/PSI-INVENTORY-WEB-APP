<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stencil extends Model
{
    use HasFactory;
    protected $table = 'stenci';
    protected $fillable = [
        'cars_id',
        'name',
        'dateFinishStencil',
    ];

    public function car(){
        return $this->belongsTo(cars::class,'id','cars_id');
    }

}
