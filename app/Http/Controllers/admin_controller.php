<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models;
use App\Models\orders;
use App\Models\registros_maquinas;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class admin_controller extends Controller
{


    public function dashboard_administrador()
    {
        $date = Carbon::now();
        $fecha = $date->format('Y-m-d');
        $notificaciones =  Models\notifications::all();

        $empresas = models\Empresas::all();

        $ordenes_asignadas = models\production::where('tiempo_asignada', 'LIKE', '%' . $fecha . '%')->count();
        $ordenes_finalizadas = models\production::where('tiempo_asignada', 'LIKE', '%' . $fecha . '%')->where('tiempo_final', 'LIKE', '%' . $fecha . '%')->count();
        $ordenes_pendientes = models\production::where('tiempo_asignada', 'LIKE', '%' . $fecha . '%')->where('estatus', '<>', 'Finalizada')->count();
        $maquinas = models\maquinas::where('estatus', '=', 'ACTIVA')->count();



        $datos_ordena = models\production::where('tiempo_asignada', 'LIKE', '%' . $fecha . '%')->get();
        $datos_ordenf = models\production::where('tiempo_asignada', 'LIKE', '%' . $fecha . '%')->where('tiempo_final', 'LIKE', '%' . $fecha . '%')->get();
        $datos_ordenp = models\production::where('tiempo_asignada', 'LIKE', '%' . $fecha . '%')->where('estatus', '<>', 'Finalizada')->get();

        $clientes_ordenes = orders::groupBy('cliente')->select('cliente', DB::raw('count(*) as total'), DB::raw('sum(cantidad) as cantidad_solicitada'), DB::raw('sum(cant_entregada) as cantidad_entregada'))->get();

        $tecnicos = models\production::groupBy('persona_asignada')->select('persona_asignada', DB::raw('count(*) as orden_trabajadas'))->where('estatus', '=', 'Finalizada')->get();
        $datos_maquina = models\maquinas::where('estatus', '=', 'ACTIVA')->get();

        $clientes = models\cliente::all();


        $conteo_clientes = models\cliente::all()->count();
        $conteo_proveedores = models\proveedor::all()->count();
        $conteo_usuarios = models\usuarios::all()->count();
        $conteo_maquinas = models\maquinas::all()->count();

        $ordenes_trabajadas = models\production::where('tiempo_asignada', 'LIKE', '%' . $fecha . '%')->count();

        return view('modulos.administrador.dashboard_administrador', compact('conteo_clientes', 'conteo_proveedores', 'conteo_usuarios', 'conteo_maquinas', 'empresas', 'notificaciones', 'clientes', 'tecnicos', 'datos_maquina', 'fecha', 'datos_ordenf', 'datos_ordena', 'datos_ordenp', 'maquinas', 'ordenes_asignadas', 'ordenes_finalizadas', 'ordenes_pendientes', 'clientes_ordenes'));
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = models\Events::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
        }

        return view('modulos.administrador.fullcalender');
    }
    public function ajax(Request $request)
    {
        switch ($request->type) {
            case 'add':
                $event = models\Events::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'update':
                $event = models\Events::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = models\Events::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                # code...
                break;
        }
    }

    public function alta_cliente(Request $request)
    {
        $cliente = new models\cliente();
        $cliente->empresa = $request->empresa;

        $cliente->cliente = $request->nombre;
        $cliente->save();
        return back()->with('mensaje-success', '¡Nuevo cliente registrado con éxito!');
    }

    public function alta_usuario(Request $request)
    {
        $usuario = new models\usuarios();
        $usuario->cliente = $request->cliente;
        $usuario->name = $request->usuario;
        $usuario->save();
        return back()->with('mensaje-success', '¡Nuevo usuario registrado con éxito!');
    }

    public function alta_proveedor(Request $request)
    {

        $proveedor = new  models\proveedor();
        $proveedor->nombre = $request->nombre;
        $proveedor->termino_pago = $request->termino_pago;
        $proveedor->categoria = $request->categoria;
        $proveedor->calle = $request->calle_numero;
        $proveedor->colonia = $request->colonia;
        $proveedor->municipio = $request->municipio;
        $proveedor->estado = $request->estado;
        $proveedor->telefono = $request->telefono;
        $proveedor->contacto = $request->contacto;
        $proveedor->email = $request->correo;
        $proveedor->entrega =  $request->entrega_domicilio;
        $proveedor->save();

        return back()->with('mensaje-success', '¡Nuevo proveedor registrado con éxito!');
    }

    public function alta_maquina(Request $request)
    {
        $maquina = new models\maquinas();
        $maquina->codigo = $request->codigo;
        $maquina->descripcion = $request->descripcion;
        $maquina->marca = $request->marca;
        $maquina->modelo = $request->modelo;
        $maquina->numero_serie = $request->num_serie;
        $maquina->ano = $request->ano;
        $maquina->save();
        return back()->with('mensaje-success', '¡Nueva maquina registrado con éxito!');
    }
}
