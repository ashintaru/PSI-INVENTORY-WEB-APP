<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carModel extends Model
{
    use HasFactory;
    protected $table = 'model';
    protected $fillable = [
        'modelName',
        'clientId'
    ];
    public function client(){
        return $this->belongsTo(client::class,'id','clientId');
    }
    public function tools(){
        return $this->hasOne(instaledTools::class,'model_id','id');
    }
}
