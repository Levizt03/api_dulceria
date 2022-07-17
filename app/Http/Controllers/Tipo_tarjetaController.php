<?php

namespace App\Http\Controllers;

use App\Models\Tipo_tarjeta;
use Illuminate\Http\Request;

class Tipo_tarjetaController extends Controller
{
    public function index()
    {
        $tipo_tarjeta = Tipo_tarjeta::all();
        return $tipo_tarjeta;
    }

    public function crear(Request $request)
    {
        $tipo_tarjeta = new Tipo_tarjeta();
        $tipo_tarjeta->nombre = $request->nombre;

        $tipo_tarjeta->save();

        return response([
            'status' => 1,
            'msg' => "Se creo el Tipo de tarjeta"
        ]);
    }

    public function actualizar(Request $request, $id)
    {
        if (tipo_tarjeta::where('id', $id)->exists()) {
            $tipo_tarjeta = tipo_tarjeta::find($id);

            $tipo_tarjeta->nombre = isset($request->nombre) ? $request->nombre : $tipo_tarjeta->nombre;

            $tipo_tarjeta->save();

            return response([
                'status' => 1,
                'msg' => "Se actualizo el Tipo de tarjeta"
            ]);
        } else {
            return response([
                'status' => 0,
                'msg' => "No se encontro el Tipo de tarjeta"
            ]);
        }
    }
    public function borrar($id)
    {
        if (tipo_tarjeta::where('id', $id)->exists()) {
            $tipo_tarjeta = tipo_tarjeta::where('id', $id);
            $tipo_tarjeta->delete();
            return response([
                'status' => 1,
                'msg' => "Se borro el Tipo de tarjeta"
            ]);
        } else {
            return response([
                'status' => 0,
                'msg' => "No se encontro el Tipo de tarjeta"
            ]);
        }
    }
}
