@extends('components.layout')
@section('content')
    @component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    @endcomponent

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-secondary text-white text-center">
                        <h1>
                            @php 
                                $vigilante = \App\Models\Vigilante::find($contrato->fkIDVigilante);
                                $sucursal = \App\Models\Sucursal::find($contrato->fkIDSucursal);
                            @endphp
                            Modificar contrato de {{ $vigilante->nombre }}
                        </h1>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('/catalogos/contratos/' . $contrato->idVigilanteSucursal . '/modificar') }}">
                            @csrf <!-- Sirve para validar que la petición de los datos enviados provengan del formulario actual peticion de un recurso de -->
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="idSucursal" class="form-label">SUCURSAL:</label>
                                    <input type="text" id="idSucursal" class="form-control" value="{{ $sucursal->nombre }}" disabled>
                                </div>
                                <div class="col">
                                    <label for="idVigilante" class="form-label">VIGILANTE:</label>
                                    <input type="text" id="idVigilante" class="form-control" value="{{ $vigilante->nombre }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="fechaInicio" class="form-label">FECHA DE CONTRATACIÓN:</label>
                                    <input type="date" id="fechaInicio" class="form-control" value="{{ $contrato->fechaInicio_input }}" disabled>
                                </div>
                                <div class="col">
                                    <label for="armado" class="form-label">ARMADO:</label>
                                    <select name="armado" id="armado" class="form-control" required>
                                    <option value="1" @if($contrato->armado) selected @endif>Sí</option>
                                        <option value="0" @if(!$contrato->armado) selected @endif>No</option>
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