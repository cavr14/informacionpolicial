@extends("components.layout")
@section("content")
@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
@endcomponent

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-secondary text-white text-center">
                    <h1 class="card-title mb-0">Agregar Entidad Bancaria</h1>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('/catalogos/entidadBancaria/agregar') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" maxlength="50" name="nombre" id="nombre" placeholder="Ingrese nombre de la Entidad Bancaria" class="form-control" required autofocus>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="calle">Calle:</label>
                                <input type="text" maxlength="50" name="calle" id="calle" placeholder="Ingrese nombre de la calle" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="num_ext">Numero Ext:</label>
                                <input type="number" maxlength="50" name="num_ext" id="num_ext" placeholder="Ingrese número Exterior" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="num_int">Numero Int:</label>
                                <input type="number" maxlength="50" name="num_int" id="num_int" placeholder="Ingrese número Interior" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="colonia">Colonia:</label>
                                <input type="text" maxlength="50" name="colonia" id="colonia" placeholder="Ingrese la colonia" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="cp">CP:</label>
                                <input type="text" maxlength="50" name="cp" id="cp" placeholder="Ingrese el código postal" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ciudad">Localidad:</label>
                                <input type="text" maxlength="50" name="ciudad" id="ciudad" placeholder="Ingrese la localidad" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="provincia">Municipio:</label>
                                <input type="text" maxlength="50" name="provincia" id="provincia" placeholder="Ingrese el municipio" class="form-control" required>
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

