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
    public $timestamps = false;
    use HasFactory;

    public function car(){
        return $this->belongsTo(cars::class,'car_id','id');

    }
    public function user(){
        return $this->hasOne(User::class,'id','selectedBy');
    }

    public function pdi(){
        return $this->hasOne(pdi::class,'car_id','car_id');
    }


}
