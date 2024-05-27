@extends('components.layout')
@section('content')
    @component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    @endcomponent

    <h2>Gráfica de Número de Empleados por Sucursal</h2>
    <canvas id="empleadosChart"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('empleadosChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Sucursal 1', 'Sucursal 2'], // Estos valores deben ser dinámicos
                datasets: [{
                    label: 'Número de Empleados',
                    data: [12, 19], // Estos valores deben ser dinámicos
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection