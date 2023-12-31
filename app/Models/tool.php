<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tool extends Model
{
    use HasFactory;

    protected $table = 'loose_tool';
    protected $primaryKey = 'vehicleidno';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'vehicleidno',
        'ownermanual',
        'warantybooklet',
        'key',
        'remotecontrol',
    	'others',
    ];


    public function car(){
        return $this->BelongsTo(recieving::class,'vehicleid','vehicleidno');
    }
}
