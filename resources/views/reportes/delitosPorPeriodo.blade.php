@extends('components.layout')
@section('content')
@component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
@endcomponent

<div class="row my-4">
    <div class="col">
        <h1>Delitos en el periodo:</h1>
    </div>
</div>

<form class="card p-4 my-4" action="{{url('/reportes/delitosPorPeriodo')}}" method="post">
    @csrf
    <div class="row">
        <div class="col form-group">
            <label for="txtfechaInicio">Fecha inicio</label>
            <input class="form-control" type="date" name="fechaInicio" id="txtfechaInicio" value="{{$fechaInicio ?? ''}}">
        </div>
        <div class="col form-group">
            <label for="txtfechaFin">Fecha fin</label>
            <input class="form-control" type="date" name="fechaFin" id="txtfechaFin" value="{{$fechaFin ?? ''}}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary" style="margin-top: 24px;">Filtrar</button>
        </div>
    </div>
</form>

@if (isset($delitos) && $delitos->isNotEmpty())
<table class="table" id="tablaDelitos">
    <thead>
        <tr>
            <th scope="col">Delito</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($delitos as $delito)
            <tr>
                <td class="text-center">{{ $delito->nombre }}</td>
                <td class="text-center">{{ $delito->total }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="col-auto titlebar-commands">
    <a class="btn btn-primary" style="margin-left: 15px;" href="{{ route('delitosPorPeriodoPDF', ['fechaInicio'=> $fechaInicio, 'fechaFin' => $fechaFin]) }}">Descargar</a>
    <a class="btn btn-secondary" style="margin-left: 15px;" href="{{ route('visualizarPdfDelitos', ['fechaInicio'=> $fechaInicio, 'fechaFin' => $fechaFin]) }}">Visualizar PDF</a>

</div>
@endif

@endsection
