<?php

namespace App\Models;

use App\Http\Controllers\car;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recieving extends Model
{
    use HasFactory;
    protected $table = 'receiving';
    protected $primaryKey = 'vehicleidno';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable =
    [
        'vehicleidno',
        'status'
    ];
    public function car(){
        return $this->hasOne(cars::class,'vehicleidno','vehicleidno');
    }
    public function settools(){
        return $this->hasOne(set_tool::class,'vehicleidno','vehicleidno');
    }
    public function loosetools(){
        return $this->hasOne(tool::class,'vehicleidno','vehicleidno');
    }
    public function damage(){
        return $this->hasOne(damage::class,'vehicleidno','vehicleidno');
    }


}
