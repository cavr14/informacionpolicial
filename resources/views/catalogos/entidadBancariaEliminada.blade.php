<<<<<<< HEAD
@extends('components.layout')
@section('content')
    @component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
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
            }, 4000); // 4000 milisegundos = 4 segundos

            // Configuración de DataTables con traducciones al español
            $('#maintable').DataTable({
                paging: true,        // Habilita la paginación
                searching: true,     // Habilita la búsqueda
                order: [],           // Permite al usuario hacer clic en los encabezados para ordenar
                columnDefs: [
                    { targets: [0, 1, 2, 3, 4, 5, 6, 7, 8], orderable: true } // Habilita la ordenación en las columnas especificadas
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
=======
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
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747

    <div class="row my-4">
        <div class="col">
            <h1>Entidades Bancarias Inactivas</h1>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered text-center" id="maintable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">DOMICILIO</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entidadesInactivas as $entidad)
                    <tr>
                        <td class="text-center">{{$entidad->idEntidadBancaria}}</td>
                        <td class="text-center">{{$entidad->nombre}}</td>
                        <td>{{$entidad->calle}} #{{$entidad->noExterior}}{{$entidad->noInterior ? ' Int ' . $entidad->noInterior : ''}}, {{$entidad->colonia}}, CP {{$entidad->cp}}. {{$entidad->ciudad}}, {{$entidad->provincia}}</td>
                        <td class="text-center">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#activateModal{{$entidad->idEntidadBancaria}}">Activar</button>

                            <!-- Modal -->
                            <div class="modal fade" id="activateModal{{$entidad->idEntidadBancaria}}" tabindex="-1" aria-labelledby="activateModalLabel{{$entidad->idEntidadBancaria}}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="activateModalLabel{{$entidad->idEntidadBancaria}}">Confirmar Activación</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estás seguro de que deseas activar esta Entidad Bancaria?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <a href="{{ url("/catalogos/entidadBancaria/{$entidad->idEntidadBancaria}/activar") }}" class="btn btn-success">Activar</a>
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
@endsection
<<<<<<< HEAD
=======

>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
