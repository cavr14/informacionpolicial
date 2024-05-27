@extends("components.layout")
@section("content")
    @component("components.breadcrumbs", ["breadcrumbs"=>$breadcrumbs])
    @endcomponent
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-secondary text-white text-center">
                        <h1 class="card-title mb-0">Modificar Entidad Bancaria</h1>
                    </div>
                    <div class="card-body">
                    <form method="post" action="{{ url('/catalogos/entidadBancaria/' . $entidadBancaria->idEntidadBancaria . '/modificar') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $entidadBancaria->nombre }}" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="calle">Calle:</label>
                                <input type="text" name="calle" id="calle" class="form-control" value="{{ $entidadBancaria->calle }}" >
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="noExterior">Número Exterior:</label>
                                    <input type="text" name="noExterior" id="noExterior" class="form-control" value="{{ $entidadBancaria->noExterior }}" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="noInterior">Número Interior:</label>
                                    <input type="text" name="noInterior" id="noInterior" class="form-control" value="{{ $entidadBancaria->noInterior }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="colonia">Colonia:</label>
                                <input type="text" name="colonia" id="colonia" class="form-control" value="{{ $entidadBancaria->colonia }}">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="cp">Código Postal:</label>
                                    <input type="text" name="cp" id="cp" class="form-control" value="{{ $entidadBancaria->cp }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ciudad">Localidad:</label>
                                    <input type="text" name="ciudad" id="ciudad" class="form-control" value="{{ $entidadBancaria->ciudad }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="provincia">Municipio:</label>
                                <input type="text" name="provincia" id="provincia" class="form-control" value="{{ $entidadBancaria->provincia }}">
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
