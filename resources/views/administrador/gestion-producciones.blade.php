<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('asset/home-admin.css') }}">
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Gestión Producciones | PLESITH</title>
    </head>
    <body class="body">
        @include('layouts/datos-gob')
        @include('layouts.nav-admin')
        <main class="main">
            <img src="https://lajornadahidalgo.com/wp-content/uploads/2022/08/CITNOVA-SINCROTON.jpg" alt="img">
            <section class="admin seccion-obscura justify-content-around">
                <div class="row blanco">
                    <div class="col blanco"></div>
                    <div class="col obscuro">
                        <div class="titulo row d-flex  mb-3">
                            <h3>{{ __('Buscador | Producciones') }}</h3>
                        </div>
                        <hr class="hr-gob">
                        <!-- filtros de busqueda -->
                        <div class="filtros produccion">
                            <form id="busqueda-form" action="{{ route('buscar-producciones') }}" method="GET">
                                <div class="container text-center">
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                                        <div class="col">
                                            <label for="tipo">Tipo:</label>
                                            <select class="form-control" name="tipo" id="tipo">
                                                <option name="tipo" value="" disabled selected>Seleccionar</option>
                                                <option name="tipo" value="Libros o capitulos de libro">Libros o capítulos de libro</option>
                                                <option name="tipo" value="Articulos arbitrados y articulos indexados">Artículos arbitrados y artículos indexados</option>
                                                <option name="tipo" value="Propiedad intelectual">Propiedad intelectual</option>
                                                <option name="tipo" value="Modelos de utilidad">Modelos de utilidad</option>
                                                <option name="tipo" value="Patentes">Patentes</option>
                                                <option name="tipo" value="Prototipos">Prototipos</option>
                                                <option name="tipo" value="Transferencia de tecnología">Transferencia de tecnología</option>
                                                <option name="tipo" value="Desarrollo de infraestructura">Desarrollo de infraestructura</option>
                                                <option name="tipo" value="Informes técnicos">Informes técnicos</option>
                                                <option name="tipo" value="Obras artísticas">Obras artísticas</option>
                                                <option name="tipo" value="Otro">Otro</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="autores">Autores:</label>
                                            <input class="form-control" type="text" id="autores" name="autores">
                                        </div>
                                        <div class="col">
                                            <label for="titulo">Título:</label>
                                            <input class="form-control" type="text" id="titulo" name="titulo">
                                        </div>
                                        <div class="col">
                                            <label for="pais">País:</label>
                                            <input class="form-control" type="text" id="pais" name="pais">
                                        </div>
                                        <div class="col">
                                            <label for="year">Fecha:</label>
                                            <input class="form-control" id="year" name="year" type="month" min="1900" max="2099" step="1" />
                                        </div>
                                        <div class="col">
                                            <label for="proposito">Propósito:</label>
                                            <select class="form-control" name="proposito" id="proposito">
                                                <option name="proposito" value="" disabled selected>Seleccionar</option>
                                                <option name="proposito" value="Asimilacion de tecnologia">Asimilación de tecnología</option>
                                                <option name="proposito" value="Creación">Creación</option>
                                                <option name="proposito" value="Desarrollo tecnológico">Desarrollo tecnológico</option>
                                                <option name="proposito" value="Difusión">Difusión</option>
                                                <option name="proposito" value="Generación de conocimiento">Generación de conocimiento</option>
                                                <option name="proposito" value="Investigación aplicada">Investigación aplicada</option>
                                                <option name="proposito" value="Transferencia tecnologica">Transferencia tecnológica</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <!-- <input type="submit" value="Buscar"> -->
                                            <button class="button producciones" type="submit" value="Buscar">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- resultados producciones-->
                        <div class="resultados producciones">
                            <div class="row">
                                @foreach ($producciones as $produccion)
                                <div class="col-md-4 mb-4">
                                    <div class="card producciones">
                                        <div class="card-header producciones">
                                            <h5 class="card-title">{{ $produccion->titulo }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text"><strong>Título:</strong> {{ $produccion->titulo }}</p>
                                            <p class="card-text"><strong>Autores:</strong> {{ $produccion->autores }}</p>
                                            <p class="card-text"><strong>Año:</strong> {{ $produccion->year }}</p>
                                            <p class="card-text"><strong>Propósito:</strong> {{ $produccion->proposito }}</p>
                                            <!-- <a href="#" class="btn btn-primary" id="btnAbrirModalnodo" data-bs-toggle="modal" data-bs-target="#Modal-pruduc-{{ $produccion->id_pro }}"> -->
                                            <a href="#" class="btn btn-primary" id="btnAbrirModalnodo" data-bs-toggle="modal" data-bs-target="#Modal-crear-produccion-{{ $produccion->id_pro }}">
                                                Leer más
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal produccion -->
                @foreach ($producciones as $produccion)
                    <div class="modal fade" id="Modal-crear-produccion-{{ $produccion->id_pro }}">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">{{$produccion->titulo}}</h4>
                                    <button type="button" class="btn btn-secondary">Generar reporte <i class="bi bi-download"></i></button>
                                </div>
                                <div class="modal-body">
                                    <table class="tabla-modal table table-borderless" >
                                        <tbody>
                                            <tr>
                                                <th class="rotated-header">Tipo: </th>
                                                <td class="contenido-produccion">{{$produccion->tipo}}</td>
                                            </tr>
                                            <tr>
                                                <th class="rotated-header">Evidencia: </th>
                                                <td class="contenido-produccion"><a href="/produccion/{{$produccion->evidencia}}" target="blanck_">{{$produccion->evidencia}}</a></td>
                                            </tr>
                                            <tr>
                                                <th class="rotated-header">Autor(es): </th>
                                                <td class="contenido-produccion">{{$produccion->autores}}</td>
                                            </tr>
                                            <tr>
                                                <th class="rotated-header">Título: </th>
                                                <td class="contenido-produccion">{{$produccion->titulo}}</td>
                                            </tr>
                                            <tr>
                                                <th class="rotated-header">Descripción:</th>
                                                <td class="contenido-produccion">{{$produccion->descripcion}}</td>
                                            </tr>
                                            <tr>
                                                <th class="rotated-header">País: </th>
                                                <td class="contenido-produccion">{{$produccion->pais}}</td>
                                            </tr>
                                            <tr>
                                                <th class="rotated-header">Fecha: </th>
                                                <td class="contenido-produccion">{{$produccion->year}}</td>
                                            </tr>
                                            <tr>
                                                <th class="rotated-header">Propósito: </th>
                                                <td class="contenido-produccion">{{$produccion->proposito}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </section>
        </main>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <!-- script modal -->
        <!-- <script> 
            $(document).ready(function(){
                $("#btnAbrirModalnodo").click(function(){
                    $("#Modal-crear-produccion").modal();
                });
            });

            $(document).ready(function(){
                    $('#Modal-crear-produccion').on('hidden.bs.modal', function (e) {
                        $('.modal-backdrop').remove();
                    });
                });
        </script> -->
</html>
                        <!-- Modal leer mas producciones administrador 
                        @foreach ($producciones as $produccion)
                        <div class="modal fade" id="Modal-crear-produccion-{{ $produccion->id_pro }}">
                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{$produccion->titulo}}</h4>
                                        <button type="button" class="btn btn-secondary">Generar reporte <i class="bi bi-download"></i></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="tabla-modal table table-borderless" >
                                            <tbody>
                                                <tr>
                                                    <th class="rotated-header">Tipo: </th>
                                                    <td class="contenido-produccion">{{$produccion->tipo}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="rotated-header">Evidencia: </th>
                                                    <td class="contenido-produccion"><a href="/produccion/{{$produccion->evidencia}}" target="blanck_">{{$produccion->evidencia}}</a></td>
                                                </tr>
                                                <tr>
                                                    <th class="rotated-header">Autor(es): </th>
                                                    <td class="contenido-produccion">{{$produccion->autores}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="rotated-header">Título: </th>
                                                    <td class="contenido-produccion">{{$produccion->titulo}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="rotated-header">Descripción:</th>
                                                    <td class="contenido-produccion">{{$produccion->descripcion}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="rotated-header">País: </th>
                                                    <td class="contenido-produccion">{{$produccion->pais}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="rotated-header">Fecha: </th>
                                                    <td class="contenido-produccion">{{$produccion->year}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="rotated-header">Propósito: </th>
                                                    <td class="contenido-produccion">{{$produccion->proposito}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrarrr</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach-->

                    
            <!-- <form id="busqueda-form" action="{{ route('buscar-producciones') }}" method="GET">
            <h1>Buscador de producciones</h1>
                <div class="container text-center">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                        <div class="col">
                            <label for="tipo">Tipo:</label>
                            <select class="form-control" name="tipo" id="tipo">
                                        <option name="tipo" value="" disabled selected>Seleccionar</option>
                                        <option name="tipo" value="Libros o capitulos de libro">Libros o capítulos de libro</option>
                                        <option name="tipo" value="Articulos arbitrados y articulos indexados">Artículos arbitrados y artículos indexados</option>
                                        <option name="tipo" value="Propiedad intelectual">Propiedad intelectual</option>
                                        <option name="tipo" value="Modelos de utilidad">Modelos de utilidad</option>
                                        <option name="tipo" value="Patentes">Patentes</option>
                                        <option name="tipo" value="Prototipos">Prototipos</option>
                                        <option name="tipo" value="Transferencia de tecnología">Transferencia de tecnología</option>
                                        <option name="tipo" value="Desarrollo de infraestructura">Desarrollo de infraestructura</option>
                                        <option name="tipo" value="Informes técnicos">Informes técnicos</option>
                                        <option name="tipo" value="Obras artísticas">Obras artísticas</option>
                                        <option name="tipo" value="Otro">Otro</option>
                                    </select>
                        </div>
                        <div class="col">
                            <label for="autores">Autores:</label>
                            <input class="form-control" type="text" id="autores" name="autores">
                        </div>
                        <div class="col">
                            <label for="titulo">Título:</label>
                            <input class="form-control" type="text" id="titulo" name="titulo">
                        </div>
                        <div class="col">
                            <label for="pais">País:</label>
                            <input class="form-control" type="text" id="pais" name="pais">
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
                        <div class="col">
                            <label for="year">Fecha:</label>
                            <input class="form-control" id="year" name="year" type="month" min="1900" max="2099" step="1" />
                        </div>
                        <div class="col">
                            <label for="proposito">Propósito:</label>
                            <select class="form-control" name="proposito" id="proposito">
                                        <option name="proposito" value="" disabled selected>Seleccionar</option>
                                        <option name="proposito" value="Asimilacion de tecnologia">Asimilación de tecnología</option>
                                        <option name="proposito" value="Creación">Creación</option>
                                        <option name="proposito" value="Desarrollo tecnológico">Desarrollo tecnológico</option>
                                        <option name="proposito" value="Difusión">Difusión</option>
                                        <option name="proposito" value="Generación de conocimiento">Generación de conocimiento</option>
                                        <option name="proposito" value="Investigación aplicada">Investigación aplicada</option>
                                        <option name="proposito" value="Transferencia tecnologica">Transferencia tecnológica</option>
                                    </select>
                        </div>
                        <div class="col">
                            <input type="submit" value="Buscar">
                        </div>
                    </div>
                </div>
            </form> -->