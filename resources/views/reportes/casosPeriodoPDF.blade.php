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
            color: #ffffff; /* Color del encabezado */
            text-align: center;
            margin-top: 0;
        }
        h2 {
            color: #000000; /* Color del encabezado */
            text-align: center;
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
            <img src="{{ $logoDataUri }}" width="140px" height="auto">
            <h1>Seguridad Total</h1>
        </div>
        <h2>Reporte de Casos en el Periodo</h2>
        <p>de {{ $fechaInicio }} a {{ $fechaFin }}</p>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>DELITO</th>
                    <th>FECHA</th>
                    <th>SUCURSAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($casos as $caso)
                    <tr>
                        <td>{{ $caso->idCaso }}</td>
                        <td>{{ $caso->delito->nombre }}</td>
                        <td>{{ $caso->fecha_formatted }}</td>
                        <td>{{ $caso->sucursal->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <p style="text-align: center; color: #000000; margin-top: 20px;">Generado en {{ $fechaActual }}</p>
</body>
</html>