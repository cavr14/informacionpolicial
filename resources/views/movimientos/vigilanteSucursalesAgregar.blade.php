@extends('components.layout')
@section('content')
    @component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    @endcomponent

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-secondary text-white text-center">
                        <h1>Agregar nuevo contrato</h1>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('vigilante.sucursales.agregado', $vigilantes->idVigilante) }}">
                            @csrf
                            <div class="form-group">
                                <label for="fkIDSucursal">Sucursal:</label>
                                <select name="fkIDSucursal" id="fkIDSucursal" class="form-control" required>
                                    <!-- Aquí puedes iterar sobre una lista de sucursales si lo deseas -->
                                    @foreach($sucursales as $sucursal)
                                        <option value= "{{ $sucursal->idSucursal }}">{{ $sucursal->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-6">
                                    <label for="fechaInicio">Fecha de Inicio:</label>
                                    <input type="date" name="fechaInicio" id="fechaInicio" class="form-control" required>
                                </div>
                                <div class="form-group mb-3 col-3">
                                    <label for="armado">Armado:</label>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm"  name="armado" id="armado" class="form-control" required>
                                        <option value="1">Sí</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col"></div>
                                <div class="col-auto">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection