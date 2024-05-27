<!DOCTYPE html>
<html lang="es">
<head>
    <title>Seguridad Total</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff; /* Color de fondo */
            color: #333333; /* Color del texto */
            display: flex;
            justify-content: center; /* Centrar horizontalmente */
            align-items: center; /* Centrar verticalmente */
            height: 100vh; /* Altura del cuerpo igual a la ventana */
        }
        .header-container {
            background-color: #000000; /* Fondo negro */
            padding: 20px; /* Espacio interior */
            text-align: center;
            margin-bottom: 20px; /* Espacio inferior */
        }
        h1 {
            font-family: 'Roboto', sans-serif;
            color: #ffffff; /* Color del encabezado */
            text-align: center;
            margin-top: 0;
        }
        h2 {
            font-family: 'Roboto', sans-serif;
            color: #000000; /* Color del encabezado */
            text-align: center;
            margin-top: 0;
        }
        h3 {
            color: #000000; /* Color del encabezado */
            text-align: center;
            margin-top: 0;
        }
        h4 {
            color: #000000; /* Color del encabezado */
            margin-top: 0;
        }
        p {
            color: #000000;
            text-align: center;
            margin-top: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 40px;
            background-color: #ffffff;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd; /* Línea de separación entre filas */
        }
        th {
            background-color: #000000; /* Color de fondo del encabezado de la tabla */
            color: #ffffff; /* Color del texto del encabezado de la tabla */
        }
        .black-bar {
            background-color: #000000; /* Color de la barra roja */
            height: 1px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">          
        <div class="header-container">
            <img src="{{ $logoDataUri }}" style="width: 140; height: auto;">
            <h1>Seguridad Total</h1>
        </div>
        <h2>{{ $entidadBancaria->nombre }}</h2>
        @foreach($sucursales as $sucursal)
            <div class="black-bar"></div>    
            <div class="row my-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Sucursal {{ $sucursal->nombre }}</strong></h3>
                        </div>
                        <div class="card-body">
                            <h4 class="mt-3">Vigilantes</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">NOMBRE</th>
                                        <th scope="col">FECHA INICIO</th>
                                        <th scope="col">ARMADO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contratos as $contrato)
                                        @if($contrato->fkIDSucursal == $sucursal->idSucursal)
                                            @php
                                                $vigilante = $vigilantes->where('idVigilante', $contrato->fkIDVigilante)->first();
                                            @endphp
                                            <tr>
                                                <td class="text-center">{{ $vigilante->idVigilante }}</td>
                                                <td class="text-center">{{ $vigilante->nombre }}</td>
                                                <td class="text-center">{{ $contrato->fechaInicio_formatted }}</td>
                                                <td class="text-center">{{ $contrato->armado ? 'Sí' : 'No' }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <p style="text-align: center; color: #000000; margin-top: 20px;">Generado el {{ $fechaActual }}</p>
</body>
</html>
