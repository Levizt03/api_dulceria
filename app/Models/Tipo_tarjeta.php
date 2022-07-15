<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_tarjeta extends Model
{
    use HasFactory;
    public function tarjetas(){
        return $this->hasMany(Tarjeta::class, 'id');
    }
}
