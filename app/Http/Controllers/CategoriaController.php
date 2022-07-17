<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;


class CategoriaController extends Controller
{
    public function index()
    {
        $categoria = Categoria::all();
        return $categoria;
    }

    public function crear(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;

        $categoria->save();

        return response([
            'status' => 1,
            'msg' => "Se creo la categoria"
        ]);
    }

    public function actualizar(Request $request, $id)
    {
        if (Categoria::where('id', $id)->exists()) {
            $categoria = Categoria::find($id);

            $categoria->nombre = isset($request->nombre) ? $request->nombre : $categoria->nombre;

            $categoria->save();

            return response([
                'status' => 1,
                'msg' => "Se actualizo la categoria"
            ]);
        } else {
            return response([
                'status' => 0,
                'msg' => "No se encontro la categoria"
            ]);
        }
    }
    public function borrar($id)
    {
        if (Categoria::where('id', $id)->exists()) {
            $categoria = Categoria::where('id', $id);
            $categoria->delete();
            return response([
                'status' => 1,
                'msg' => "Se borro la categoria"
            ]);
        } else {
            return response([
                'status' => 0,
                'msg' => "No se encontro la categoria"
            ]);
        }
    }
}
