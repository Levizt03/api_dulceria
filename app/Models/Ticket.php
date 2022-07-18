<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public function empleados(){
        return $this->belongsTo(Empleados::class,'id_empleado');
    }
    public function clientes(){
        return $this->belongsTo(Cliente::class,'id_cliente');
    }
    public function productos(){
        return $this->hasMany(Producto::class,'id_producto');
    }
    public function promocions(){
        return $this->hasMany(Promocion::class,'id_promocion');
    }

    protected $fillable = [
        'id_empleados',
        'id_cliente',
        'id_producto',
        'id_promocion',
        'total',
        'fecha',
        'pelicula',
        'sala',
        'butaca'
    ];

    public $timestamps = false;
}
