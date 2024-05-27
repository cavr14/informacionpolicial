<!DOCTYPE html>
<html lang="en">
<head>
    <title>Seguridad Total</title>
<<<<<<< HEAD
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
=======
    <title>Seguridad Total</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS (Popper.js y Bootstrap Bundle) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<<<<<<< HEAD
=======

    <!-- Bootstrap JS (Popper.js y Bootstrap Bundle) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
    <style>
        .top-navbar {
            background-color: #1D1D1D;
            padding: 0px 0px;
        }

        .brand-text {
            font-family: "Gill Sans Extrabold", monospace;
            font-weight: bold;
            font-size: 32px;
            color: #fff;
            margin-left: 2px;
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1.2rem;
        }

        .navbar-nav .nav-link:hover {
            background-color: #9CA3AF;

        }
        .nav-link {
            margin-left: 10px;
            color: #ffffff !important;
<<<<<<< HEAD
=======
            margin-left: 10px;
            color: #ffffff !important;
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
        }

        .content {
            padding: 20px;
        }

        .dropdown-menu {
            background-color: #ABB2B9;
            border: none;
        }

        .dropdown-item {
            color: #fff;
        }

        .dropdown-item:hover {
            background-color: #9CA3AF;
        }

        .navbar-nav {
            width: 100%;
            justify-content: flex-end;
        }
        .custom-bg {
            background-color: #666666; /* replace with your custom color */
        }

        .container-fluid .brand-text {
            font-size: 30px;
        }

<<<<<<< HEAD
=======

        .container-fluid .brand-text {
            font-size: 30px;
        }

>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 top-navbar">
                <nav class="navbar navbar-expand-lg navbar-light custom-navbar-bg">
                    <a class="navbar-brand" href="{{ url('catalogos') }}">
                        <img src="{{ asset('images/LOGO_POLICIAL.png') }}" width="50" height="50" class="d-inline-block align-top" alt="">
                        <span class="brand-text">Seguridad Total</span>
<<<<<<< HEAD
=======
                        <span class="brand-text">Seguridad Total</span>
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('catalogos/entidadBancaria') }}">Entidades Bancarias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('catalogos/sucursal') }}">Sucursales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/catalogos/vigilante/') }}">Vigilantes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/catalogos/delitos/') }}">Delitos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/catalogos/contratos/') }}">Contratos</a>
                            </li>
                            <li class="nav-item">
<<<<<<< HEAD
                                <a class="nav-link" href="{{ url('/catalogos/caso/') }}">Casos</a>
                            </li>
                            <li class="nav-item dropdown" style="margin-right: 100px;">
=======
                                <a class="nav-link" href="{{ url('/catalogos/delitos/') }}">Delitos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/catalogos/contratos/') }}">Contratos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/catalogos/caso/') }}">Casos</a>
                            </li>
                            <li class="nav-item dropdown" style="margin-right: 100px;">
                            <li class="nav-item dropdown" style="margin-right: 100px;">
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
                                <a class="nav-link dropdown-toggle text-with" href="#" id="reportesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Reportes
                                </a>
                                <ul class="dropdown-menu custom-bg" aria-labelledby="reportesDropdown">
                                    <li><a class="dropdown-item" href="{{ url('/reportes/infoEntidad') }}">Información de Entidad Bancaria</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/reportes/casosPeriodo') }}">Casos por periodo</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/reportes/contratosSucursal') }}">Historial de contratos de Sucursal</a></li>
<<<<<<< HEAD
                                    <li><a class="dropdown-item" href="{{ url('/reportes/delitosPorPeriodo') }}">Delitos por Sucursal</a></li>
                                    <li><a class="dropdown-item" href="{{ route('reportes.delitos_mas_ocurridos') }}">Delitos más Ocurridos en Sucursal</a></li>

                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('logout') }}" style="margin-right: 10px;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
=======
                                    <li><a class="dropdown-item" href="{{ route('reportes.delitos_mas_ocurridos') }}">Delitos más Ocurridos en Sucursal</a></li>
                                </ul>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('logout') }}" style="margin-right: 10px;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
                                <a class="nav-link" href="{{ url('logout') }}" style="margin-right: 10px;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
>>>>>>> 515d643041c0c1deff8cf41d9c998feec632b747
                                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>