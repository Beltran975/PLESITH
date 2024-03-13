<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/documentosinfo.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
    <title>Gestion producciones | PLESITH</title>

</head>
<body>

@include('layouts.datos-gob')

<main class="main">
    <img src="https://lajornadahidalgo.com/wp-content/uploads/2022/08/CITNOVA-SINCROTON.jpg" alt="img">
    @include('layouts.nav-admin')
    <div class="title">
        <h1>Buscador de producciones</h1>
        <form id="busqueda-form" action="{{ route('buscar-producciones') }}" method="GET">
            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo"><br>

            <label for="autores">Autores:</label>
            <input type="text" id="autores" name="autores"><br>

            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo"><br>

            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion"><br>

            <label for="pais">País:</label>
            <input type="text" id="pais" name="pais"><br>

            <label for="year">Año:</label>
            <input type="text" id="year" name="year"><br>

            <label for="proposito">Propósito:</label>
            <input type="text" id="proposito" name="proposito"><br>

            <input type="submit" value="Buscar">

            <div id="resultados">
        <!-- Aquí se mostrarán los resultados de la búsqueda en una tabla -->
        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Autores</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>País</th>
                    <th>Año</th>
                    <th>Propósito</th>
                </tr>
            </thead>
            <tbody>
    @foreach ($producciones as $produccion)
        <tr>
            <td>{{ $produccion->tipo }}</td>
            <td>{{ $produccion->autores }}</td>
            <td>{{ $produccion->titulo }}</td>
            <td>{{ $produccion->descripcion }}</td>
            <td>{{ $produccion->pais }}</td>
            <td>{{ $produccion->year }}</td>
            <td>{{ $produccion->proposito }}</td>
        </tr>
    @endforeach
</tbody>
        </table>
    </div>
        </form>
    </div>

    
</main>

</body>
</html>
