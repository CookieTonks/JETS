<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrativo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Dashboard Administrativo</h2>
        <div class="row">
            <div class="col-md-6">
                <canvas id="ordenesProveedorChart"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="estatusMaterialChart"></canvas>
            </div>
        </div>
        <table id="dataTable" class="display mt-4" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Proveedor</th>
                    <th>Estatus</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Proveedor A</td>
                    <td>Pendiente</td>
                    <td>2024-06-01</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Proveedor B</td>
                    <td>Asignado</td>
                    <td>2024-06-05</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Proveedor A</td>
                    <td>Entregado</td>
                    <td>2024-07-10</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Proveedor C</td>
                    <td>Pendiente</td>
                    <td>2024-07-15</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        const ordenesPorProveedor = {
            "Proveedor A": 2,
            "Proveedor B": 1,
            "Proveedor C": 1
        };

        const ctx1 = document.getElementById('ordenesProveedorChart').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: Object.keys(ordenesPorProveedor),
                datasets: [{
                    label: 'Órdenes por Proveedor',
                    data: Object.values(ordenesPorProveedor),
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
                }]
            }
        });

        const estatusPorMes = {
            '2024-06': { 'Pendiente': 1, 'Asignado': 1, 'Entregado': 0 },
            '2024-07': { 'Pendiente': 1, 'Asignado': 0, 'Entregado': 1 }
        };

        const meses = Object.keys(estatusPorMes);
        const ctx2 = document.getElementById('estatusMaterialChart').getContext('2d');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: meses,
                datasets: [
                    {
                        label: 'Pendiente',
                        data: meses.map(m => estatusPorMes[m]['Pendiente'] || 0),
                        backgroundColor: '#FF6384'
                    },
                    {
                        label: 'Asignado',
                        data: meses.map(m => estatusPorMes[m]['Asignado'] || 0),
                        backgroundColor: '#36A2EB'
                    },
                    {
                        label: 'Entregado',
                        data: meses.map(m => estatusPorMes[m]['Entregado'] || 0),
                        backgroundColor: '#FFCE56'
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</body>
</html>
