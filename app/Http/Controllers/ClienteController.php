<?php

namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Carbon;
class ClienteController extends Controller
{
    public function index(){
        $cliente = Cliente::all();
        return $cliente;
    }

    public function buscar($nombre){
        return Cliente::where('nombre', $nombre)->get();
    }

    public function crear(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->dni = $request->dni;
        $cliente->id_tarjeta = $request->id_tarjeta;
        $cliente->correo = $request->correo;
        $cliente->telefono = $request->telefono;
        $cliente->afiliacion = Carbon::now();

        $cliente->save();

        return response([
            'status' => 1,
            'msg' => "Se creo el cliente"
        ]);
    }

    public function actualizar(Request $request, $id)
    {
        if (cliente::where('id', $id)->exists()) {
            $cliente = cliente::find($id);

            $cliente->nombre = isset($request->nombre) ? $request->nombre : $cliente->nombre;
            $cliente->apellido = isset($request->apellido) ? $request->apellido : $cliente->apellido;
            $cliente->dni = isset($request->dni) ? $request->dni : $cliente->dni;
            $cliente->id_tarjeta = isset($request->id_tarjeta) ? $request->id_tarjeta : $cliente->id_tarjeta;
            $cliente->correo = isset($request->correo) ? $request->correo : $cliente->correo;
            $cliente->telefono = isset($request->telefono) ? $request->telefono : $cliente->telefono;

            $cliente->save();

            return response([
                'status' => 1,
                'msg' => "Se actualizo el cliente"
            ]);
        } else {
            return response([
                'status' => 0,
                'msg' => "No se encontro el cliente"
            ]);
        }
    }
    public function borrar($id)
    {
        if (cliente::where('id', $id)->exists()) {
            $cliente = cliente::where('id', $id);
            $cliente->delete();
            return response([
                'status' => 1,
                'msg' => "Se borro el cliente"
            ]);
        } else {
            return response([
                'status' => 0,
                'msg' => "No se encontro el cliente"
            ]);
        }
    }
}
