<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stencil extends Model
{
    use HasFactory;
    protected $table = 'stencil';
    protected $fillable = [
        'cars_id',
        'vehicleidno',
        'name',
        'dateFinishStencil',
        'status',
        'selectedBy'
    ];
    public $timestamps = false;

    public function car(){
        return $this->belongsTo(cars::class,'cars_id','id');
    }
    public function user(){
        return $this->hasOne(User::class,'id','selectedBy');
    }

    public function washing(){
        return $this->hasOne(washing::class,'car_id','cars_id');
    }

}
