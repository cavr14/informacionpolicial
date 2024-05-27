@extends("components.layout")
@section("content")
    @component("components.breadcrumbs", ["breadcrumbs"=>$breadcrumbs])
    @endcomponent

    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="display-4 mb-5">Reportes</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title text-center">Información de Entidad Bancaria</h5>
                        <p class="card-text text-center">Accede a información detallada sobre la entidad bancaria.</p>
                        <a href="{{ url("/reportes/infoEntidad") }}" class="btn btn-primary btn-block">Ver Reporte</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title text-center">Casos en el periodo</h5>
                        <p class="card-text text-center">Consulta los casos registrados durante un período específico.</p>
                        <a href="{{ url("/reportes/casosPeriodo") }}" class="btn btn-primary btn-block">Ver Reporte</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title text-center">Delitos por Periodo</h5>
                        <p class="card-text text-center">Consulta los delitos registrados durante un período específico.</p>
                        <a href="{{ url("/reportes/delitosPorPeriodo") }}" class="btn btn-primary btn-block">Ver Reporte</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
