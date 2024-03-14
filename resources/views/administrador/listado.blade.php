<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/documentosinfo.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Nodos | PLESITH</title>
</head>
<body class="body">
    @include('layouts/datos-gob')
    <main class="main">
        <img src="https://lajornadahidalgo.com/wp-content/uploads/2022/08/CITNOVA-SINCROTON.jpg" alt="img">
        @include('layouts.nav-admin')
        <div class="title">
            <h1>Nodos de toda la comunidad</h1>
            <div class="p-10">
                <div class="flex flex-col">
                    <div>
                        <div class="py-2 space-y-5 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <br>
                            <form action="">
                                <div class="container text-center">
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                                        <div class="col">
                                            <label for="titulo">Título:</label>
                                            <input type="text" id="titulo" name="titulo">
                                        </div>
                                        <div class="col">
                                            <label for="region">Región:</label>
                                            <select id="region" name="region">
                                                <option value="">Selecciona una región</option>
                                                <option value="Altiplanicie pulquera">Altiplanicie pulquera</option>
                                                <option value="Valle del mezquital">Valle del mezquital</option>
                                                <option value="Comarca minera">Comarca minera</option>
                                                <option value="Huasteca">Huasteca</option>
                                                <option value="Valle de Tulancingo">Valle de Tulancingo</option>
                                                <option value="Sierra alta">Sierra alta</option>
                                                <option value="Sierra gorda">Sierra gorda</option>
                                                <option value="Sierra baja">Sierra baja</option>
                                                <option value="Cuenca de mexico">Cuenca de mexico</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="area">Área de conocimiento:</label>
                                            <select id="area" name="area">
                                                <option value="">Selecciona un área de conocimiento</option>
                                                <option value="Ciencias Naturales">Ciencias Naturales</option>
                                                <option value="Ciencias Sociales">Ciencias Sociales</option>
                                                <option value="Matemáticas">Matemáticas</option>
                                                <option value="Arte y Cultura">Arte y Cultura</option>
                                                <option value="Tecnología">Tecnología</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="año">Año:</label>
                                            <select id="año" name="año">
                                                <option value="">Selecciona un año</option>
                                                <option value="2020">2020</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                                        <div class="col">
                                            <label for="nombre">Nombre:</label>
                                            <input type="text" id="nombre" name="nombre">

                                        </div>
                                        <div class="col">
                                            <label for="institucion">Institución ligada:</label>
                                            <select id="institucion" name="institucion">
                                                <option value="">Selecciona una institución</option>
                                                <option value="Institución 1">Institución 1</option>
                                                <option value="Institución 2">Institución 2</option>
                                                <option value="Institución 3">Institución 3</option>
                                            </select>
                                        </div>
                                        <div class="container text-center">
                                            <input type="submit" value="Buscar">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                            <div class="container">
                                <div class="row">
                                    @foreach ($info as $i)
                                        <div class="col-md-4 mb-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">{{$i->tema_inv}}</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text"><strong>Categoría:</strong> {{$i->categoria}}</p>
                                                    <p class="card-text"><strong>Líder:</strong> {{$i->lider}}</p>
                                                    <p class="card-text"><strong>Colaboradores:</strong> {{$i->colaboradores}}</p>
                                                    <p class="card-text"><strong>Área de conocimiento:</strong> {{$i->linea_inv}}</p>
                                                    <p class="card-text"><strong>Institución ligada:</strong> {{$i->institucion_ligada}}</p>
                                                    <p class="card-text"><strong>Descripción:</strong> {{$i->descripcion}}</p>
                                                    <p class="card-text"><strong>Documentación:</strong> {{$i->documento}}</p>
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
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
