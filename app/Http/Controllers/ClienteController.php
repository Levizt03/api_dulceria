<?php

namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()    {
        $productos = Cliente::all();
        return $productos;
    }

    public function buscar($nombre)
    {
        return Cliente::where('nombre', $nombre)->get();
    }

    public function crear(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->id_categoria = $request->id_categoria;
        $cliente->precio = $request->precio;

        $cliente->save();

        return response([
            'status' => 1,
            'msg' => "Se creo el cliente"
        ]);
    }
}
