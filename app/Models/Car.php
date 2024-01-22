<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['marca','modelo','año','color','transmision','potencia','stock','placa_chasis'];
    use HasFactory;
    public function sales(){
        return $this->hasMany(Sales::class);
    }

}
