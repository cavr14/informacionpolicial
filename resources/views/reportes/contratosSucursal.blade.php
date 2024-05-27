@extends('components.layout')
@section('content')
    @component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    @endcomponent

    <div class="row my-4">
        <div class="col">
            <h1>Historial de contratos de Sucursal</h1>
        </div>
    </div>

    <form class="card p-4 my-4" action="{{ url('/reportes/contratosSucursal') }}" method="get">
        <div class="row">
            <div class="col form-group">
                <label for="idEntidadBancaria">Entidad Bancaria</label>
                <select name="idEntidadBancaria" id="idEntidadBancaria" class="form-control" onchange="this.form.submit()">
                    <option value="">Seleccione una entidad bancaria</option>
                    @foreach($entidadesBancarias as $entidadBancaria)
                        <option value="{{ $entidadBancaria->idEntidadBancaria }}" {{ $idEntidadBancaria == $entidadBancaria->idEntidadBancaria ? 'selected' : '' }}>
                            {{ $entidadBancaria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            @if ($idEntidadBancaria)
                <div class="col form-group">
                    <label for="idSucursal">Sucursal</label>
                    <select name="idSucursal" id="idSucursal" class="form-control" onchange="this.form.submit()">
                        <option value="">Seleccione una sucursal</option>
                        @foreach($sucursales as $sucursal)
                            <option value="{{ $sucursal->idSucursal }}" {{ $idSucursal == $sucursal->idSucursal ? 'selected' : '' }}>
                                {{ $sucursal->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
    </form>

        @if ($idSucursal)
            <div class="row my-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><strong>Sucursal {{ $sucursales->where('idSucursal', $idSucursal)->first()->nombre }}</strong></h5>
                        </div>
                        <div class="card-body">
                            <h5 class="mt-3">Historial de contratos</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Fecha Inicio</th>
                                        <th scope="col">Fecha Fin</th>
                                        <th scope="col">Armado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contratos as $contrato)
                                        <tr>
                                            <td class="text-center">{{ $vigilantes->where('idVigilante', $contrato->fkIDVigilante)->first()->nombre }}</td>
                                            <td class="text-center">{{ $contrato->fechaInicio_formatted }}</td>
                                            <td class="text-center">{{ $contrato->fechaFin_formatted ?? '-' }}</td>
                                            <td class="text-center">{{ $contrato->armado ? 'Sí' : 'No' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif

@endsection
