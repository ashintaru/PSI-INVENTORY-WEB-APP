<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blockingHistory extends Model
{
    use HasFactory;
    protected $table = 'blockinghistory';
    protected $fillable = [
        'vehicleid',
        'from',
        'to',
        'user',
        'createdBy'
    ];
    public function account(){
        return $this->hasOne(User::class,'id','createdBy');
    }
    public function car(){
        return $this->hasOne(cars::class,'id','vehicleid');
    }
    public function fromblocking(){
        return $this->hasOne(blockings::class,'id','from');
    }
    public function toblocking(){
        return $this->hasOne(blockings::class,'id','to');
    }

}
