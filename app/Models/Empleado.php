<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    public function tickets(){
        return $this->hasMany(Ticket::class,'id');
    }

    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
    ];
    public $timestamps = false;
}
