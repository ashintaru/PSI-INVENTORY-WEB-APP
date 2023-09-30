<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class set_tool extends Model
{
    use HasFactory;
    protected $table = 'set_tool';
    protected $fillable = [
        'vehicleid',
        'toolbag',
        'tirewrench',
        'jack',
        'jackhandle',
        'openwrench',
        'towhook',
        'slottedscrewdriver',
        'philipsscrewdriver',
        'wheels',
        'cigarettelighter',
        'wheelcap',
        'sparetire',
        'antena',
        'mating',
        'other',
    ];

    public function car(){
        return $this->BelongsTo(cars::class,'vehicleid','id');
    }
}
