<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    public function tickets(){
        return $this->hasMany(Ticket::class,'id');
    }
    public function tarjetas(){
        return $this->hasOne(Tarjeta::class,'id_tarjeta');
    }

    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'id_tarjeta',
        'correo',
        'telefono',
        'afiliacion'
    ];
    public $timestamps = false;
}
