@extends("components.layout")
@section("content")
    @component("components.breadcrumbs", ["breadcrumbs"=>$breadcrumbs])
    @endcomponent
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-secondary text-white text-center">
                        <h1 class="card-title mb-0">Modificar Sucursal</h1>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('/sucursal/' . $sucursal->idSucursal . '/modificar')}}">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $sucursal->nombre }}" autofocus>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="calle">Calle:</label>
                                    <input type="text" name="calle" id="calle" class="form-control" value="{{ $sucursal->calle }}">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="noExterior">Numero Exterior:</label>
                                <input type="text" name="noExterior" id="noExterior" class="form-control" value="{{ $sucursal->noExterior }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                <label for="noInterior">Numero Interior:</label>
                                <input type="text" name="noInterior" id="noInterior" class="form-control" value="{{ $sucursal->noInterior }}" placeholder="(Opcional)">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="colonia">Colonia:</label>
                                    <input type="text" name="colonia" id="colonia" class="form-control" value="{{ $sucursal->colonia }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="cp">CP:</label>
                                    <input type="text" name="cp" id="cp" class="form-control" value="{{ $sucursal->cp }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="noEmpleados">Número de Empleados:</label>
                                    <input type="number" name="noEmpleados" id="noEmpleados" class="form-control" value="{{ $sucursal->noEmpleados }}">
                                </div>
                            <div class="row mb-2"></div>
                            <div class="form-group">
                            <label for="fkIDEntidadBancaria">Entidad Bancaria:</label>
                                <select name="fkIDEntidadBancaria" id="fkIDEntidadBancaria" class="form-control" required>
                                    @foreach($entidad as $entidadBancaria)
                                        <option value="{{ $entidadBancaria->idEntidadBancaria }}" {{ $entidadBancaria->idEntidadBancaria == $sucursal->fkIDEntidadBancaria ? 'selected' : '' }}>{{ $entidadBancaria->nombre }}</option>
                                    @endforeach
                                </select>
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
