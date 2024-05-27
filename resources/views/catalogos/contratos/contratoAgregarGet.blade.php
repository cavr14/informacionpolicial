@extends("components.layout")
@section("content")
@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
@endcomponent

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-secondary text-white text-center">
                    <h1 class="card-title mb-0">Agregar nuevo contrato</h1>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('/catalogos/contratos/agregar') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label for="idSucursal" class="form-label">SUCURSAL:</label>
                                <select name="idSucursal" id="idSucursal" class="form-control" required>
                                    @foreach($sucursales as $sucursal)
                                        <option value="{{ $sucursal->idSucursal }}">{{ $sucursal->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="idVigilante" class="form-label">VIGILANTE:</label>
                                <select name="idVigilante" id="idVigilante" class="form-control" required>
                                    @foreach($vigilantes as $vigilante)
                                        <option value="{{ $vigilante->idVigilante }}">{{ $vigilante->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="fechaInicio" class="form-label">FECHA DE CONTRATACIÓN:</label>
                                <input type="date" name="fechaInicio" id="fechaInicio" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="armado" class="form-label">ARMADO:</label>
                                <select name="armado" id="armado" class="form-control" required>
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
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
