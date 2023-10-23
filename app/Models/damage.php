<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class damage extends Model
{
    use HasFactory;
    protected $primaryKey = 'vehicleidno';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'damage';
    protected $fillable = [
        'vehicleidno',
        'dents',
        'dings',
        'scratches',
        'paintdefects',
        'damage',
        'other',
        'remark'
    ];
    public function car(){
        return $this->BelongsTo(cars::class,'vehicleid','id');
    }
}
