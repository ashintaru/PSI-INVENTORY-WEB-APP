<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class set_tool extends Model
{
    use HasFactory;
    protected $table = 'set_tool';
    protected $fillable = [
        'vehicleidno',
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
}
