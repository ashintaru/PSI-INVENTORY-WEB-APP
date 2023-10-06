<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carstatus extends Model
{
    protected $table = 'carstatus';
    use HasFactory;
    protected $fillable = [
        'vehicleid',
        'havebeenpassed',
        'havebeenchecked',
        'havebeenreleased',
        'havebeenstored',
        'hasloosetool',
        'hassettool',
        'hasdamage',
        'datein',
        'daterecieve',
        'recieveBy',
    ];

    public function car(){
        return $this->BelongsTo(cars::class,'vehicleid','id');
    }
}
