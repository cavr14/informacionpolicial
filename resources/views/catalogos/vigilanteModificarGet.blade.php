@extends('components.layout')
@section('content')
    @component('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    @endcomponent

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-secondary text-white text-center">
                        <h1>Modificar datos de {{ $vigilante->nombre }}</h1>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('/catalogos/vigilante/' . $vigilante->idVigilante . '/modificar') }}">
                            @csrf <!-- Sirve para validar que la petición de los datos enviados provengan del formulario actual peticion de un recurso de -->
                                <div class="form-group">
                                    <label for="nombre">NOMBRE:</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $vigilante->nombre }}" style="margin-bottom: 15px;" autofocus>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="primerApellido">PRIMER APELLIDO:</label>
                                        <input type="text" name="primerApellido" id="primerApellido" class="form-control" value="{{ $vigilante->primerApellido }}">
                                    </div>
                                    <div class="col">
                                        <label for="segundoApellido">SEGUNDO APELLIDO:</label>
                                        <input type="text" name="segundoApellido" id="segundoApellido" class="form-control" value="{{ $vigilante->segundoApellido }}">
                                    </div>
<<<<<<< HEAD
=======
                                <div class="form-group">
                                    <label for="nombre">NOMBRE:</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $vigilante->nombre }}" style="margin-bottom: 15px;" autofocus>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="primerApellido">PRIMER APELLIDO:</label>
                                        <input type="text" name="primerApellido" id="primerApellido" class="form-control" value="{{ $vigilante->primerApellido }}">
                                    </div>
                                    <div class="col">
                                        <label for="segundoApellido">SEGUNDO APELLIDO:</label>
                                        <input type="text" name="segundoApellido" id="segundoApellido" class="form-control" value="{{ $vigilante->segundoApellido }}">
                                    </div>
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="fechaNacimiento">FECHA DE NACIMIENTO:</label>
                                        <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" value="{{ $vigilante->fechaNacimiento_Formatted }}">
                                    </div>
                                    <div class="col">
                                        <label for="telefono">TELEFONO:</label>
                                        <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $vigilante->telefono }}">
                                    </div>
                                </div>
                                <script>
                                    var selectactivo = document.getElementById("estado");
                                    selectactivo.value = "{{ $vigilante->estado }}";
                                </script>  
                            <div class="col text-end">
                                <button type="submit" class="btn btn-primary mt-3" style="right">Guardar</button>
<<<<<<< HEAD
=======
                                </script>  
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