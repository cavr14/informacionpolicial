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
    <script>
        $(document).ready(function(){
            // Espera 3 segundos y luego oculta el mensaje de éxito
            setTimeout(function(){
                $('#success-message').fadeOut('slow');
            }, 4000); // 3000 milisegundos = 3 segundos
        });
    </script>

    <div class="row">
        <div class="form-group my-3">
            <h1>Historial de Sucursales de {{ $vigilante->nombre }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SUCURSAL</th>
                        <th scope="col">ARMADO</th>
                        <th scope="col">FECHA DE INICIO</th>
                        <th scope="col">FECHA DE FIN</th>
                        <th scope="col">ESTADO DEL CONTRATO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sucursales as $sucursal)
                        @php
                            $nombreSucursal = $infoSucursales->where('idSucursal', $sucursal->fkIDSucursal)->first()->nombre;
                        @endphp
                        <tr>
                            <td class="text-center">{{ $nombreSucursal }}</td>
                            <td class="text-center">{{ $sucursal->armado ? 'Sí' : 'No' }}</td>
                            <td class="text-center">{{ $sucursal->fechaInicio_formatted }}</td>
                            <td class="text-center">{{ $sucursal->fechaFin_formatted ?? '-'}}</td>
                            <td class="text-center">
                                @if($sucursal->fechaFin)
                                    Contrato finalizado
                                @else
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#finalizeContractModal{{$sucursal->idVigilanteSucursal}}">Finalizar contrato</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="finalizeContractModal{{$sucursal->idVigilanteSucursal}}" tabindex="-1" aria-labelledby="finalizeContractModalLabel{{$sucursal->idVigilanteSucursal}}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="finalizeContractModalLabel{{$sucursal->idVigilanteSucursal}}">Confirmar Finalización</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Estás seguro de que deseas finalizar el contrato?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <a href="{{ url("/movimientos/vigilante/{$sucursal->idVigilanteSucursal}/sucursales/fechaFin") }}" class="btn btn-primary">Finalizar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>   
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <a href="{{ route('vigilante.sucursales.agregar', ['id' => $vigilante->idVigilante]) }}" class="btn btn-primary">Nuevo contrato</a>
        </div>
    </div>
@endsection