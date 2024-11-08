<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .main {
            margin-top: 70px;
            /* Ajusta este valor según la altura de tu header */
        }

        .search-button-container {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

        .search-button {
            width: 50%;
            /* Ajusta el tamaño deseado del botón */
            max-width: 300px;
            /* Ancho máximo */
            padding: 10px;
        }

        .back-button-container {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

        .back-button {
            width: 50%;
            max-width: 300px;
            padding: 10px;
            background-color: #6c757d;
            border: none;
            color: white;
            font-size: 16px;
        }

        .back-button:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body class="body">
    @include('layouts.headregob')
    @include('layouts.header')
    <main class="main">
        <div class="col invisible"></div>
        <div class="col obscuro">
            <div class="titulo row d-flex mb-3">
                <h1>{{ __('VITRINATEHC') }}</h1>
            </div>
             <!-- Botón para regresar al Home -->
             <div class="back-button-container">
                <a href="{{ url('/home') }}" class="btn back-button">
                    Regresar
                </a>
            </div>
            <hr class="hr-gob">

            <!-- Filtros de búsqueda -->
            <form id="busqueda-form" action="{{ route('buscar-producciones.catalogo') }}" method="GET">
                <div class="modal-body">
                    <div class="col">
                    <label for="lineaInv">Área de conocimiento:</label>
                        <select class="form-control" name="lineaInv" id="lineaInv">
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="ÁREA I. Físico-Matemáticas y Ciencias de la Tierra">ÁREA I. Físico-Matemáticas y Ciencias de la Tierra</option>
                            <option value="ÁREA II. Biología y Química">ÁREA II. Biología y Química</option>
                            <option value="ÁREA III. Medicina y Ciencias de la Salud">ÁREA III. Medicina y Ciencias de la Salud</option>
                            <option value="ÁREA IV. Ciencias de la Conducta y la Educación">ÁREA IV. Ciencias de la Conducta y la Educación</option>
                            <option value="ÁREA V. Humanidades">ÁREA V. Humanidades</option>
                            <option value="ÁREA VI. Ciencias Sociales">ÁREA VI. Ciencias Sociales</option>
                            <option value="ÁREA VII. Ciencias de la Agricultura, Agropecuarias, Forestales y de Ecosistemas">ÁREA VII. Ciencias de la Agricultura, Agropecuarias, Forestales y de Ecosistemas</option>
                            <option value="ÁREA VIII. Ingenierías y Desarrollo Tecnológico">ÁREA VIII. Ingenierías y Desarrollo Tecnológico</option>
                            <option value="ÁREA IX. Multidisciplinaria">ÁREA IX. Multidisciplinaria</option>
                        </select>
                    </div>

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                        <div class="col">
                        <label for="tipo">Tipo:</label>
                            <select class="form-control" name="tipo" id="tipo">
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Libros o capitulos de libro">Libros o capítulos de libro</option>
                                <option value="Articulos arbitrados y articulos indexados">Artículos arbitrados y artículos indexados</option>
                                <option name="tipo" value="Consultoria">Consultoria</option>
                                <option value="Propiedad intelectual">Propiedad intelectual</option>
                                <option value="Modelos de utilidad">Modelos de utilidad</option>
                                <option value="Patentes">Patentes</option>
                                <option value="Prototipos">Prototipos</option>
                                <option value="Transferencia de tecnología">Transferencia de tecnología</option>
                                <option value="Desarrollo de infraestructura">Desarrollo de infraestructura</option>
                                <option value="Informes técnicos">Informes técnicos</option>
                                <option value="Obras artísticas">Obras artísticas</option>
                                <option value="Otro">Otro</option>
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
                            <label for="year">Buscar producciones por año:</label>
                            <input class="form-control" id="year" name="year" type="number" 
                                                min="1900" max="<?php echo date('Y'); ?>" step="1" />
                        </div>

                        <div class="col">
                        <div class="col">
                            <label for="proposito">Propósito:</label>
                            <select class="form-control" name="proposito" id="proposito">
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Asimilacion de tecnologia">Asimilación de tecnología</option>
                                <option value="Creación">Creación</option>
                                <option value="Desarrollo tecnológico">Desarrollo tecnológico</option>
                                <option value="Difusión">Difusión</option>
                                <option value="Generación de conocimiento">Generación de conocimiento</option>
                                <option value="Investigación aplicada">Investigación aplicada</option>
                                <option value="Transferencia tecnologica">Transferencia tecnológica</option>
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="search-button-container">
                        <button class="button producciones btn btn-primary search-button" type="submit" value="Buscar">
                            <i class="bi bi-search"></i> Buscar
                        </button>
                    </div>
                    <!-- Botón "Mostrar todos" -->
                    <div class="search-button-container">
                        <button class="button producciones btn btn-secondary search-button" type="submit" name="mostrar_todos" value="1">
                            Mostrar todos
                        </button>
                    </div>
            </form>

           

            <hr class="hr-gob">

            <!-- Resultados de producciones -->
            <div class="modal-body">
                <div class="row resultados producciones">
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
                                <a href="#" class="btn btn-primary" id="btnAbrirModalnodo" data-bs-toggle="modal" data-bs-target="#Modal-crear-produccion-{{ $produccion->id_pro }}">
                                    <i class="bi bi-book"></i> Leer más
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Modal para cada producción -->
            @foreach ($producciones as $produccion)
            <div class="modal fade" id="Modal-crear-produccion-{{ $produccion->id_pro }}">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{$produccion->titulo}}</h4>
                        </div>
                        <div class="modal-body">
                            <table class="tabla-modal table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Tipo:</th>
                                        <td>{{$produccion->tipo}}</td>
                                    </tr>
                                    <tr>
                                        <th>Evidencia:</th>
                                        <td><a href="/documentos-users/produccion/{{$produccion->evidencia}}" target="blanck_">{{$produccion->evidencia}}</a></td>
                                    </tr>
                                    <tr>
                                        <th>Autor(es):</th>
                                        <td>{{$produccion->autores}}</td>
                                    </tr>
                                    <tr>
                                        <th>Descripción:</th>
                                        <td>{{$produccion->descripcion}}</td>
                                    </tr>
                                    <tr>
                                        <th>País:</th>
                                        <td>{{$produccion->pais}}</td>
                                    </tr>
                                    <tr>
                                        <th>Fecha:</th>
                                        <td>{{$produccion->year}}</td>
                                    </tr>
                                    <tr>
                                        <th>Propósito:</th>
                                        <td>{{$produccion->proposito}}</td>
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
        </div>
    </main>
    @include('layouts.footer')
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>

</html>
