@extends('components.layout')
@section('content')
    @component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    @endcomponent

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title text-center">Gráfica de Casos por Periodo</h2>
                    </div>
                    <div class="card-body">
                        <canvas id="graficaCasos" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('graficaCasos').getContext('2d');
        var casosPorMes = {!! $casosPorMes !!}; // Datos de casos por mes

        // Obtener nombres de los meses y años para las etiquetas
        var labels = casosPorMes.map(caso => obtenerNombreMes(caso.month) + ' ' + caso.year);

        var data = casosPorMes.map(caso => caso.cantidad); // Cantidad de casos por mes

        // Definir una paleta de colores personalizada
        var colores = [
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(128, 0, 128, 0.6)', // Púrpura
            'rgba(0, 128, 0, 0.6)',   // Verde
            'rgba(0, 128, 128, 0.6)', // Verde azulado
            'rgba(128, 128, 0, 0.6)', // Amarillo verdoso
            'rgba(128, 0, 0, 0.6)',   // Marrón rojizo
            'rgba(0, 0, 128, 0.6)'    // Azul oscuro
        ];

        var myChart = new Chart(ctx, {
            type: 'pie', // Cambiar el tipo de gráfico a pastel
            data: {
                labels: labels,
                datasets: [{
                    label: 'Casos por Mes',
                    data: data,
                    backgroundColor: colores.slice(0, data.length), // Utilizar los primeros colores según la cantidad de datos
                    borderColor: colores.slice(0, data.length).map(color => color.replace('0.6', '1')), // Ajustar la opacidad para el borde
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        fontColor: 'black'
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });

        // Función para obtener el nombre del mes a partir de su número
        function obtenerNombreMes(numeroMes) {
            var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            return meses[numeroMes - 1];
        }
    </script>
@endsection
