<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promocion;


class PromocionController extends Controller
{
    public function index(){
        $promocion = Promocion::all();
        return $promocion;
    }

    public function buscar($nombre)
    {
        return Promocion::where('nombre', $nombre)->get();
    }

    public function crear(Request $request)
    {
        $promocion = new Promocion();
        $promocion->nombre = $request->nombre;
        $promocion->id_producto = $request->id_producto;
        $promocion->descripcion = $request->descripcion;
        $promocion->descuento= $request->descuento;

        $promocion->save();

        return response([
            'status' => 1,
            'msg' => "Se creo la promocion"
        ]);
    }

    public function actualizar(Request $request, $id)
    {
        if (Promocion::where('id', $id)->exists()) {
            $promocion = Promocion::find($id);

            $promocion->nombre = isset($request->nombre) ? $request->nombre : $promocion->nombre;
            $promocion->id_producto = isset($request->id_producto) ? $request->id_producto : $promocion->id_producto;
            $promocion->descripcion = isset($request->descripcion) ? $request->descripcion : $promocion->descripcion;
            $promocion->descuento = isset($request->descuento) ? $request->descuento : $promocion->descuento;

            $promocion->save();

            return response([
                'status' => 1,
                'msg' => "Se actualizo la promocion"
            ]);
        } else {
            return response([
                'status' => 0,
                'msg' => "No se encontro la promocion"
            ]);
        }
    }

    public function borrar($id)
    {
        if (Promocion::where('id', $id)->exists()) {
            $promocion = Promocion::where('id', $id);
            $promocion->delete();
            return response([
                'status' => 1,
                'msg' => "Se borro la promocion"
            ]);
        } else {
            return response([
                'status' => 0,
                'msg' => "No se encntro la promocion"
            ]);
        }
    }
}
