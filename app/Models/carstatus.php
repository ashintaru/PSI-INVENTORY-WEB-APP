<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carstatus extends Model
{
    protected $table = 'carstatus';
    use HasFactory;
    protected $fillable = [
        'vehicleidno',
        'havebeenpassed',
        'havebeenchecked',
        'havebeenreleased',
        'havebeenstored',
        'hasloosetool',
        'hassettool',
        'hasdamge'
    ];
    public function user(){
        return $this->BelongsTo(cars::class,'vehicleidno','vehicleidno');
    }
}
