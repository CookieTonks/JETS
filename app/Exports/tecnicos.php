<?php

namespace App\Exports;

use App\Models\registros_tecnicos;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;

class tecnicos implements FromView, WithTitle, ShouldAutoSize
{
    protected $fecha_inicio;
    protected $fecha_final;

    public function __construct($fecha_inicio, $fecha_final)
    {
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_final = $fecha_final;
    }

    public function view(): View
    {
        $registros_tecnicos = DB::table('registros_tecnicos')
            ->join('orders', 'registros_tecnicos.ot', '=', 'orders.id')
            ->join('users', 'registros_tecnicos.tecnico', '=', 'users.id')
            ->select(
                'registros_tecnicos.*',
                'orders.monto as precio_unitario',
                'orders.cantidad as cant',
                'users.name as tecnico'
            )
            ->whereBetween('registros_tecnicos.date', [$this->fecha_inicio, $this->fecha_final])
            ->get();
            

        return view('modulos.exportaciones.tecnicos', [
            'registros_tecnicos' => $registros_tecnicos
        ]);
    }

    public function title(): string
    {
        return 'TECNICOS';
    }
}
