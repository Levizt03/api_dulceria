<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    use HasFactory;
    public function tipo_tarjetas(){
        return $this->belongsTo(Tipo_tarjeta::class,'id_tipo');
    }
}
