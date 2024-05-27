@extends("components.layout")
@section("content")
    @component("components.breadcrumbs",["breadcrumbs"=>$breadcrumbs])
    @endcomponent

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-secondary text-white text-center">
                        <h1 class="card-title mb-0">Caso de {{ $caso->delito->nombre }}</h1>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="fecha" class="form-label">FECHA:</label>
                                <input type="date" id="fecha" class="form-control" value="{{ $caso->fecha_input }}" disabled>
                            </div>
                            <div class="col">
                                <label for="sucursal" class="form-label">SUCURSAL:</label>
                                <input type="text" id="sucursal" class="form-control" value="{{ $caso->sucursal->nombre }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">DESCRIPCION:</label>
                            <textarea id="descripcion" class="form-control" rows="5" readonly>{{ $caso->descripcion }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection