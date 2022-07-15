<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(){
        $productos = Producto::all();
        return $productos;
    }

    public function buscar($nombre){
        return Producto::where('nombre', $nombre)->get();
    }
}
