@extends("components.layout")
@section("content")
@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
@endcomponent

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-secondary text-white text-center">
                    <h1 class="card-title mb-0">Agregar Caso</h1>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('/catalogos/caso/agregar') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="delito" class="form-label">DELITO:</label>
                            <select name="delito" id="delito" class="form-control" required autofocus>
                                @foreach($delitos as $delito)
                                    <option value="{{ $delito->idDelito }}">{{ $delito->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">DESCRIPCION:</label>
                            <textarea name="descripcion" id="descripcion" rows="5" placeholder="Ingrese la descripción del caso" class="form-control" maxlength="500" required></textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="fecha" class="form-label">FECHA:</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="sucursal" class="form-label">SUCURSAL:</label>
                                <select name="sucursal" id="sucursal" class="form-control" required>
                                    @foreach($sucursales as $sucursal)
                                        <option value="{{ $sucursal->idSucursal }}">{{ $sucursal->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col text-end">
                            <button type="submit" class="btn btn-primary mt-3" style="right">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
