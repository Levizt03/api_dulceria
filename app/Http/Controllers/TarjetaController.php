<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarjeta;

class TarjetaController extends Controller
{
    public function crear(Request $request)
    {
        $tarjeta = new Tarjeta();
        $tarjeta->numero = $request->numero;
        $tarjeta->id_tipo = $request->id_tipo;

        $tarjeta->save();

        return response([
            'status' => 1,
            'msg' => "Se creo la tarjeta"
        ]);
    }

    public function actualizar(Request $request, $id)
    {
        if (Tarjeta::where('id', $id)->exists()) {
            $tarjeta = Tarjeta::find($id);

            $tarjeta->numero = isset($request->numero) ? $request->numero : $tarjeta->numero;
            $tarjeta->id_tipo = isset($request->id_tipo) ? $request->id_tipo : $tarjeta->id_tipo;

            $tarjeta->save();

            return response([
                'status' => 1,
                'msg' => "Se actualizo la tarjeta"
            ]);
        } else {
            return response([
                'status' => 0,
                'msg' => "No se encontro la tarjeta"
            ]);
        }
    }

    public function borrar($id)
    {
        if (Tarjeta::where('id', $id)->exists()) {
            $tarjeta = Tarjeta::where('id', $id);
            $tarjeta->delete();
            return response([
                'status' => 1,
                'msg' => "Se borro la tarjeta"
            ]);
        } else {
            return response([
                'status' => 0,
                'msg' => "No se encntro la tarjeta"
            ]);
        }
    }
}
