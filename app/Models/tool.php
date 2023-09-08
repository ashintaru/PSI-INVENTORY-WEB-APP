<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tool extends Model
{
    use HasFactory;

    protected $table = 'loose_tool';
    protected $fillable = [
        'vehicleidno',
        'ownermanual',
        'warantybooklet',
        'key',
        'remotecontrol',
    	'others',

    ];

    public function user(){
        return $this->BelongsTo(cars::class,'vehicleidno','vehicleidno');
    }
}
