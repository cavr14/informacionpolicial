<!DOCTYPE html>
<html lang="es">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<<<<<<< HEAD
=======
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
    <!-- Importar las librerías de Bootstrap -->
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css') }}" />
    <!-- Importar los archivos JavaScript de Bootstrap -->
    <script src="{{ URL::asset('bootstrap/bootstrap-5.3.2-dist/js/bootstrap.min.js') }}"></script>
    <!-- Importar librerías de estilos y JavaScript de DataTables para manipular tablas -->
    <link href="{{ URL::asset('DataTables/datatables.min.css') }}" rel="stylesheet"/>
    <script src="{{ URL::asset('DataTables/datatables.min.js') }}"></script>
    <!-- Estilos personalizados -->
    <link href="{{ URL::asset('assets/style.css') }}" rel="stylesheet" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="/js/chartjs.line_chart.js"></script>
    <!-- Añade esto en la sección <head> de tu layout principal -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


    
    <title>Seguridad Total</title>
</head>
<body>
    <!-- Barra lateral -->
    @component("components.sidebar")
    @endcomponent

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Contenido principal -->
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-10 offset-lg-1">
                @yield("content")
            </div>
        </div>
    </div>
</body>
</html>
