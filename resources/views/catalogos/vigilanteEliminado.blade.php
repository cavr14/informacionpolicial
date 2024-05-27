<<<<<<< HEAD
@extends('components.layout')
@section('content')
@component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
=======
@extends("components.layout")
@section("content")
@component("components.breadcrumbs",["breadcrumbs"=>$breadcrumbs])
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
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
<<<<<<< HEAD
        }, 4000); // 4000 milisegundos = 4 segundos
=======
        }, 3000); // 3000 milisegundos = 3 segundos
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747

        // Configuración de DataTables con traducciones al español
        $('#maintable').DataTable({
            paging: true,        // Habilita la paginación
            searching: true,     // Habilita la búsqueda
            order: [],           // Permite al usuario hacer clic en los encabezados para ordenar
            columnDefs: [
<<<<<<< HEAD
                { targets: [0, 1, 2, 3, 4, 5, 6, 7, 8], orderable: true } // Habilita la ordenación en las columnas especificadas
=======
                { targets: [0, 1, 2, 3], orderable: true } // Habilita la ordenación en las columnas especificadas
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
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
        <h1>Vigilantes Inactivos</h1>
    </div>
</div>

<div class="table-container">
    <table class="table table-striped table-bordered" id="maintable">
        <thead class="thead-dark">
<<<<<<< HEAD
=======
<div class="table-container">
    <table class="table table-striped table-bordered" id="maintable">
        <thead class="thead-dark">
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">EDAD</th>
                <th scope="col">TELÉFONO</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vigilantesInactivos as $vigilantes)
                <tr>
                    <td class="text-center">{{$vigilantes->idVigilante}}</td>
                    <td>{{$vigilantes->nombre}} {{$vigilantes->primerApellido}} {{$vigilantes->segundoApellido}}</td>
                    <td class="text-center">{{$vigilantes->edad}} años</td>
                    <td class="text-center">{{$vigilantes->telefono}}</td>
                    <td class="text-center">
                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#activateModal{{$vigilantes->idVigilante}}">Activar</button>
<<<<<<< HEAD
=======
                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#activateModal{{$vigilantes->idVigilante}}">Activar</button>
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747

                        <!-- Modal -->
                        <div class="modal fade" id="activateModal{{$vigilantes->idVigilante}}" tabindex="-1" aria-labelledby="activateModalLabel{{$vigilantes->idVigilante}}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="activateModalLabel{{$vigilantes->idVigilante}}">Confirmación de Activación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Estás seguro de que deseas reactivar a {{$vigilantes->nombre}}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <a href="{{ url("/catalogos/vigilante/{$vigilantes->idVigilante}/activar") }}" class="btn btn-primary">Activar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
