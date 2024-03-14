<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/documentosinfo.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                <div class="container text-center">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                        <div class="col">
                            <label for="tipo">Tipo:</label>
                            <input type="text" id="tipo" name="tipo">
                        </div>
                        <div class="col">
                            <label for="autores">Autores:</label>
                            <input type="text" id="autores" name="autores">
                        </div>
                        <div class="col">
                            <label for="titulo">Título:</label>
                            <input type="text" id="titulo" name="titulo">
                        </div>
                        <div class="col">
                            <label for="descripcion">Descripción:</label>
                            <input type="text" id="descripcion" name="descripcion">
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                        <div class="col">
                            <label for="pais">País:</label>
                            <input type="text" id="pais" name="pais">
                        </div>
                        <div class="col">
                            <label for="year">Año:</label>
                            <input type="text" id="year" name="year">
                        </div>
                        <div class="col">
                            <label for="proposito">Propósito:</label>
                            <input type="text" id="proposito" name="proposito"><br>
                        </div>
                        <div class="container text-center">
                            <input type="submit" value="Buscar">
                        </div>
                    </div>
                </div>
            </form>
            
            <div class="container">
                <div class="row">
                    @foreach ($producciones as $produccion)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">{{ $produccion->titulo }}</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><strong>Tipo:</strong> {{ $produccion->tipo }}</p>
                                <p class="card-text"><strong>Autores:</strong> {{ $produccion->autores }}</p>
                                <p class="card-text"><strong>Título:</strong> {{ $produccion->titulo }}</p>
                                <p class="card-text"><strong>Descripción:</strong> {{ $produccion->descripcion }}</p>
                                <p class="card-text"><strong>País:</strong> {{ $produccion->pais }}</p>
                                <p class="card-text"><strong>Año:</strong> {{ $produccion->year }}</p>
                                <p class="card-text"><strong>Propósito:</strong> {{ $produccion->proposito }}</p>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Leer mas...
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
        </div>
    </main>
</body>
</html>
