@extends("components.layout")
@section("content")
@component("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs])
@endcomponent

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-secondary text-white text-center">
                    <h1 class="card-title mb-0">Modificar delito</h1>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('/catalogos/delitos/' . $delito->idDelito . '/modificar') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label for="nombre" class="form-label">NOMBRE:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $delito->nombre }}" autofocus>
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
