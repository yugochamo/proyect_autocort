<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['car_id','user_id','client_id','cantidad','estado','fecha_venta','precio_venta'];

    public function car(){
        return $this->belongsTo(Car::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
