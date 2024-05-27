@extends("components.layout")
@section("content")
@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
@endcomponent

@if(session('success'))
    <div id="success-message" class="alert alert-success">
        {{ session('success') }}
    </div>
    <?php session()->forget('success'); ?>
@endif
<<<<<<< HEAD

=======
@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
@endcomponent

@if(session('success'))
    <div id="success-message" class="alert alert-success">
        {{ session('success') }}
    </div>
    <?php session()->forget('success'); ?>
@endif

>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script>
    $(document).ready(function(){
        setTimeout(function(){
            $('#success-message').fadeOut('slow');
        }, 4000);

        // Configuración de DataTables con traducciones al español
        $('#maintable').DataTable({
            paging: true,
            searching: true,
            order: [],
            columnDefs: [
                { targets: [0, 1, 2, 3, 4, 5, 6], orderable: true }
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

    function confirmDeactivate(id) {
        $('#deactivateModal' + id).modal('show');
    }
</script>
<<<<<<< HEAD
=======
    function confirmDeactivate(id) {
        $('#deactivateModal' + id).modal('show');
    }
</script>
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747

<style>
    .navbar-nav .nav-link {
        color: white !important;
    }

    .btn-sm {
        margin-right: 5px;
    }

    .action-buttons {
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 5px;
    }

    .action-buttons a {
        margin: 0 5px;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
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
        <h1>Vigilantes</h1>
    </div>
    <div class="col-auto titlebar-commands">
        <a class="btn btn-primary" href="{{url('/catalogos/vigilante/agregar')}}">Agregar</a>
    </div>
</div>
<<<<<<< HEAD
=======
<style>
    .navbar-nav .nav-link {
        color: white !important;
    }

    .btn-sm {
        margin-right: 5px;
    }

    .action-buttons {
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 5px;
    }

    .action-buttons a {
        margin: 0 5px;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
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
        <h1>Vigilantes</h1>
    </div>
    <div class="col-auto titlebar-commands">
        <a class="btn btn-primary" href="{{url('/catalogos/vigilante/agregar')}}">Agregar</a>
    </div>
</div>
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747

<div class="table-container">
    <table class="table table-striped table-bordered" id="maintable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">EDAD</th>
                <th scope="col">TELÉFONO</th>
                <th scope="col" colspan="3">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vigilante as $vigilantes)
            <tr>
                <td class="text-center">{{$vigilantes->idVigilante}}</td>
                <td>{{$vigilantes->nombre}} {{$vigilantes->primerApellido}} {{$vigilantes->segundoApellido}}</td>
                <td class="text-center">{{$vigilantes->edad}} años</td>
                <td class="text-center">{{$vigilantes->telefono}}</td>
                <td class="text-center"><a href='{{ url("/movimientos/vigilante/{$vigilantes->idVigilante}/sucursales") }}' class="btn btn-info btn-sm">Contratos</a></td>
                <td class="text-center"><a href='{{ url("/catalogos/vigilante/{$vigilantes->idVigilante}/modificar") }}' class="btn btn-success btn-sm">Modificar</a></td>
                <td class="text-center">
                    <button class="btn btn-danger btn-sm" onclick="confirmDeactivate({{ $vigilantes->idVigilante }})">Desactivar</button>
                    <!-- Modal -->
                    <div class="modal fade" id="deactivateModal{{ $vigilantes->idVigilante }}" tabindex="-1" aria-labelledby="deactivateModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deactivateModalLabel">Confirmar Desactivación</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que deseas desactivar a este vigilante?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="{{ url("/catalogos/vigilante/{$vigilantes->idVigilante}/eliminar") }}" class="btn btn-danger">Desactivar</a>
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
        <a class="btn btn-secondary" href="{{ url('/catalogos/vigilante/eliminado') }}">Vigilantes inactivos</a>
    </div>
</div>
@endsection
