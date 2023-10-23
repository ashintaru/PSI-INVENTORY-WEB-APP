<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class released extends Model
{
    use HasFactory;
    protected $table = 'release_unit';
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
}
