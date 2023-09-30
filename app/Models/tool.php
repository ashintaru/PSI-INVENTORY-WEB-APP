<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tool extends Model
{
    use HasFactory;

    protected $table = 'loose_tool';
    protected $fillable = [
        'vehicleid',
        'ownermanual',
        'warantybooklet',
        'key',
        'remotecontrol',
    	'others',
    ];

    public function car(){
        return $this->BelongsTo(cars::class,'vehicleid','id');
    }
}
