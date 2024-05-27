@extends('components.layout')
@section('content')
    @component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    @endcomponent

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-secondary text-white text-center">
                        <h1>Modificar datos del caso</h1>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('/catalogos/caso/' . $caso->idCaso . '/modificar') }}">
                            @csrf <!-- Sirve para validar que la petición de los datos enviados provengan del formulario actual peticion de un recurso de -->
                            <div class="mb-3">
                                <label for="delito">DELITO:</label>
                                <select name="delito" id="delito" class="form-control" required autofocus>
                                    @foreach($delitos as $delito)
                                        <option value="{{ $delito->idDelito }}" {{ $delito->idDelito == $caso->fkIDDelito ? 'selected' : ''}}>{{ $delito->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">DESCRIPCION:</label>
                                <textarea name="descripcion" id="descripcion" rows="5" class="form-control" maxlength="500" required>{{ $caso->descripcion }}</textarea>
<<<<<<< HEAD
=======
                            <div class="mb-3">
                                <label for="delito">DELITO:</label>
                                <select name="delito" id="delito" class="form-control" required autofocus>
                                    @foreach($delitos as $delito)
                                        <option value="{{ $delito->idDelito }}" {{ $delito->idDelito == $caso->fkIDDelito ? 'selected' : ''}}>{{ $delito->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">DESCRIPCION:</label>
                                <textarea name="descripcion" id="descripcion" rows="5" class="form-control" maxlength="500" required>{{ $caso->descripcion }}</textarea>
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="fecha" class="form-label">FECHA:</label>
                                    <input type="date" id="fecha" class="form-control" value="{{ $caso->fecha_input }}" disabled>
                                </div>
                                <div class="col">
                                    <label for="sucursal">SUCURSAL:</label>
                                    <input type="text" id="sucursal" class="form-control" value="{{ $caso->sucursal->nombre }}" disabled>
                                </div>
                            </div>
                            <div class="col text-end">
                                <button type="submit" class="btn btn-primary mt-3" style="right">Guardar</button>
<<<<<<< HEAD
=======
                            <div class="col text-end">
                                <button type="submit" class="btn btn-primary mt-3" style="right">Guardar</button>
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
