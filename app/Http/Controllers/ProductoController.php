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

    public function crear(Request $request){
        $producto = new Producto();
        $producto -> nombre = $request-> nombre;
        $producto -> id_categoria = $request-> id_categoria;
        $producto -> precio = $request-> precio;

        $producto -> save();

        return response([
            'status' => 1,
            'msg' => "Se creo el producto"
        ]);
    }

    public function actualizar(Request $request, $id){
        if(Producto::where('id',$id)->exists()){
            $producto = Producto::find($id);

            $producto -> nombre = isset($request -> nombre) ? $request->nombre : $producto -> nombre;
            $producto->id_categoria = isset($request->id_categoria) ? $request->id_categoria : $producto->id_categoria;
            $producto->precio = isset($request->precio) ? $request->precio : $producto->precio;

            $producto->save();

            return response([
                'status' => 1,
                'msg' => "Se actualizo el producto"
            ]);
        }else{
            return response([
            'status' => 0,
            'msg' => "No se encontro el producto"
            ]);
        }
    }
    public function borrar($id){
        if (Producto::where('id', $id)->exists()) {
            $producto = Producto::where('id', $id);
            $producto -> delete();
            return response([
                'status' => 1,
                'msg' => "Se borro el producto"
            ]);
        }else{
            return response([
                'status' => 0,
                'msg' => "No se encontro el producto"
            ]);
        }
    }
}
