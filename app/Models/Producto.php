<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    public function categorias(){
        return $this->belongsTo(Categoria::class,'id_categoria');
    }
    public function promocions(){
        return $this->hasOne(Promocion::class,'id');
    }

    public function tickets(){
        return $this->belongsTo(Ticket::class,'id');
    }
}
