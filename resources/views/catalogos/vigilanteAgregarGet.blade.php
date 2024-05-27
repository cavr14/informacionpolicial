@extends("components.layout")
@section("content")
@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
@endcomponent

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
<<<<<<< HEAD
            <div class="card shadow-lg border-0">
                <div class="card-header bg-secondary text-white text-center">
                    <h1 class="card-title mb-0">Agregar nuevo vigilante</h1>
=======
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-secondary text-white text-center">
                    <h1 class="card-title mb-0">Agregar nuevo vigilante</h1>
                    <h1 class="card-title mb-0">Agregar nuevo vigilante</h1>
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('/catalogos/vigilante/agregar') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">NOMBRE:</label>
<<<<<<< HEAD
=======
                            <label for="nombre" class="form-label">NOMBRE:</label>
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
                            <input type="text" maxlength="50" name="nombre" id="nombre" placeholder="Ingrese el nombre" class="form-control" required autofocus>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="primerApellido">PRIMER APELLIDO:</label>
                                <input type="text" maxlength="50" name="primerApellido" id="primerApellido" placeholder="Ingrese el primer apellido" class="form-control" required autofocus>
                            </div>
                            <div class="col">
                                <label for="segundoApellido">SEGUNDO APELLIDO:</label>
                                <input type="text" maxlength="50" name="segundoApellido" id="segundoApellido" placeholder="Ingrese el segundo apellido" class="form-control" required autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="fechaNacimiento" class="form-label">FECHA DE NACIMIENTO:</label>
                                <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="telefono">TELEFONO:</label>
                                <input type="text" maxlength="10" name="telefono" id="telefono" placeholder="Ingrese el teléfono" class="form-control" required autofocus>
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
