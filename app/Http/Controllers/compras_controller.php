<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;




class compras_controller extends Controller
{


    public function dashboard_compras(Request $request)
    {

        $notificaciones =  Models\notifications::all();

        $oc = models\ocompras::latest()->first();
        $ultima = $oc->id;
        $proveedores = models\proveedor::orderBy('nombre', 'ASC')->get();
        $ordenes_compras = models\OCompras::where('estatus', '=', 'REGISTRADA')->get();

        $materiales = DB::table('materiales')
            ->join('orders', 'materiales.ot', '=', 'orders.id')
            ->select('materiales.*', 'orders.salida_produccion')
            ->where('materiales.estatus', '=', 'SOLICITADA')
            ->get();


        return view('modulos.compras.dashboard_compras', compact('ordenes_compras', 'proveedores', 'materiales', 'ultima', 'notificaciones'));
    }

    public function buscador_compras()
    {
        $notificaciones =  Models\notifications::all();
        $materiales = DB::table('materiales')
            ->join('orders', 'materiales.ot', '=', 'orders.id')
            ->select('materiales.*', 'orders.salida_produccion')
            ->get();

        $ocompras =  models\ocompras::all();

        return view('modulos.compras.buscador_compras', compact('materiales', 'notificaciones'));
    }

    public function buscador_material($id)
    {
        $notificaciones =  Models\notifications::all();

        $materiales =  models\materiales::all();

        $materiales_asignados =  Models\materiales::where('oc', '=', $id)->get();

        return view('modulos.compras.buscador_material', compact('ocompras', 'materiales', 'notificaciones'));
    }

    public function alta_oc(Request $request)
    {
        try {
            $alta_oc = new models\ocompras();
            $alta_oc->proveedor = $request->proveedor;
            $alta_oc->usuario_alta = Auth::user()->name;
            $alta_oc->razon = $request->razon;
            $alta_oc->forma_pago = $request->forma_pago;
            $alta_oc->estatus = 'REGISTRADA';
            $alta_oc->save();

            return back()->with('mensaje-success', '¡Alta de OC realizada con éxito!');
        } catch (\Exception $e) {
            return back()->with('mensaje-error', '¡Error al registrar OC, por favor intenta de nuevo!');
        }
    }


    public function material_oc($id)
    {
        $notificaciones =  Models\notifications::all();

        $ocompras = Models\ocompras::findOrFail($id);
        $materiales_asignados =  Models\materiales::where('oc', '=', $id)->get();
        $materiales_pendientes = Models\materiales::where('estatus', '=', 'SOLICITADA')->where('tipo', '=', $ocompras->tipo_oc)->get();

        return view('modulos.compras.dashboard_material', compact('ocompras', 'materiales_asignados', 'materiales_pendientes', 'notificaciones'));
    }

    public function material_proveedor(Request $request)
    {

        try {
            $material =  Models\materiales::where('id', '=', $request->id)->first();
            $material->cantidad_solicitada = $request->cantidad_solicitada;
            $material->descripcion = $request->descripcion;
            $material->save();

            $registro_jets = new models\jets_registros();
            $registro_jets->ot = $material->ot;
            $registro_jets->movimiento = 'COMPRAS - EDICION';
            $registro_jets->responsable = Auth::user()->name;
            $registro_jets->save();

            return back()->with('mensaje-success', '¡Material agregado a la orden de compra con exito!');
        } catch (\Throwable $th) {
            return back()->with('mensaje-error', '¡Error al editar el material, por favor intenta de nuevo!');
        }
    }

    public function edicion_material(Request $request)
    {
        $edicion_material =  Models\materiales::where('id', '=', $request->id)->first();
        $edicion_material->cantidad_solicitada = $request->cantidad;
        $edicion_material->save();
        return back()->with('mensaje-success', '¡Material modificado con exito!');
    }

    public function carga_certificado(Request $request)
    {
        Storage::disk('public')->putFileAs('certificados/' . $request->oc, $request->file('certificado'), $request->oc . '.pdf');

        $ocompras =  Models\ocompras::where('id', '=', $request->oc)->first();
        $ocompras->certificado = 'CARGADO';
        $ocompras->save();

        return back()->with('mensaje-success', '¡Certificado cargado con exito!');
    }


    public function getMateriales($id)
    {
        $materiales_asignados = Models\materiales::where('oc', $id)->get();
        return response()->json($materiales_asignados);
    }

    public function asignaroc_materials(Request $request)
    {
        $material =  Models\materiales::where('id', '=', $request->material_id)->first();
        $material->oc = $request->oc_asignada;
        $material->pu = $request->pu;
        $material->save();
        return back()->with('mensaje-success', '¡Orden de compra asignada con exito!');
    }

    public function oc_pdf($oc_id)
    {
        try {
            $oc = Models\ocompras::where('id', '=', $oc_id)->first();

            if ($oc) {

                $materiales = Models\materiales::where('oc', $oc_id)->get();

                $subtotal = $materiales->sum(function ($material) {
                    return $material->cantidad_solicitada * $material->pu;
                });

                $iva = $subtotal * 0.16;

                $oc->subtotal = $subtotal;
                $oc->iva = $iva;
                $oc->save();

                $proveedor = Models\proveedor::where('nombre', '=', $oc->proveedor)->first();


                $pdf = PDF::loadView('modulos.compras.oc_pdf', compact('oc', 'materiales', 'proveedor'));
                return $pdf->stream($oc_id . '.pdf');
            }
        } catch (\Exception $e) {
            return back()->with('mensaje-error', '¡Error al generar PDF de OC, por favor intenta de nuevo!');
        }
    }


    public function oc_recibida($oc_id, Request $request)
    {

        try {
            $oc = Models\ocompras::where('id', '=', $oc_id)->first();
            $oc->estatus = 'RECIBIDA';
            $oc->factura = $request->numero_factura;
            $oc->fecha_recibida = Carbon::now();
            $oc->req_certificado = $request->has('req_certificado') ? 1 : 0;
            $proveedor = Models\proveedor::where('nombre', '=', $oc->proveedor)->first();
            $oc->fecha_pago = Carbon::now()->addDays($proveedor->termino_pago);
            $oc->save();
            return back()->with('mensaje-success', '¡Orden de compra recibida con exito!');
        } catch (\Exception $e) {
            return back()->with('mensaje-error', '¡Error al registrar entrada de OC, por favor intenta de nuevo!');
        }
    }


    public function factura_recibida($oc_id, Request $request)
    {
        $oc = Models\ocompras::where('id', '=', $oc_id)->first();
        $oc->estatus = 'PAGADA';
        $oc->fecha_pagada = Carbon::now();
        $oc->save();
        return back()->with('mensaje-success', '¡Orden de compra recibida con exito!');
    }


    public function certificado_recibida($oc_id, Request $request)
    {

        try {
            $oc = Models\ocompras::where('id', '=', $oc_id)->first();
            $oc->req_certificado = 2;
            $oc->certificado = $request->certificado;
            $oc->save();
            return back()->with('mensaje-success', '¡Certificado de Orden de compra registrada con exito!');
        } catch (\Exception $e) {
            return back()->with('mensaje-error', '¡Error al registrar certificado de OC, por favor intenta de nuevo!');
        }
    }

    public function dashboard_administrador_compras()
    {
        $notificaciones =  Models\notifications::all();

        // Órdenes por proveedor del mes actual
        $ordersBySupplier = Models\ocompras::select('proveedor', DB::raw('COUNT(*) as total'))
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('proveedor')
            ->get();

        $ordersByStatus = Models\ocompras::select('estatus', DB::raw('COUNT(*) as total'))
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('estatus')
            ->get();

        $ordersBySupplierStatus = Models\ocompras::select(
            'proveedor',
            DB::raw('COUNT(*) as total_asignadas'),
            DB::raw('SUM(CASE WHEN estatus IN ("RECIBIDA", "PAGADA") THEN 1 ELSE 0 END) as total_recibidas'),
            DB::raw('ROUND((SUM(CASE WHEN estatus IN ("RECIBIDA", "PAGADA") THEN 1 ELSE 0 END) / COUNT(*)) * 100, 2) as porcentaje_recibidas'),
            DB::raw('SUM(CASE WHEN req_certificado IN (1, 2) THEN 1 ELSE 0 END) as total_requieren_certificado'),
            DB::raw('SUM(CASE WHEN req_certificado = 2 THEN 1 ELSE 0 END) as total_certificados_registrados')
        )
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('proveedor')
            ->get();




        $certificados = models\OCompras::where('req_certificado', '=', '1')
            ->get();

        $ordenes_compras = models\OCompras::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get();


        $ordenes_pago = models\OCompras::where('estatus', '<>', 'PAGADA')
            ->orderBy('fecha_pago', 'asc') // 'asc' para la más cercana primero
            ->get();
        return view('modulos.compras.dashboard_administrador_compras', compact('certificados', 'ordenes_pago', 'ordenes_compras', 'notificaciones', 'ordersBySupplier', 'ordersByStatus', 'ordersBySupplierStatus'));
    }

    public function buscar_proveedores(Request $request)
    {
        $categoria = $request->input('categoria');

        $proveedores = models\Proveedor::where('categoria', 'LIKE', "%$categoria%")->get();

        return response()->json($proveedores);
    }


    public function precios_material($material_id)
    {
        $material = models\materiales::findOrFail($material_id);

        $comparativas_precios = models\PrecioMaterial::where('material_id', '=', $material_id)->get();


        return view('modulos.compras.dashboard_material_proveedores', compact('material', 'comparativas_precios'));
    }


    public function guardarPrecios(Request $request)
    {


        try {
            foreach ($request->comparativa as $registro) {

                models\PrecioMaterial::updateOrCreate(
                    [
                        'material_id' => $request->material,
                        'proveedor_id' => $registro['proveedor'],
                        'precio_unitario' => $registro['pu']

                    ]
                );
            }

            return back()->with('mensaje-success', '¡Comparativa de material registrado con exito!');
        } catch (\Throwable $th) {
            return back()->with('mensaje-error', '¡Error al registrar comparativa de precios, por favor intenta de nuevo!');
        }


        return response()->json(['message' => 'Precios guardados correctamente'], 200);
    }
}
