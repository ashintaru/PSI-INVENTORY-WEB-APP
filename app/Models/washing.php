<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class washing extends Model
{
    use HasFactory;
    protected $table = 'washing';
    protected $fillable = [
        'car_id',
        'vehicleidno',
        'name',
        'dateFinishedWashing',
        'status',
        'selectedBy'
    ];
    public $timestamps = false;

    public function car(){
        return $this->belongsTo(cars::class,'car_id','id');

    }
    public function user(){
        return $this->hasOne(User::class,'id','selectedBy');
    }

    public function instalation(){
        return $this->hasOne(instalation::class,'car_id','car_id');
    }

}
