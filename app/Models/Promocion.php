<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;
    public function productos(){
        return $this->hasOne(Producto::class,'id_producto');
    }
    public function tickets(){
        return $this->belongsTo(Ticket::class,'id');
    }
}
