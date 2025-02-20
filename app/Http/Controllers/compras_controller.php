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

        $fecha = Carbon::now();

        $alta_oc = new models\ocompras();
        $alta_oc->proveedor = $request->proveedor;
        $alta_oc->usuario_alta = Auth::user()->name;
        $alta_oc->razon = $request->razon;
        $alta_oc->forma_pago = $request->forma_pago;
        $alta_oc->condiciones = $request->condiciones;
        $alta_oc->estatus = 'REGISTRADA';
        $alta_oc->save();


        return back()->with('mensaje-success', '¡Alta de OC realizada con éxito!');
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


        $asignar_oc =  Models\materiales::where('id', '=', $request->id)->first();
        $asignar_oc->cantidad_solicitada = $request->cantidad_solicitada;
        $asignar_oc->proveedor = $request->proveedor;
        $asignar_oc->save();


        return back()->with('mensaje-success', '¡Material agregado a la orden de compra con exito!');
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
        }



        $pdf = PDF::loadView('modulos.compras.oc_pdf', compact('oc', 'materiales'));
        return $pdf->stream($oc_id . '.pdf');
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
            DB::raw('SUM(CASE WHEN estatus = "RECIBIDA" THEN 1 ELSE 0 END) as total_recibidas'),
            DB::raw('ROUND((SUM(CASE WHEN estatus = "RECIBIDA" THEN 1 ELSE 0 END) / COUNT(*)) * 100, 2) as porcentaje_recibidas')
        )
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('proveedor')
            ->get();

        return view('modulos.compras.dashboard_administrador_compras', compact('notificaciones', 'ordersBySupplier', 'ordersByStatus', 'ordersBySupplierStatus'));
    }
}
