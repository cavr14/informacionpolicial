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

<div class="row my-4">
    <div class="col">
        <h1>Delitos</h1>
    </div>
    <div class="col-auto titlebar-commands">
        <a class="btn btn-primary" href="{{url('/catalogos/delitos/agregar')}}">Agregar</a>
    </div>
</div>

<div class="table-container">
    <table class="table table-striped table-bordered" id="maintable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col" colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($delitos as $delito)
            <tr>
                <td class="text-center">{{ $delito->idDelito }}</td>
                <td>{{ $delito->nombre }}</td>
                <td class="text-center">
                    <a href='{{ url("/catalogos/delitos/{$delito->idDelito}/modificar") }}' class="btn btn-success btn-sm">Modificar</a>
                </td>
                <td class="text-center">
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$delito->idDelito}}">Desactivar</button>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal{{$delito->idDelito}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$delito->idDelito}}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{$delito->idDelito}}">Confirmar Desactivación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que deseas desactivar el delito {{ $delito->nombre }}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="{{ url("/catalogos/delitos/{$delito->idDelito}/desactivar") }}" class="btn btn-danger">Desactivar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="row my-4">
    <div class="col">
        <a class="btn btn-secondary" href="{{ url('/catalogos/delitos/inactivos') }}">Delitos inactivos</a>
    </div>
</div>
@endsection
