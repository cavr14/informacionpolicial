@extends('components.layout')

@section('content')
    @component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    @endcomponent
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Delito</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resultados as $resultado)
                        <tr>
                            <td>{{ $resultado->delito->id }}</td>
                            <td>{{ $resultado->delito->nombre }}</td>
                            <td>{{ $resultado->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

<style>
    .table th, .table td {
        text-align: left;
        vertical-align: middle;
    }
</style>
<<<<<<< HEAD

=======
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
