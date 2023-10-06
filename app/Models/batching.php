<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batching extends Model
{
    use HasFactory;
    protected $table = 'batching';
    protected $fillable = [
        'unitid',
    ];
    public $timestamps = false;
    public function car(){
        return $this->belongsTo(cars::class,'unitid','id');
    }


}
