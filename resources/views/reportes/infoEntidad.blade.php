@extends('components.layout')
@section('content')
    @component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    @endcomponent
    

    <div class="row my-4">
        <div class="col">
            <h1>Información de Entidad Bancaria</h1>
        </div>
    </div>

    <form class="card p-4 my-4" action="{{url('/reportes/infoEntidad')}}" method="get">
        <div class="row">
            <div class="col form-group">
                <label for="idEntidadBancaria">Entidad Bancaria</label>
                <select name="idEntidadBancaria" id="idEntidadBancaria" class="form-control">
                    @foreach($entidadesBancarias as $entidadBancaria)
                        <option value="{{ $entidadBancaria->idEntidadBancaria }}" {{ $idEntidadBancaria == $entidadBancaria->idEntidadBancaria ? 'selected' : '' }}>
                            {{ $entidadBancaria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary" style="margin-top: 24px;">Filtrar</button>
            </div>
        </div>
    </form>
    @if (isset($sucursales) && $sucursales->isNotEmpty())
        @foreach($sucursales as $sucursal)  
            <div class="row my-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><strong>Sucursal {{ $sucursal->nombre }}</strong></h5>
                        </div>
                        <div class="card-body">
                            <h5 class="mt-3">Vigilantes</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">NOMBRE</th>
                                        <th scope="col">FECHA INICIO</th>
                                        <th scope="col">ARMADO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contratos as $contrato)
                                        @if($contrato->fkIDSucursal == $sucursal->idSucursal)
                                            @php
                                                $vigilante = $vigilantes->where('idVigilante', $contrato->fkIDVigilante)->first();
                                            @endphp
                                            <tr>
                                                <td class="text-center">{{ $vigilante->idVigilante }}</td>
                                                <td class="text-center">{{ $vigilante->nombre }}</td>
                                                <td class="text-center">{{ $contrato->fechaInicio_formatted }}</td>
                                                <td class="text-center">{{ $contrato->armado ? 'Sí' : 'No' }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>  
        @endforeach
        <div class="col-auto titlebar-commands">
            <a class="btn btn-primary" href="{{ route('graficaInfoEntidad', ['idEntidadBancaria' => $idEntidadBancaria]) }}">Ver Grafica</a>
            <a class="btn btn-primary" style="margin-left: 15px;" href="{{ route('infoEntidadPDF', ['idEntidadBancaria' => $idEntidadBancaria]) }}">Descargar</a>
            <a class="btn btn-secondary" style="margin-left: 15px;" href="{{ route('visualizarPDFEntidad', ['idEntidadBancaria' => $idEntidadBancaria]) }}">Visualizar PDF</a>

        </div>
    @endif

@endsection
