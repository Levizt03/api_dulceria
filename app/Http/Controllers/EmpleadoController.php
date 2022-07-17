<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleado = Empleado::all();
        return $empleado;
    }

    public function buscar($nombre)
    {
        return Empleado::where('nombre', $nombre)->get();
    }

    public function crear(Request $request)
    {
        $empleado = new Empleado();
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->dni = $request->dni;

        $empleado->save();

        return response([
            'status' => 1,
            'msg' => "Se creo el empleado"
        ]);
    }

    public function actualizar(Request $request, $id)
    {
        if (Empleado::where('id', $id)->exists()) {
            $empleado = Empleado::find($id);

            $empleado->nombre = isset($request->nombre) ? $request->nombre : $empleado->nombre;
            $empleado->apellido = isset($request->apellido) ? $request->apellido : $empleado->apellido;
            $empleado->dni = isset($request->dni) ? $request->dni : $empleado->dni;

            $empleado->save();

            return response([
                'status' => 1,
                'msg' => "Se actualizo el empleado"
            ]);
        } else {
            return response([
                'status' => 0,
                'msg' => "No se encontro el empleado"
            ]);
        }
    }
    public function borrar($id)
    {
        if (Empleado::where('id', $id)->exists()) {
            $empleado = Empleado::where('id', $id);
            $empleado->delete();
            return response([
                'status' => 1,
                'msg' => "Se borro el empleado"
            ]);
        } else {
            return response([
                'status' => 0,
                'msg' => "No se encontro el empleado"
            ]);
        }
    }
}
