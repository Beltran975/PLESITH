<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/home.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>{{ Auth::user()->name }} | PLESITH</title>
</head>

<body>

    @include('layouts/headregob')
    @include('layouts/header-nav')
    <main class="page">
        <div class="content">
            <div class="green-box">

                <div class="titulo row d-flex  mb-3">
                    <h3>Datos generales | {{ Auth::user()->name }}</h3>
                </div>
                <!--Acciones del usuario-->
                @switch(Auth::user()->tipo)
                @case('basico')
                <button onclick="verificarMail()" type="button" class="btn btn-secondary">Autenticar Correo electrónico</button>
                @break

                @case('autenticado')
                @if(Auth::user()->datos->count() > 0 && Auth::user()->producciones->count() > 0)
                <a style="display: none;" class="btn btn-primary" id="ruta" href="/generate-pdf">Generar postulación</a>
                <button class="btn btn-success" id="botonPostulacion">Enviar postulación <i class="bi bi-send"></i></button>
                <br>
                <br>
                <figcaption class="blockquote-footer">
                    Antes de enviar su postulación, verifique que todos sus datos estén llenos correctamente.
                </figcaption>
                @else
                <button disabled class="btn btn-success" id="botonPostulacion">Enviar postulación <i class="bi bi-send"></i></button>
                <br>
                <br>
                <figcaption class="blockquote-footer">
                    Para completar adecuadamente su solicitud, le solicitamos que ingrese sus datos correspondientes en "Información PLESITH". Además, agregue información sobre sus investigaciones, patentes y documentos de investigación en la sección "Mis Producciones".
                </figcaption>
                @endif
                @break
                @case('Inhabilitado')
                <a style="display: none;" class="btn btn-primary" id="ruta" href="/generate-pdf">Generar postulación</a>
                <button class="btn btn-success" id="botonPostulacion">Reenviar postulación <i class="bi bi-send"></i></button>
                @break

                @case('postulado')
                @case('revisado')
                @if(Auth::user()->datos->count() > 0 && Auth::user()->producciones->count() > 0)
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal-estatus-pos">Estatus de cuenta</button>
                <a href="/generate-CV" class="btn btn-success">
                    <i class="bi bi-box-arrow-in-down"></i>
                    Descargar Perfil PLESITH
                </a>
                @endif
                @break

                @default
                <!-- Si no coincide con ninguno de los casos anteriores -->
                @endswitch


                <div class="modal fade" id="Modal-estatus-pos" tabindex="-1" aria-label="Modal-estatus-label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="Modal-estatus-label">Estatus de postulación</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                            </div>
                            <div class="modal-body">
                                @foreach (Auth::user()->postulaciones as $postulacion)
                                <p>De acuerdo con el proceso de selección para la verificación, le notificamos que su postulación realizada el dia {{ $postulacion->created_at->formatLocalized('%A, %d de %B') }} su proceso de postulación a es: <b>{{ $postulacion->estatus }}</b></p>
                                <p>Para mayor detalle sobre su proceso de postulación consulte su dictamen</p>
                                @if($postulacion->estatus == 'Aprobado')
                                <a href="/documentos-admin/dictamenes/aprobados/{{ $postulacion->pdfDictamen}}" target="blanck_">Dictamen</a>
                                @elseif($postulacion->estatus == 'Negado')
                                <a href="/documentos-admin/dictamenes/negados/{{ $postulacion->pdfDictamen}}" target="blanck_">Dictamen</a>
                                @endif
                                @endforeach

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <hr class="hr-gob">

                <!-- Informacion personal -->
                <div class="card mb-3">
                    <div class="card-header" data-bs-toggle="collapse" href="#informacionPersonal">
                        Información personal
                    </div>
                    <div class="card-body collapse" id="informacionPersonal">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Nombre :</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ Auth::user()->name}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <p>Correo :</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ Auth::user()->email}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>CURP :</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ Auth::user()->curp}}</p>
                                <a href="/documentos-users/perfil/archivos_curp/{{ Auth::user()->archivoCurp}}" target="blanck_">{{ Auth::user()->archivoCurp}}</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Institución a la que pertenece :</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ Auth::user()->institucion}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Programa educativo :</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ Auth::user()->programa}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Fotografía del perfil :</p>
                            </div>
                            <div class="col-md-6">
                                <div class="image-Ipersonal">
                                    <img src="/documentos-users/perfil/profiles/{{ Auth::user()->image_path}}" alt="{{Auth::user()->image_path}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informacion PLESITH -->
                <div class="card mb-3">
                    <div class="card-header" data-bs-toggle="collapse" href="#informacionPLESITH">
                        Información PLESITH
                    </div>
                    <div class="card-body collapse" id="informacionPLESITH">
                        @if(!is_null(Auth::user()->datos) && Auth::user()->datos->isEmpty())
                        <form action="EnvioInformacion" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row form-outline md-4">
                                <div class="col-md-4">
                                    <label class="form-label" for="lineaInv">Área de conocimiento</label>
                                </div>
                                <br>
                                <br>
                                <div class="col-md-8">
                                    <select class="form-control" name="lineaInv" required>
                                        <option name="lineaInv" value="" disabled selected>Seleccionar</option>
                                        <option name="lineaInv" value="ÁREA I. Físico-Matemáticas y Ciencias de la Tierra">ÁREA I. Físico-Matemáticas y Ciencias de la Tierra</option>
                                        <option name="lineaInv" value="ÁREA II. Biología y Química">ÁREA II. Biología y Química</option>
                                        <option name="lineaInv" value="ÁREA III. Medicina y Ciencias de la Salud">ÁREA III. Medicina y Ciencias de la Salud </option>
                                        <option name="lineaInv" value="ÁREA IV. Ciencias de la Conducta y la Educación">ÁREA IV. Ciencias de la Conducta y la Educación</option>
                                        <option name="lineaInv" value="ÁREA V. Humanidades">ÁREA V. Humanidades</option>
                                        <option name="lineaInv" value="ÁREA VI. Ciencias Sociales">ÁREA VI. Ciencias Sociales</option>
                                        <option name="lineaInv" value="ÁREA VII. Ciencias de la Agricultura, Agropecuarias, Forestales y de Ecosistemas">ÁREA VII. Ciencias de la Agricultura, Agropecuarias, Forestales y de Ecosistemas</option>
                                        <option name="lineaInv" value="ÁREA VIII. Ingenierías y Desarrollo Tecnológico">ÁREA VIII. Ingenierías y Desarrollo Tecnológico</option>
                                        <option name="lineaInv" value="ÁREA IX. Multidisciplinaria">ÁREA IX. Multidisciplinaria</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Grado Academico -->
                            <div class="row form-outline mb-4">
                                <div class="col-md-4">
                                    <label class="form-label" for="grado">Grado académico</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" name="grado" required>
                                        <option name="grado" value="" disabled selected>Seleccionar</option>
                                        <option name="grado" value="Técnico">Técnico</option>
                                        <option name="grado" value="Licenciatura">Licenciatura</option>
                                        <option name="grado" value="Ingeniería">Ingeniería</option>
                                        <option name="grado" value="Maestría">Maestría</option>
                                        <option name="grado" value="Doctorado">Doctorado</option>
                                        <option name="grado" value="Comunidad">Comunidad</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Evidencia Grado Academico -->
                            <div class="row form-outline mb-4">
                                <div class="col-md-4">
                                    <label class="form-label" for="evidenciaGrado">Evidencia del grado académico </label>
                                    <div class="tooltipUNO">
                                        <div class="iconUNO">?</div>
                                        <div class="tooltiptextUNO">Solo se permiten archivos emitidos por una institución académica. Asegurate de adjuntar el archivo correcto, no se podrá editar.</div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" name="evidenciaGrado" accept=".pdf" placeholder="Seleccionar archivo PDF" required />
                                </div>
                            </div>
                            <!-- Pertenece al SNI -->
                            <div class="row form-outline mb-4">
                                <div class="col-md-4">
                                    <label class="form-label" for="pertenece">¿Pertenece al SNI?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="radio" name="pertenece" autocomplete="off" value="si" required>
                                    <label class="btn" for="pertenece">Sí</label>
                                    <input type="radio" name="pertenece" autocomplete="off" value="no" required>
                                    <label class="btn" for="pertenece">No</label>
                                </div>
                            </div>

                            <!-- Evidencia de SNI -->
                            <div class="row form-outline mb-4">
                                <div class="col-md-4">
                                    <label class="form-label" for="evidenciaSni">Evidencia SNI </label>
                                    <div class="tooltipUNO">
                                        <div class="iconUNO">?</div>
                                        <div class="tooltiptextUNO">Solo se permiten archivos emitidos por una institución académica. Asegurate de adjuntar el archivo correcto.</div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" name="evidenciaSni" id="evidenciaSni" accept=".pdf" placeholder="Seleccionar archivo PDF" required disabled />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                        @else
                        @foreach(Auth::user()->datos as $info)

                        <!--Área de conocimiento-->
                        <div class="row">
                            <div class="col-md-6">
                                <p>Área de conocimiento :</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $info->lineaInv}}</p>
                            </div>
                        </div>

                        <!--Grado academico-->
                        <div class="row">
                            <div class="col-md-6">
                                <p>Grado academico :</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $info->grado}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Evidencia del grado académico :</p>
                            </div>
                            <div class="col-md-6">
                                <a href="documentos-users/info-PLESITH/academico/{{ $info->evidenciaGrado}}" target="blanck_">{{ $info->evidenciaGrado}}</a>
                            </div>
                        </div>
                        <!--Nivel-->
                        <div class="row">
                            <div class="col-md-6">
                                <p>Nivel PLSESITH :</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $info->nivel}}</p>
                            </div>
                        </div>

                        <!--Pertenece al SNI-->
                        <div class="row">
                            <div class="col-md-6">
                                <p>¿Pertenece al SNI? :</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $info->pertenece}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <p>Evidencia SNI :</p>
                            </div>
                            <div class="col-md-6">
                                <a href="documentos-users/info-PLESITH/evidencia/{{ $info->evidenciaSni}}" target="blanck_">{{ $info->evidenciaSni}}</a>
                            </div>
                        </div>

                        @endforeach
                        @endif
                    </div>
                </div>

                <!-- Produccion -->
                <div class="card mb-3">
                    <div class="card-header" data-bs-toggle="collapse" href="#produccion">
                        Mis producciones
                    </div>
                    <div class="card-body collapse" id="produccion">
                        <div class="row row-cols-auto">
                            <div class="col">
                                <a href="#" class="btn btn-primary" id="btnAbrirModalProduccion" data-bs-toggle="modal" data-bs-target="#Modal-crear-produccion"><i class="bi bi-plus-circle-fill"></i> Crear</a>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="/Producciones/listaProducciones"><i class="bi bi-list-ul"></i> Mis producciones</a>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Proposito</th>
                                    <th scope="col">Año</th>
                                </tr>
                            </thead>
                            @foreach (Auth::user()->producciones as $produccion)
                            <tbody class="table-group-divider">
                                <tr>
                                    <th>{{$produccion->tipo}}</th>
                                    <td>{{$produccion->proposito}}</td>
                                    <td>{{$produccion->year}}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>

                </div>

                <!-- Nodos de colaboración -->
                @foreach (Auth::user()->postulaciones as $postulacion)
                @if($postulacion->estatus == 'No revisado' )
                <div class="card mb-3">
                    <div class="card-header" data-bs-toggle="collapse" href="#nodos">
                        Mis nodos de colaboración
                    </div>
                    <div class="card-body collapse" id="nodos">
                        <div class="nav-producciones">
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            <p>Sin verificación</p>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                @elseif($postulacion->estatus == 'Aprobado')
                <div class="card mb-3">
                    <div disabled class="card-header" data-bs-toggle="collapse" href="#nodos">
                        Mis nodos de colaboración
                    </div>
                    <div class="card-body collapse" id="nodos">
                        <div class="row row-cols-auto">
                            <div class="col">
                                <a class="btn btn-primary" id="btnAbrirModalProduccion" data-bs-toggle="modal" data-bs-target="#Modal-crear-nodo"><i class="bi bi-plus-circle-fill"></i> Crear</a>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="/nodo/listaNodos"><i class="bi bi-list-ul"></i> Mis nodos</a>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tema de investigación</th>
                                    <th scope="col">Línea de investigación</th>
                                    <th scope="col">Categoría</th>
                                    <th scope="col">Invitar Colaboradores</th>
                                </tr>
                            </thead>
                            @foreach (Auth::user()->nodos as $nodo)
                            <tbody class="table-group-divider">
                                <tr>
                                    <th>{{$nodo->tema_inv}}</th>
                                    <td>{{$nodo->linea_inv}}</td>
                                    <td>{{$nodo->categoria}}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal-Colab-{{$nodo->id}}" data-nodo-id="{{$nodo->id}}">
                                            Enviar Correo
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            @include('ModalCorreo')
                            @endforeach
                        </table>

                    </div>
                </div>
                <div class="card mb-3">
                    <div disabled class="card-header" data-bs-toggle="collapse" href="#nodos-colab">
                        Nodos en colaboración
                    </div>
                    <div class="card-body collapse" id="nodos-colab">
                        <div class="row row-cols-auto">
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tema de investigación</th>
                                    <th scope="col">Lider del Nodo</th>
                                    <th scope="col">Línea de investigación</th>
                                    <th scope="col">Categoría</th>
                                </tr>
                            </thead>
                            @foreach (Auth::user()->nodosColab as $nodoColab)
                            <tbody class="table-group-divider">
                                <tr>
                                    <th>{{$nodoColab->tema_inv}}</th>
                                    <td>{{$nodoColab->lider}}</td>
                                    <td>{{$nodoColab->linea_inv}}</td>
                                    <td>{{$nodoColab->categoria}}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <hr>
        <!--<div class="row d-flex justify-content-center mb-3">
                <button type="submit" class="btn btn-primary btn-sm " name="accion" value="descargar">Descargar</button>
                <button type="button" class="btn btn-primary btn-sm ml-2">Guardar</button>
            </div>-->
        <hr>

        <!--Modal crear producción-->
        <div class="modal fade" id="Modal-crear-produccion">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Producción</h4>
                    </div>
                    <div class="modal-body">
                        <form action="EnvioProduccion" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center">
                                <!-- Título -->
                                <div class="col-md-4">
                                    <label class="form-label" for="titulo">{{ __('Título *')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input class="form-control" name="titulo" type="text" required>
                                </div>
                                <!-- Autor -->
                                <div class="col-md-4">
                                    <label class="form-label" for="autores">{{ __('Autor *')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input class="form-control" name="autores" type="text" required value="{{ Auth::user()->name}}">
                                </div>
                                <!-- Fecha -->
                                <div class="col-md-4">
                                    <label class="form-label" for="year">{{ __('Fecha *')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input id="fecha-input" class="form-control" name="year" type="date" min=<?php $hoy = date("Y-m-d");
                                                                                                                echo $hoy; ?> max="2099" step="1" required />
                                </div>
                                <!-- País -->
                                <div class="col-md-4">
                                    <label class="form-label" for="pais">{{ __('País *')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input class="form-control" name="pais" id="paisInput" type="text" required>
                                </div>
                                <!-- Tipo -->
                                <div class="col-md-4">
                                    <label class="form-label" for="tipo">{{ __('Tipo *') }}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <select class="form-control" name="tipo" required>
                                        <option name="tipo" value="" disabled selected>Seleccionar</option>
                                        <option name="tipo" value="Libros o capítulos de libro">Libros o capítulos de libro</option>
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
                                <!-- Propósito -->
                                <div class="col-md-4">
                                    <label class="form-label" for="proposito">{{ __('Propósito *')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <select class="form-control" name="proposito" required>
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
                                <!-- Descripción -->
                                <div class="col-md-4">
                                    <label class="form-label" for="descripcion">{{ __('Descripción *')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <textarea class="form-control" name="descripcion" required></textarea>
                                </div>
                                <!-- Documentación -->
                                <div class="col-md-4">
                                    <label class="form-label" for="evidencia">{{ __('Documentación *')}}</label>
                                    <div class="tooltipUNO">
                                        <div class="iconUNO">?</div>
                                        <div class="tooltiptextUNO">Asegurate de adjuntar el archivo correcto. ¡No se podrá editar!</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input class="form-control" type="file" name="evidencia" onchange="validarDocumento(event)" required>
                                </div>
                                <script>
                                    function validarDocumento(event) {
                                        const input = event.target;
                                        const file = input.files[0];
                                        const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

                                        if (!allowedTypes.includes(file.type)) {
                                            alert('Solo se permiten archivos de documentos (PDF, DOC, DOCX, XLS, XLSX).');
                                            input.value = '';
                                        }
                                    }
                                </script>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--Modal crear nodo-->
        <div class="modal fade" id="Modal-crear-nodo">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Nodo de colaboración</h4>

                    </div>
                    <div class="modal-body">
                        <form action="EnvioNodo" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center">
                                <!-- Tema de investigación -->
                                <div class="col-md-4">
                                    <label class="form-label" for="tema_inv">{{ __('Tema de investigación *')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input class="form-control" id="tema_inv" name="tema_inv" type="text" required>
                                </div>
                                <!-- Líder -->
                                <div class="col-md-4">
                                    <label class="form-label" for="lider">{{ __('Líder*')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input class="form-control" id="lider" name="lider" type="text" value="{{ Auth::user()->name}}" required>
                                </div>
                                <!-- Categoría -->
                                <div class="col-md-4">
                                    <label class="form-label" for="categoria">{{ __('Categoría*') }}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <select class="form-control" name="categoria" id="categoria" required>
                                        <option name="categoria" value="" disabled selected>Seleccionar</option>
                                        <option name="categoria" value="Nacional">Nacional</option>
                                        <option name="categoria" value="Internacional">Internacional</option>
                                    </select>
                                </div>
                                <!-- Área de conocimiento -->
                                <div class="col-md-4">
                                    <label class="form-label" for="linea_inv">{{ __('Área de conocimiento *')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <select class="form-control" name="linea_inv" required>
                                        <option name="linea_inv" value="" disabled selected>Seleccionar</option>
                                        <option name="linea_inv" value="ÁREA I. Físico-Matemáticas y Ciencias de la Tierra">ÁREA I. Físico-Matemáticas y Ciencias de la Tierra</option>
                                        <option name="linea_inv" value="ÁREA II. Biología y Química">ÁREA II. Biología y Química</option>
                                        <option name="linea_inv" value="ÁREA III. Medicina y Ciencias de la Salud">ÁREA III. Medicina y Ciencias de la Salud </option>
                                        <option name="linea_inv" value="ÁREA IV. Ciencias de la Conducta y la Educación">ÁREA IV. Ciencias de la Conducta y la Educación</option>
                                        <option name="linea_inv" value="ÁREA V. Humanidades">ÁREA V. Humanidades</option>
                                        <option name="linea_inv" value="ÁREA VI. Ciencias Sociales">ÁREA VI. Ciencias Sociales</option>
                                        <option name="linea_inv" value="ÁREA VII. Ciencias de la Agricultura, Agropecuarias, Forestales y de Ecosistemas">ÁREA VII. Ciencias de la Agricultura, Agropecuarias, Forestales y de Ecosistemas</option>
                                        <option name="linea_inv" value="ÁREA VIII. Ingenierías y Desarrollo Tecnológico">ÁREA VIII. Ingenierías y Desarrollo Tecnológico</option>
                                        <option name="linea_inv" value="ÁREA IX. Multidisciplinaria">ÁREA IX. Multidisciplinaria</option>
                                    </select>
                                </div>
                                <!-- Institución ligada -->
                                <div class="col-md-4">
                                    <label class="form-label" for="institucion_ligada">{{ __('Institución ligada * ')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input class="form-control" type="text" name="institucion_ligada" id="institucion_ligada" required>
                                </div>
                                <!-- Descripción -->
                                <div class="col-md-4">
                                    <label class="form-label" for="descripcion">{{ __('Descripción *')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
                                </div>
                                <!-- Documentación -->
                                <div class="col-md-4">
                                    <label class="form-label" for="documento">{{ __('Documentación *')}}</label>
                                    <div class="tooltipUNO">
                                        <div class="iconUNO">?</div>
                                        <div class="tooltiptextUNO">Asegurate de adjuntar el archivo correcto. ¡No se podrá editar!</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input class="form-control" type="file" name="documento" id="documento" onchange="validarDocumento(event)" required>
                                </div>
                                <script>
                                    function validarDocumento(event) {
                                        const input = event.target;
                                        const file = input.files[0];
                                        const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

                                        if (!allowedTypes.includes(file.type)) {
                                            alert('Solo se permiten archivos de documentos (PDF, DOC, DOCX, XLS, XLSX).');
                                            input.value = '';
                                        }
                                    }
                                </script>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--Modal mensajes-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Mensajes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Mensajes recibidos
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        @foreach (Auth::user()->mensajesRecibidos as $mensaje)
                                        <hr>
                                        <p>{{ $mensaje->mensaje }}</p>
                                        @foreach(Auth::user()->nodos as $nodo)
                                        @if($mensaje->nodo_id == $nodo->id)
                                        <form action="{{ route('aceptarSolicitud', ['solicitudId' => $mensaje->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Aceptar solicitud</button>
                                        </form>
                                        @elseif($mensaje->id_user_destinatario == Auth::user()->id)
                                        
                                        <form action="{{ route('aceptarInvitacion', ['mensajeId' => $mensaje->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Aceptar invitación</button>
                                            <a href="/NodosComunidad" class="btn btn-success">Ver detalles</a>
                                        </form>
                                        @endif



                                        <hr>
                                        @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Mensajes enviados
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        @foreach (Auth::user()->mensajes as $mensaje)
                                        <hr>
                                        <p>{{ $mensaje->mensaje }}</p>
                                        <hr>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

    </main>

    @include('layouts/footer')

    <!-- Include Bootstrap JS and Popper.js before closing body tag -->
    <!-- Asegúrate de incluir estas versiones específicas de Popper.js y jQuery para Bootstrap 5 -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script>
        function showTab(tabId) {
            // Oculta todas las tabs
            var tabs = document.getElementsByClassName('tabs-producciones');
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove('active');
            }
            // Muestra la tab actual
            document.getElementById('tab' + tabId).classList.add('active');
            // Actualiza el estilo de la pestaña activa
            var navLinks = document.getElementsByClassName('nav-link');
            for (var i = 0; i < navLinks.length; i++) {
                navLinks[i].classList.remove('active');
            }
            document.querySelector('[onclick="showTab(\'' + tabId + '\')"]').classList.add('active');
        }
        //script modal 
        $(document).ready(function() {
            $("#btnAbrirModalProduccion").click(function() {
                $("#Modal-crear-produccion").modal();
            });
        });
        //modal de nodos
        $(document).ready(function() {
            $("#btnAbrirModalnodo").click(function() {
                $("#Modal-crear-nodo").modal();
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Función para realizar postulación
        document.getElementById('botonPostulacion').addEventListener('click', function(event) {
            // Prevenir la acción predeterminada del enlace
            event.preventDefault();

            Swal.fire({
                title: "Enviar postulación",
                text: "Al seleccionar el botón de generar, se enviará su postulación para ser revisada por el administrador del sistema.",
                icon: "warning",
                iconColor: '#bc955b',
                showCancelButton: true,
                confirmButtonColor: "#bc955b",
                cancelButtonColor: "#d33",
                confirmButtonText: "Enviar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Obtener la URL del enlace y redireccionar al usuario
                    const url = document.getElementById('ruta').getAttribute('href');
                    window.location.href = url;

                    // Mostrar otra alerta SweetAlert2 después de la redirección
                    Swal.fire({
                        title: "¡Postulación enviada con éxito!",
                        text: "En breve se descarga una copia de su postulación.",
                        icon: "success",
                        iconColor: '#bc955b',
                        confirmButtonText: 'Aceptar',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        }
                    });
                }
            });
        });

        //Función para autenticar correo electronico
        function verificarMail() {
            Swal.fire({
                title: "<strong>Autenticación de correo electrónico</strong>",
                icon: "info",
                iconColor: '#bc955b',
                html: `<b>Se enviará un correo de verificación para confirmar la validez de la dirección. Esto garantiza la seguridad y confianza en las comunicaciones.</b> <br> <br>
                    <a href="/verificar-Correo" class="btn btn-primary">Enviar</a> <br>`,
                showConfirmButton: false,
                showCloseButton: true,

            });
        }

        function VerAyuda() {
            Swal.fire({
                title: "<strong>Ayuda</strong>",
                icon: "info",
                html: `<ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="#"> Preguntas frecuentes </a></li>
                <li class="list-group-item"><a href="#"> Manual de Usuario </a></li>
                <li class="list-group-item"><a href="#"> Contacto </a></li>`,
                showConfirmButton: false,
                showCloseButton: true,


            });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.get('/instituciones', function(data) {
                var opciones = '';
                data.forEach(function(institucion) {
                    opciones += '<option value="' + institucion + '">';
                });
                $('#institucion_ligada').attr('list', 'nombre');
                $('#institucion_ligada').after('<datalist id="nombre">' + opciones + '</datalist>');
            });
        });
    </script>

    <script>
        // Lista de países
        var paises = [
            "Afganistán",
            "Albania",
            "Alemania",
            "Andorra",
            "Angola",
            "Antigua y Barbuda",
            "Arabia Saudita",
            "Argelia",
            "Argentina",
            "Armenia",
            "Australia",
            "Austria",
            "Azerbaiyán",
            "Bahamas",
            "Bangladés",
            "Barbados",
            "Baréin",
            "Bélgica",
            "Belice",
            "Benín",
            "Bielorrusia",
            "Birmania",
            "Bolivia",
            "Bosnia y Herzegovina",
            "Botsuana",
            "Brasil",
            "Brunéi",
            "Bulgaria",
            "Burkina Faso",
            "Burundi",
            "Bután",
            "Cabo Verde",
            "Camboya",
            "Camerún",
            "Canadá",
            "Catar",
            "Chad",
            "Chile",
            "China",
            "Chipre",
            "Ciudad del Vaticano",
            "Colombia",
            "Comoras",
            "Corea del Norte",
            "Corea del Sur",
            "Costa de Marfil",
            "Costa Rica",
            "Croacia",
            "Cuba",
            "Dinamarca",
            "Dominica",
            "Ecuador",
            "Egipto",
            "El Salvador",
            "Emiratos Árabes Unidos",
            "Eritrea",
            "Eslovaquia",
            "Eslovenia",
            "España",
            "Estados Unidos",
            "Estonia",
            "Etiopía",
            "Filipinas",
            "Finlandia",
            "Fiyi",
            "Francia",
            "Gabón",
            "Gambia",
            "Georgia",
            "Ghana",
            "Granada",
            "Grecia",
            "Guatemala",
            "Guyana",
            "Guinea",
            "Guinea ecuatorial",
            "Guinea-Bisáu",
            "Haití",
            "Honduras",
            "Hungría",
            "India",
            "Indonesia",
            "Irak",
            "Irán",
            "Irlanda",
            "Islandia",
            "Islas Marshall",
            "Islas Salomón",
            "Israel",
            "Italia",
            "Jamaica",
            "Japón",
            "Jordania",
            "Kazajistán",
            "Kenia",
            "Kirguistán",
            "Kiribati",
            "Kuwait",
            "Laos",
            "Lesoto",
            "Letonia",
            "Líbano",
            "Liberia",
            "Libia",
            "Liechtenstein",
            "Lituania",
            "Luxemburgo",
            "Macedonia del Norte",
            "Madagascar",
            "Malasia",
            "Malaui",
            "Maldivas",
            "Maldivas",
            "Malta",
            "Marruecos",
            "Mauricio",
            "Mauritania",
            "México",
            "Micronesia",
            "Moldavia",
            "Mónaco",
            "Mongolia",
            "Montenegro",
            "Mozambique",
            "Namibia",
            "Nauru",
            "Nepal",
            "Nicaragua",
            "Níger",
            "Nigeria",
            "Noruega",
            "Nueva Zelanda",
            "Omán",
            "Países Bajos",
            "Pakistán",
            "Palaos",
            "Panamá",
            "Papúa Nueva Guinea",
            "Paraguay",
            "Perú",
            "Polonia",
            "Portugal",
            "Reino Unido",
            "República Centroafricana",
            "República Checa",
            "República del Congo",
            "República Democrática del Congo",
            "República Dominicana",
            "República Sudafricana",
            "Ruanda",
            "Rumanía",
            "Rusia",
            "Samoa",
            "San Cristóbal y Nieves",
            "San Marino",
            "San Vicente y las Granadinas",
            "Santa Lucía",
            "Santo Tomé y Príncipe",
            "Senegal",
            "Serbia",
            "Seychelles",
            "Sierra Leona",
            "Singapur",
            "Siria",
            "Somalia",
            "Sri Lanka",
            "Suazilandia",
            "Sudán",
            "Sudán del Sur",
            "Suecia",
            "Suiza",
            "Surinam",
            "Tailandia",
            "Tanzania",
            "Tayikistán",
            "Timor Oriental",
            "Togo",
            "Tonga",
            "Trinidad y Tobago",
            "Túnez",
            "Turkmenistán",
            "Turquía",
            "Tuvalu",
            "Ucrania",
            "Uganda",
            "Uruguay",
            "Uzbekistán",
            "Vanuatu",
            "Venezuela",
            "Vietnam",
            "Yemen",
            "Yibuti",
            "Zambia",
            "Zimbabue",
            // Agrega más países según sea necesario
        ];

        // Función para mostrar la lista de países
        function mostrarPaises() {
            var input = document.getElementById('paisInput');
            input.setAttribute('list', 'lista-paises');

            var datalist = document.createElement('datalist');
            datalist.id = 'lista-paises';

            paises.forEach(function(pais) {
                var option = document.createElement('option');
                option.value = pais;
                datalist.appendChild(option);
            });

            input.parentNode.appendChild(datalist);
        }

        // Llama a la función para mostrar los países
        mostrarPaises();
    </script>
    <script>
        // Obtener la fecha actual del sistema
        var fechaActual = new Date();

        // Formatear la fecha en el formato adecuado para el campo de entrada
        var formattedDate = fechaActual.toISOString().split('T')[0];

        // Establecer el valor del campo de entrada como la fecha actual
        document.getElementById('fecha-input').value = formattedDate;
        document.getElementById('#fecha-input').value = new Date().toDateInputValue();
    </script>

    <script>
        // Seleccionar los elementos relevantes
        const radioSi = document.querySelector('input[value="si"]');
        const radioNo = document.querySelector('input[value="no"]');
        const fileInput = document.querySelector('input[name="evidenciaSni"]');

        // Función para habilitar o deshabilitar el input de archivo basado en la selección del radio
        function toggleFileInput() {
            if (radioSi.checked) {
                fileInput.removeAttribute('disabled');
            } else {
                fileInput.setAttribute('disabled', 'disabled');
            }
        }

        // Agregar un evento de cambio a los radios para llamar a la función
        radioSi.addEventListener('change', toggleFileInput);
        radioNo.addEventListener('change', toggleFileInput);

        // Llamar a la función al inicio para asegurar que el estado sea correcto
        toggleFileInput();
    </script>
    @if (session('correo'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        //Alerta de correo enviado
        Swal.fire({
            icon: "success",
            title: "Correo enviado con éxito.",
            showConfirmButton: false,
            timer: 2500
        });
    </script>
    @endif


</body>

</html>