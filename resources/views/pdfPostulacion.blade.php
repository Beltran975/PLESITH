<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Postulación</title>
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
    <div class="title">
        <p>Datos de postulación</p>
    </div>
    <table class="table">
        <tbody>
            <tr>
                <th>Nombre</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th class="rotated-header">Correo</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th class="rotated-header">CURP</th>
                <td>{{ $user->curp }}</td>
            </tr>
            <tr>
                <th class="rotated-header">Institución a la que pertenece</th>
                <td>{{ $user-> institucion}}</td>
            </tr>
            <tr>
                <th class="rotated-header">Programa educativo</th>
                <td>{{ $user-> programa}}</td>

            </tr>
        </tbody>
    </table>

    <!--Sección información PLESITH..................................-->
    <div class="title">
        <p>Información PLESITH</p>
    </div>
    <table class="table contenido-produccion">
        @foreach ( Auth::user()->datos as $dato)
            <tr>
                <th>Área de conocimiento</th>
                <td>{{ $dato -> lineaInv}}</td>
            </tr>
            <tr>
                <th class="rotated-header">Grado académico</th>
                <td>{{ $dato->grado }}</td>
            </tr>
            <tr>
                <th class="rotated-header">Evidencia del grado académico</th>
                <td><a href="/produccion/{{ $dato->evidenciaGrado}}" target="blanck_">{{ $dato->evidenciaGrado}}</a></td>
            </tr>
            <tr>
                <th class="rotated-header">Colaboración al SNI</th>
                <td>{{ $dato-> pertenece}}</td>
            </tr>
            <tr>
                <th class="rotated-header">Evidencia SNI</th>
                <td><a href="produccion/{{ $dato->evidenciaSni}}" target="blanck_">{{ $dato->evidenciaSni}}</a></td>
            </tr>
        @endforeach
    </table>
    <!--Sección de producciones..................................-->
    <div class="title">
        <p>Mis producciones</p>
    </div>
    <div>
    </div>
    @foreach (Auth::user()->producciones as $produccion)
    <table class="table contenido-produccion">
        <tbody>
            <tr>
                <th>Tipo</th>
                <td>{{ $produccion->tipo}}</td>
            </tr>
            <tr>
                <th>Evidencia</th>
                <td scope="row"><a href="/produccion/{{ $produccion->evidencia}}" target="blanck_">{{ $produccion->evidencia}}</a></td>
            </tr>
            <tr>
                <th>Autores</th>
                <td>{{ $produccion->autores}}</td>
            </tr>
            <tr>
                <th>Título</th>
                <td>{{ $produccion->titulo}}</td>
            </tr>   
            <tr>
                <th>Descripción</th>
                <td>{{ $produccion->descripcion}}</td>
            </tr>
            <tr>
                <th>País</th>
                <td>{{ $produccion->pais}}</td>
            </tr>
            <tr>
                <th>Fecha</th>
                <td>{{ $produccion->year}}</td>
            </tr>
            <tr>
                <th>Proposito</th>
                <td>{{ $produccion->proposito}}</td>
            </tr>
           
        </tbody>
    </table>
    @endforeach
    <!---->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>