<<<<<<< HEAD
@extends("components.layout")
@section("content")
@component("components.breadcrumbs",["breadcrumbs"=>$breadcrumbs])
@endcomponent

@if(session('success'))
    <div id="success-message" class="alert alert-success">
        {{ session('success') }}
    </div>
    <?php session()->forget('success'); ?>
@endif

=======
@extends('components.layout')
@section('content')
@component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
@endcomponent

>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script>
    $(document).ready(function(){
        // Espera 3 segundos y luego oculta el mensaje de éxito
        setTimeout(function(){
            $('#success-message').fadeOut('slow');
        }, 3000); // 3000 milisegundos = 3 segundos

        // Configuración de DataTables con traducciones al español
        $('#maintable').DataTable({
            paging: true,        // Habilita la paginación
            searching: true,     // Habilita la búsqueda
            order: [],           // Permite al usuario hacer clic en los encabezados para ordenar
            columnDefs: [
                { targets: [0, 1, 2, 3], orderable: true } // Habilita la ordenación en las columnas especificadas
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron registros coincidentes",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": activar para ordenar la columna ascendente",
                    "sortDescending": ": activar para ordenar la columna descendente"
                }
            }
        });
    });
</script>

<style>
    .navbar-nav .nav-link {
        color: white !important; /* Cambia el color del texto del navbar a blanco */
    }

    .btn-sm {
        margin-right: 5px; /* Añade un margen a la derecha de cada botón pequeño */
    }
    .action-buttons {
        display: flex;
        justify-content: space-around; /* Alinea los botones con espacio alrededor */
        align-items: center; /* Centra los botones verticalmente en su celda */
        padding: 5px; /* Añade algo de espacio dentro de cada celda para los botones */
    }
    .action-buttons a {
        margin: 0 5px; /* Espacio horizontal entre botones */
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05); /* Color de fondo para filas impares */
    }
    .dataTables_wrapper .dataTables_filter {
        float: right;
        text-align: right;
    }
    .dataTables_wrapper .dataTables_paginate {
        float: right;
        text-align: right;
    }
    .dataTables_wrapper .dataTables_info {
        float: left;
    }
</style>
<<<<<<< HEAD
=======

>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
    <div class="container">
        <h1>Delitos más Ocurridos en Sucursal</h1>
        <form action="{{ route('reportes.delitos_mas_ocurridos.resultados') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="sucursal_id">Sucursal:</label>
                <select name="sucursal_id" id="sucursal_id" class="form-control" required>
                    <option value="">Seleccione una sucursal</option>
                    @foreach($sucursales as $sucursalOption)
                        <option value="{{ $sucursalOption->idSucursal }}" {{ isset($sucursal) && $sucursal->idSucursal == $sucursalOption->idSucursal ? 'selected' : '' }}>
                            {{ $sucursalOption->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Ver</button>
        </form>

        @if(isset($resultados))
            <h2 class="mt-5">Resultados para la Sucursal: {{ $sucursal->nombre }}</h2>
            <table class="table table-striped table-bordered" id="maintable">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="3">ENTIDAD BANCARIA: {{ $entidadBancaria->nombre }}</th>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Delito</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resultados as $resultado)
                        <tr>
                            <td>{{ $resultado->delito->idDelito }}</td>
                            <td>{{ $resultado->delito->nombre }}</td>
                            <td>{{ $resultado->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
<<<<<<< HEAD
@endsection
=======
@endsection


>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
