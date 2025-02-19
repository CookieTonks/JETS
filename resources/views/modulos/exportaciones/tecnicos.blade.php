<!DOCTYPE html>
<html>
<head>
    <title>Registros Técnicos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            white-space: nowrap; /* Evita el ajuste de texto por defecto */
            overflow: hidden; /* Oculta el exceso de texto */
            text-overflow: ellipsis; /* Muestra puntos suspensivos si hay exceso de texto */
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Registros Técnicos</h1>
    <table>
        <thead>
            <tr>
                <th>FECHA</th>
                <th>TÉCNICO</th>
                <th>MÁQUINA</th>
                <th>OT</th>
                <th>CANT. PIEZAS</th>
                <th>P/U</th>
                <th>TIEMPO TOTAL FABRICACIÓN (MIN) </th>
                <th>COSTO DE TRABAJO</th>
                <th>% TIEMPO DEDICADO X DÍA TURNO 8-6PM 570 MIN</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registros_tecnicos as $registro)
                <tr>
                    <td>{{ $registro->date }}</td>
                    <td>{{ $registro->tecnico }}</td>
                    <td>{{ $registro->maquina }}</td>
                    <td>{{ $registro->ot }}</td>
                    <td>{{ $registro->cant}}</td>
                    <td>${{ number_format($registro->precio_unitario, 2, '.', ',') }}</td>
                    <td>{{ $registro->tiempo ?? 0 }}</td> 
                    <td>${{ number_format($registro->cant * $registro->precio_unitario, 2, '.', ',') }}</td>
                    <td>{{ round((($registro->tiempo ?? 0) / 570) * 100, 2) }}%</td> 
            @endforeach
        </tbody>
    </table>
</body>
</html>
