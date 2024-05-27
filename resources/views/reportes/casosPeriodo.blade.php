

@extends('components.layout')
@section('content')
@component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
@endcomponent

    <div class="row my-4">
        <div class="col">
            <h1>Casos por periodo</h1>
        </div>
    </div>

    <form class="card p-4 my-4" action="{{url('/reportes/casosPeriodo')}}" method="get">
        <div class="row">
            <div class="col form-group">
                <label for="txtfecha">Fecha inicio</label>
                <input class="form-control" type="date" name="fechaInicio" id="txtfecha" value="{{$fechaInicio??0}}">
            </div>
            <div class="col form-group">
                <label for="txtfecha">Fecha fin</label>
                <input class="form-control" type="date" name="fechaFin" id="txtfecha" value="{{$fechaFin??0}}">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary" style="margin-top: 24px;">Filtrar</button>
            </div>
        </div>
    </form>

    @if (isset($casos) && $casos->isNotEmpty())
    <table class="table" id="tablaVentas">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">DELITO</th>
                <th scope="col">FECHA</th>
                <th scope="col">SUCURSAL</th>
            </tr>
        </thead>
        <tbody>
            @foreach($casos as $caso)
                    <tr>
                        <td class="text-center">{{$caso->idCaso}}</td>
                        <td class="text-center">{{$caso->delito->nombre}}</td>
                        <td class="text-center">{{$caso->fecha_formatted}}</td>
                        <td class="text-center">{{$caso->sucursal->nombre}}</td>
                    </tr>   
            @endforeach
        </tbody>     
    </table>

    <!-- Agregar un botón para ver la gráfica de barras -->
    <div class="col-auto titlebar-commands">
        <a class="btn btn-primary" href="{{ route('grafica-casos-periodo', ['fechaInicio' => $fechaInicio, 'fechaFin' => $fechaFin]) }}">Ver Gráfica</a>
        <a class="btn btn-primary" style="margin-left: 15px;" href="{{ route('casosPeriodoPDF', ['fechaInicio'=> $fechaInicio, 'fechaFin' => $fechaFin]) }}">Descargar</a>
        <a class="btn btn-secondary" style="margin-left: 15px;" href="{{ route('visualizarPDF', ['fechaInicio'=> $fechaInicio, 'fechaFin' => $fechaFin]) }}">Visualizar PDF</a>

    </div>

    @endif

@endsection
