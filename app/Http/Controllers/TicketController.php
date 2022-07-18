<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Ticket;
class TicketController extends Controller
{
    public function index()
    {
        $ticket = Ticket::all();
        return $ticket;
    }

    public function crear(Request $request)
    {
        $ticket = new Ticket();
        $ticket->id_empleados = $request->id_empleados;
        $ticket->id_cliente = $request->id_cliente;
        $ticket->id_producto = $request->id_producto;
        $ticket->id_promocion = $request->id_promocion;
        $ticket->total = $request->total;
        $ticket->fecha = Carbon::now();
        $ticket->pelicula = $request->pelicula;
        $ticket->sala = $request->sala;
        $ticket->butaca = $request->butaca;

        $ticket->save();

        return response([
            'status' => 1,
            'msg' => "Se creo el ticket"
        ]);
    }

    public function actualizar(Request $request, $id)
    {
        if (Ticket::where('id', $id)->exists()) {
            $ticket = Ticket::find($id);

            $ticket->id_producto = isset($request->id_producto) ? $request->id_producto : $ticket->id_producto;
            $ticket->fecha = Carbon::now();

            $ticket->save();

            return response([
                'status' => 1,
                'msg' => "Se actualizo el ticket"
            ]);
        } else {
            return response([
                'status' => 0,
                'msg' => "No se encontro el ticket"
            ]);
        }
    }
    public function borrar($id)
    {
        if (Ticket::where('id', $id)->exists()) {
            $ticket = Ticket::where('id', $id);
            $ticket->delete();
            return response([
                'status' => 1,
                'msg' => "Se borro el ticket"
            ]);
        } else {
            return response([
                'status' => 0,
                'msg' => "No se encontro el ticket"
            ]);
        }
    }
}
