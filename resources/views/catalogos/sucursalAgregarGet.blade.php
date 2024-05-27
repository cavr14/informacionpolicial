@extends("components.layout")
@section("content")
    @component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
    @endcomponent
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-secondary text-white text-center">
                        <h1 class="card-title mb-0">Agregar Sucursal</h1>
                    </div>
                    <div class="card-body">
                    <form method="post" action="{{ url('/catalogos/sucursal/agregar') }}"> <!--crea un formulario que enviará datos al servidor mediante http-->
                        @csrf <!-- Sirve para validar que la petición de los datos enviados provengan del formulario actual - petición de un recurso de un sitio cruzado -->
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" maxlength="50" name="nombre" id="nombre" placeholder="Ingrese el nombre" class="form-control" required autofocus>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="calle">Calle:</label>
                                    <input type="text" maxlength="50" name="calle" id="calle" placeholder="Ingrese nombre de la calle" class="form-control" required autofocus>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="num_ext">Numero Ext:</label>
                                    <input type="number" maxlength="50" name="noExt" id="noExt" placeholder="Ingrese número Exterior" class="form-control" required autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="noInt">Numero Int:</label>
                                    <input type="number" maxlength="50" name="noInt" id="noInt" placeholder="Ingrese número Interior" class="form-control" autofocus>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="colonia">Colonia:</label>
                                    <input type="text" maxlength="50" name="colonia" id="colonia" placeholder="Ingrese la colonia" class="form-control" required autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="cp">CP:</label>
                                    <input type="text" maxlength="50" name="cp" id="cp" placeholder="Ingrese el código postal" class="form-control" required autofocus>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ciudad">Localidad:</label>
                                    <input type="text" maxlength="50" name="ciudad" id="ciudad" placeholder="Ingrese la localidad" class="form-control" required autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="provincia">Municipio:</label>
                                    <input type="text" maxLength="50" name="provincia" id="provincia" placeholder="Ingrese el municipio" class="form-control" required autofocus>
                                </div>   
                                <div class="form-group col-md-6">
                                    <label for="noEmpleados">Número de Empleados:</label>
                                    <input type="number" maxLength="50" name="noEmpleados" id="noEmpleados" placeholder="Ingrese númeor de empleados" class="form-control" required autofocus>
                                </div>
                                <div> 
                                        <div class="form-group mb-3 col-6">
                                            <label for="entidad">Entidad Bancaria:</label>
                                            <select name="entidad" id="entidad" class="form-control" required>
                                                @foreach($entidad as $entidadBancaria)
                                                    <option value="{{ $entidadBancaria->idEntidadBancaria }}">{{ $entidadBancaria->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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
@endsection
