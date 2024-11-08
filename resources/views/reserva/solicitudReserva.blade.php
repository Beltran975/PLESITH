<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Postulación Reserva</title>
</head>
<style>
    body {
        display: flex;
        align-items: center;
        font-family: 'Arial', sans-serif;
    }

    h1 {
        color: white;
        font-family: 'Arial', sans-serif;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }


    .title {
        color: white;
        font-size: xx-large;
        background-color: grey;
        height: 50px;
    }

    .title p {
        margin-left: 5%;
    }

    th,
    td {
        border: none;
        padding: 8px;
        text-align: left;
    }

 .contenido-produccion  td{
    border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
 }

 .contenido-produccion th{
    border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
 }
</style>

<body>
    <!--Sección información personal..................................-->    
    <div class="title">
        <p>Datos del solicitante</p>
    </div>
    <table class="table">
        <tbody>
            <tr>
                <th>Nombre</th>
                <td>{{ Auth::user()->name }}</td>
            </tr>
            <tr>
                <th class="rotated-header">Correo</th>
                <td>{{ Auth::user()->email }}</td>
            </tr>
            <tr>
                <th class="rotated-header">CURP</th>
                <td>{{ Auth::user()->curp }}</td>
            </tr>
            <tr>
                <th class="rotated-header">Institución a la que pertenece</th>
                <td>{{ Auth::user()-> institucion}}</td>
            </tr>
            <tr>
                <th class="rotated-header">Programa educativo</th>
                <td>{{ Auth::user()-> programa}}</td>

            </tr>
        </tbody>
    </table>

    <!--Sección información de Reserva..................................-->
    <div class="title">
        <p>Información Reserva</p>
    </div>
    <table class="table contenido-produccion">
        <tbody>
            <tr>
                    <th>Institución de laboratorio</th>
                    <td>{{ $reserva->institucion_laboratorio}}</td>
            </tr>>
            <tr>
                    <th>Carrera laboratorio</th>
                    <td>{{ $reserva->carrera_laboratorio}}</td>
            </tr>
            <tr>
                    <th>Nombre de laboratorio</th>
                    <td>{{ $reserva->laboratorio }}</td>
            </tr>
            <tr>
                    <th>Fecha y hora de inicio</th>
                    <td>{{ \Carbon\Carbon::parse($reserva->fecha_inicio)->format('d/m/Y h:i:s A') }}</td>
            </tr>
            <tr>
                    <th>Fecha y hora de conclusión</th>
                    <td>{{ \Carbon\Carbon::parse($reserva->fecha_fin)->format('d/m/Y h:i:s A') }}</td>
            </tr>
            <tr>
                    <th>Motivo de reserva</th>
                    <td>{{ $reserva->motivo}}</td>
            </tr>
            <tr>
                    <th>Tipo de equipo</th>
                    <td>{{ $reserva->tipo_equipo}}</td>
            </tr>
            <tr>
                    <th>Fecha de creacion de reserva</th>
                    <td>{{ $reserva->created_at->format('d/m/Y') }}</td>
            </tr>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>