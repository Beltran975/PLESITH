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
                    <h3>Datos generales | {{ Auth::user()->name }}</h3><!-- espacio en blanco -->
                </div>
                <!--Acciones del usuario-->
                @switch(Auth::user()->tipo)
                @case('basico')
                <button onclick="verificarMail()" type="button" class="btn btn-secondary">Autenticar Correo electrónico</button>
                @break

                @case('autenticado')
                @if(Auth::user()->datos->count() > 0)
                <a style="display: none;" class="btn btn-primary" id="ruta" href="/generate-pdf">Generar postulación</a>
                <button class="btn btn-success" id="botonPostulacion">Enviar postulación <i class="bi bi-send"></i></button>
                @else
                <button disabled class="btn btn-success" id="botonPostulacion">Enviar postulación <i class="bi bi-send"></i></button>
                <br>
                <br>
                <figcaption class="blockquote-footer">
                Para completar adecuadamente su solicitud, le solicitamos que ingrese sus datos correspondientes en "Información PLESITH". Además, de manera opcional, puede agregar información sobre sus investigaciones, patentes y documentos de investigación en la sección "Mis Producciones".
                </figcaption>
                @endif
                @break

                @case('postulado')
                @case('revisado')
                @if(Auth::user()->datos->count() > 0)
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal-estatus-pos">Estatus de postulación</button>
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
                                <a href="storage/dictamenes/aprobados/{{ $postulacion->pdfDictamen}}" target="blanck_">Dictamen</a>
                                @elseif($postulacion->estatus == 'Negado')
                                <a href="storage/dictamenes/negados/{{ $postulacion->pdfDictamen}}" target="blanck_">Dictamen</a>
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
                                <a href="storage/archivos_curp/{{ Auth::user()->archivoCurp}}" target="blanck_">{{ Auth::user()->archivoCurp}}</a>
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
                                    <img src="{{ asset('storage/'.Auth::user()->image_path)}}" alt="">
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
                                    <input type="text" name="grado" class="form-control" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" required />
                                </div>
                            </div>
                            <!-- Evidencia Grado Academico -->
                            <div class="row form-outline mb-4">
                                <div class="col-md-4">
                                    <label class="form-label" for="evidenciaGrado">Evidencia del grado académico </label>
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
                                <a href="/academico/{{ $info->evidenciaSni}}" target="blanck_">{{ $info->evidenciaSni}}</a>
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
                                <a href="#" class="btn btn-primary" id="btnAbrirModalProduccion" data-bs-toggle="modal" data-bs-target="#Modal-crear-produccion"><i class="bi bi-plus-circle-fill"></i></a>
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="/Producciones/listaProducciones">Mis Producciones</a>
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
                                            <a class="btn btn-primary" id="btnAbrirModalProduccion" data-bs-toggle="modal" data-bs-target="#Modal-crear-nodo" class="bi bi-plus-circle-fill">Crear</a>
                                        </th>
                                        <th><a class="btn btn-primary" href="/nodo/listaNodos">Mis nodos creados</a></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!--<div class="row d-flex justify-content-center mb-3">
                <button type="submit" class="btn btn-primary btn-sm " name="accion" value="descargar">Descargar</button>
                <button type="button" class="btn btn-primary btn-sm ml-2">Guardar</button>
            </div>-->
        <hr>

        <!-- Modales de edición -->
        <!--Modal con formulario de producciones-->
        <div class="modal fade" id="Modal-crear-produccion">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Producción</h4>
                    </div>
                    <div class="modal-body">
                        <form action="EnvioProduccion" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="tipo">{{ __('Tipo *') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="tipo" required>
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
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="evidencia">{{ __('Evidencia *')}}</label>
                                </div>
                                <div class="col-md-6">
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
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="autores">{{ __('Autor (es) *')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input class="form-control" name="autores" type="text" required value="{{ Auth::user()->name}}">
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="titulo">{{ __('Título *')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input class="form-control" name="titulo" type="text" required>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="descripcion">{{ __('Descripción *')}}</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="descripcion" required></textarea>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="pais">{{ __('País *')}}</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" name="pais" id="paisInput" type="text" required>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="year">{{ __('Fecha *')}}</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" name="year" id="fechaInput" type="month" min="1900" max="2099" step="1" required />
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="proposito">{{ __('Propósito *')}}</label>
                                </div>
                                <div class="col-md-6">
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

        <!--Modal con formulario de nodos-->
        <div class="modal fade" id="Modal-crear-nodo">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Nodo de colaboración</h4>
                    </div>
                    <div class="modal-body">
                        <form action="EnvioNodo" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="tema_inv">{{ __('Tema de investigación*')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input class="form-control" id="tema_inv" name="tema_inv" type="text" required>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="categoria">{{ __('Categoría*') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="categoria" id="categoria" required>
                                        <option name="categoria" value="" disabled selected>Seleccionar</option>
                                        <option name="categoria" value="Nacional">Nacional</option>
                                        <option name="categoria" value="Internacional">Internacional</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="lider">{{ __('Líder*')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input class="form-control" id="lider" name="lider" type="text" value="{{ Auth::user()->name}}" required>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="colaboradores">{{ __('Colaboradores*')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input class="form-control" id="colaboradores" name="colaboradores" type="text" >
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="linea_inv">{{ __('Área de conocimiento*')}}</label>
                                </div>
                                <div class="col-md-6">
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
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="institucion_ligada">{{ __('Institución ligada* ')}}</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="institucion_ligada" id="institucion_ligada" required>
                                        <option name="institucion_ligada" value="" disabled selected>Seleccionar</option>
                                        <option name="institucion_ligada" value="CENTRO CULTURAL EUROPEO DE ESTUDIOS UNIVERSITARIOS DE HIDALGO">CENTRO CULTURAL EUROPEO DE ESTUDIOS UNIVERSITARIOS DE HIDALGO</option>
                                        <option name="institucion_ligada" value="CENTRO DE ESTUDIO VALORES CON LIBERTAD">CENTRO DE ESTUDIO VALORES CON LIBERTAD, "CEVAL"</option>
                                        <option name="institucion_ligada" value="CENTRO DE ESTUDIOS SUPERIORES ANTARES">CENTRO DE ESTUDIOS SUPERIORES ANTARES</option>
                                        <option name="institucion_ligada" value="CENTRO DE ESTUDIOS SUPERIORES EN GASTRONOMIA Y TURISMO">CENTRO DE ESTUDIOS SUPERIORES EN GASTRONOMÍA Y TURISMO</option>
                                        <option name="institucion_ligada" value="CENTRO DE ESTUDIOS SUPERIORES IDDEA">CENTRO DE ESTUDIOS SUPERIORES IDDEA</option>
                                        <option name="institucion_ligada" value="CENTRO DE ESTUDIOS UNIVERSITARIOS DE HIDALGO">CENTRO DE ESTUDIOS UNIVERSITARIOS DE HIDALGO</option>
                                        <option name="institucion_ligada" value="CENTRO DE ESTUDIOS UNIVERSITARIOS LEONARDO DE VINCI">CENTRO DE ESTUDIOS UNIVERSITARIOS LEONARDO DE VINCI</option>
                                        <option name="institucion_ligada" value="CENTRO DE ESTUDIOS UNIVERSITARIOS MOYOCOYANI">CENTRO DE ESTUDIOS UNIVERSITARIOS MOYOCOYANI</option>
                                        <option name="institucion_ligada" value="CENTRO DE ESTUDIOS UNIVERSITARIOS VIZCAYA DE LAS AMERICAS">CENTRO DE ESTUDIOS UNIVERSITARIOS VIZCAYA DE LAS AMÉRICAS</option>
                                        <option name="institucion_ligada" value="CENTRO DE TERAPIA FAMILIAR Y DE PAREJA">CENTRO DE TERAPIA FAMILIAR Y DE PAREJA</option>
                                        <option name="institucion_ligada" value="CENTRO HIDALGUENSE DE ESTUDIOS SUPERIORES">CENTRO HIDALGUENSE DE ESTUDIOS SUPERIORES</option>
                                        <option name="institucion_ligada" value="CENTRO HUMANISTA DE INVESTIGACION Y DESARROLLO MULTIDISCIPLINARIO">CENTRO HUMANISTA DE INVESTIGACIÓN Y DESARROLLO MULTIDISCIPLINARIO</option>
                                        <option name="institucion_ligada" value="CENTRO REGIONAL DE EDUCACION NORMAL BENITO JUAREZ">CENTRO REGIONAL DE EDUCACIÓN NORMAL BENITO JUÁREZ</option>
                                        <option name="institucion_ligada" value="CENTRO UNIVERSITARIO ALLENDE">CENTRO UNIVERSITARIO ALLENDE</option>
                                        <option name="institucion_ligada" value="CENTRO UNIVERSITARIO CONTINENTAL">CENTRO UNIVERSITARIO CONTINENTAL</option>
                                        <option name="institucion_ligada" value="CENTRO UNIVERSITARIO DE DESARROLLO INTELECTUAL">CENTRO UNIVERSITARIO DE DESARROLLO INTELECTUAL</option>
                                        <option name="institucion_ligada" value="CENTRO UNIVERSITARIO DE EDUCACION A DISTANCIA">CENTRO UNIVERSITARIO DE EDUCACIÓN A DISTANCIA</option>
                                        <option name="institucion_ligada" value="CENTRO UNIVERSITARIO DE ESTUDIOS HANS GROSS">CENTRO UNIVERSITARIO DE ESTUDIOS HANS GROSS</option>
                                        <option name="institucion_ligada" value="CENTRO UNIVERSITARIO DE ESTUDIOS SUPERIORES DE MEXICO">CENTRO UNIVERSITARIO DE ESTUDIOS SUPERIORES DE MÉXICO</option>
                                        <option name="institucion_ligada" value="CENTRO UNIVERSITARIO DE LA CIUDAD DE MEXICO">CENTRO UNIVERSITARIO DE LA CIUDAD DE MÉXICO</option>
                                        <option name="institucion_ligada" value="CENTRO UNIVERSITARIO DEL ORIENTE DE HIDALGO">CENTRO UNIVERSITARIO DEL ORIENTE DE HIDALGO</option>
                                        <option name="institucion_ligada" value="CENTRO UNIVERSITARIO HIDALGUENSE">CENTRO UNIVERSITARIO HIDALGUENSE</option>
                                        <option name="institucion_ligada" value="CENTRO UNIVERSITARIO HIDALGUENSE A.C.">CENTRO UNIVERSITARIO HIDALGUENSE A.C.</option>
                                        <option name="institucion_ligada" value="CENTRO UNIVERSITARIO INTERAMERICANO">CENTRO UNIVERSITARIO INTERAMERICANO</option>
                                        <option name="institucion_ligada" value="CENTRO UNIVERSITARIO METROPOLITANO HIDALGO">CENTRO UNIVERSITARIO METROPOLITANO HIDALGO</option>
                                        <option name="institucion_ligada" value="CENTRO UNIVERSITARIO SIGLO XXI">CENTRO UNIVERSITARIO SIGLO XXI</option>
                                        <option name="institucion_ligada" value="CENTRO UNIVERSITARIO SIGLO XXI, SEDE ZACUALTIPAN">CENTRO UNIVERSITARIO SIGLO XXI, SEDE ZACUALTIPAN</option>
                                        <option name="institucion_ligada" value="CENTRO UNIVERSITARIO VASCO DE QUIROGA DE HUEJUTLA">CENTRO UNIVERSITARIO VASCO DE QUIROGA DE HUEJUTLA</option>
                                        <option name="institucion_ligada" value="CIRCULO DE ESTUDIOS DE LOGOTERAPIA Y ANALISIS EXISTENCIAL">CÍRCULO DE ESTUDIOS DE LOGOTERAPIA Y ANÁLISIS EXISTENCIAL</option>
                                        <option name="institucion_ligada" value="COLEGIO ANAHUAC">COLEGIO ANAHUAC</option>
                                        <option name="institucion_ligada" value="COLEGIO DE ESTUDIOS SUPERIORES HISPANOAMERICANO">COLEGIO DE ESTUDIOS SUPERIORES HISPANOAMERICANO</option>
                                        <option name="institucion_ligada" value="COLEGIO DE ORTODONCIA, ORTOPEDIA E IMPLANTOLOGIA S.C.">COLEGIO DE ORTODONCIA, ORTOPEDIA E IMPLANTOLOGÍA S.C.</option>
                                        <option name="institucion_ligada" value="COLEGIO DE TRAFICO ADUANAL SOBRECARGO Y ESPECIALIDADES">COLEGIO DE TRAFICO ADUANAL SOBRECARGO Y ESPECIALIDADES</option>
                                        <option name="institucion_ligada" value="COLEGIO LIBRE DE HIDALGO">COLEGIO LIBRE DE HIDALGO</option>
                                        <option name="institucion_ligada" value="COLEGIO PABLO LATAPI SARRE">COLEGIO PABLO LATAPI SARRE</option>
                                        <option name="institucion_ligada" value="COLEGIO REAL HIDALGO">COLEGIO REAL HIDALGO</option>
                                        <option name="institucion_ligada" value="COLEGIO SUPERIOR DE ODONTOLOGIA">COLEGIO SUPERIOR DE ODONTOLOGÍA</option>
                                        <option name="institucion_ligada" value="COMPLEJO UNIVERSITARIO GRIDEHS">COMPLEJO UNIVERSITARIO GRIDEHS</option>
                                        <option name="institucion_ligada" value="DIRECCION DE POSGRADO E INVESTIGACION">DIRECCIÓN DE POSGRADO E INVESTIGACIÓN</option>
                                        <option name="institucion_ligada" value="DIVISION EN CIENCIAS ADMINISTRATIVAS">DIVISIÓN EN CIENCIAS ADMINISTRATIVAS</option>
                                        <option name="institucion_ligada" value="EL COLEGIO DEL ESTADO DE HIDALGO">EL COLEGIO DEL ESTADO DE HIDALGO</option>
                                        <option name="institucion_ligada" value="ESCUELA BANCARIA Y COMERCIAL, CAMPUS PACHUCA">ESCUELA BANCARIA Y COMERCIAL, CAMPUS PACHUCA</option>
                                        <option name="institucion_ligada" value="ESCUELA DE ARQUITECTURA">ESCUELA DE ARQUITECTURA</option>
                                        <option name="institucion_ligada" value="ESCUELA DE ARQUITECTURA Y DISEÑO">ESCUELA DE ARQUITECTURA Y DISEÑO</option>
                                        <option name="institucion_ligada" value="ESCUELA DE DERECHO">ESCUELA DE DERECHO</option>
                                        <option name="institucion_ligada" value="ESCUELA DE ESTUDIOS SUPERIORES DE HIDALGO">ESCUELA DE ESTUDIOS SUPERIORES DE HIDALGO "EESUPH"</option>
                                        <option name="institucion_ligada" value="ESCUELA DE GASTRONOMIA">ESCUELA DE GASTRONOMÍA</option>
                                        <option name="institucion_ligada" value="ESCUELA DE INGENIERIA">ESCUELA DE INGENIERÍA</option>
                                        <option name="institucion_ligada" value="ESCUELA DE MEDICINA INTERMEDICA">ESCUELA DE MEDICINA INTERMÉDICA</option>
                                        <option name="institucion_ligada" value="ESCUELA DE MUSICA DEL ESTADO DE HIDALGO">ESCUELA DE MÚSICA DEL ESTADO DE HIDALGO</option>
                                        <option name="institucion_ligada" value="ESCUELA DE PEDAGOGIA">ESCUELA DE PEDAGOGÍA</option>
                                        <option name="institucion_ligada" value="ESCUELA JURIDICA Y FORENSE DEL SURESTE, PLANTEL PACHUCA">ESCUELA JURIDICA Y FORENSE DEL SURESTE, PLANTEL PACHUCA</option>
                                        <option name="institucion_ligada" value="ESCUELA LIBRE DE DERECHO DEL ESTADO DE HIDALGO">ESCUELA LIBRE DE DERECHO DEL ESTADO DE HIDALGO</option>
                                        <option name="institucion_ligada" value="ESCUELA NORMAL SUPERIOR DE TULANCINGO, LUIS DONALDO COLOSIO MURRIETA">ESCUELA NORMAL SUPERIOR DE TULANCINGO, LUIS DONALDO COLOSIO MURRIETA</option>
                                        <option name="institucion_ligada" value="ESCUELA NORMAL SUPERIOR DEL ESTADO DE HIDALGO, S.C.">ESCUELA NORMAL SUPERIOR DEL ESTADO DE HIDALGO, S.C.</option>
                                        <option name="institucion_ligada" value="ESCUELA NORMAL SUPERIOR MIGUEL HIDALGO">ESCUELA NORMAL SUPERIOR MIGUEL HIDALGO</option>
                                        <option name="institucion_ligada" value="ESCUELA NORMAL SUPERIOR PUBLICA DEL ESTADO DE HIDALGO">ESCUELA NORMAL SUPERIOR PUBLICA DEL ESTADO DE HIDALGO</option>
                                        <option name="institucion_ligada" value="ESCUELA SUPERIOR ATOTONILCO DE TULA">ESCUELA SUPERIOR ATOTONILCO DE TULA</option>
                                        <option name="institucion_ligada" value="ESCUELA SUPERIOR DE ACTOPAN">ESCUELA SUPERIOR DE ACTOPAN</option>
                                        <option name="institucion_ligada" value="ESCUELA SUPERIOR DE APAN">ESCUELA SUPERIOR DE APAN</option>
                                        <option name="institucion_ligada" value="ESCUELA SUPERIOR DE CIUDAD SAHAGUN">ESCUELA SUPERIOR DE CIUDAD SAHAGÚN</option>
                                        <option name="institucion_ligada" value="ESCUELA SUPERIOR DE EDUCACION ARTISTICA ARMONIARTE">ESCUELA SUPERIOR DE EDUCACIÓN ARTÍSTICA ARMONIARTE</option>
                                        <option name="institucion_ligada" value="ESCUELA SUPERIOR DE HUEJUTLA">ESCUELA SUPERIOR DE HUEJUTLA</option>
                                        <option name="institucion_ligada" value="ESCUELA SUPERIOR DE INGENIERIA MECANICA, PLANTEL PACHUCA">ESCUELA SUPERIOR DE INGENIERÍA MECÁNICA, PLANTEL PACHUCA</option>
                                        <option name="institucion_ligada" value="ESCUELA SUPERIOR DE TEPEJI DEL RIO">ESCUELA SUPERIOR DE TEPEJI DEL RIO</option>
                                        <option name="institucion_ligada" value="ESCUELA SUPERIOR DE TIZAYUCA">ESCUELA SUPERIOR DE TIZAYUCA</option>
                                        <option name="institucion_ligada" value="ESCUELA SUPERIOR DE TLAHUELILPAN">ESCUELA SUPERIOR DE TLAHUELILPAN</option>
                                        <option name="institucion_ligada" value="ESCUELA SUPERIOR DE ZIMAPAN">ESCUELA SUPERIOR DE ZIMAPÁN</option>
                                        <option name="institucion_ligada" value="FACULTAD DE CIENCIAS ADMINISTRATIVAS">FACULTAD DE CIENCIAS ADMINISTRATIVAS</option>
                                        <option name="institucion_ligada" value="FACULTAD DE CIENCIAS HUMANAS">FACULTAD DE CIENCIAS HUMANAS</option>
                                        <option name="institucion_ligada" value="FACULTAD DE DERECHO">FACULTAD DE DERECHO</option>
                                        <option name="institucion_ligada" value="INSTITUTO DE ADMINISTRACION PUBLICA DEL ESTADO DE HIDALGO A.C.">INSTITUTO DE ADMINISTRACIÓN PÚBLICA DEL ESTADO DE HIDALGO A.C.</option>
                                        <option name="institucion_ligada" value="INSTITUTO DE ARTES">INSTITUTO DE ARTES</option>
                                        <option name="institucion_ligada" value="INSTITUTO DE CIENCIAS AGROPECUARIAS">INSTITUTO DE CIENCIAS AGROPECUARIAS</option>
                                        <option name="institucion_ligada" value="INSTITUTO DE CIENCIAS BASICAS E INGENIERIA (ICBI)">INSTITUTO DE CIENCIAS BÁSICAS E INGENIERÍA (ICBI)</option>
                                        <option name="institucion_ligada" value="INSTITUTO DE CIENCIAS DE LA SALUD (ICSA)">INSTITUTO DE CIENCIAS DE LA SALUD (ICSA)</option>
                                        <option name="institucion_ligada" value="INSTITUTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS (ICEA)">INSTITUTO DE CIENCIAS ECONÓMICO ADMINISTRATIVAS (ICEA)</option>
                                        <option name="institucion_ligada" value="INSTITUTO DE CIENCIAS SOCIALES Y HUMANIDADES (ICSHU)">INSTITUTO DE CIENCIAS SOCIALES Y HUMANIDADES (ICSHU)</option>
                                        <option name="institucion_ligada" value="INSTITUTO DE CIENCIAS Y ESTUDIOS SUPERIORES DE HIDALGO">INSTITUTO DE CIENCIAS Y ESTUDIOS SUPERIORES DE HIDALGO</option>
                                        <option name="institucion_ligada" value="INSTITUTO DE CIENCIAS Y ESTUDIOS SUPERIORES DE HIDALGO, CAMPUS PACHUCA">INSTITUTO DE CIENCIAS Y ESTUDIOS SUPERIORES DE HIDALGO, CAMPUS PACHUCA</option>
                                        <option name="institucion_ligada" value="INSTITUTO DE DESARROLLO PROFESIONAL DE HIDALGO (IDEPH)">INSTITUTO DE DESARROLLO PROFESIONAL DE HIDALGO (IDEPH)</option>
                                        <option name="institucion_ligada" value="INSTITUTO DE ENSEÑANZA SUPERIOR ALFONSO CRAVIOTO">INSTITUTO DE ENSEÑANZA SUPERIOR ALFONSO CRAVIOTO</option>
                                        <option name="institucion_ligada" value="INSTITUTO DE ESTUDIOS SUPERIORES DE PROGRESO DE OBREGON, HIDALGO">INSTITUTO DE ESTUDIOS SUPERIORES DE PROGRESO DE OBREGON, HIDALGO</option>
                                        <option name="institucion_ligada" value="INSTITUTO DE ESTUDIOS SUPERIORES DEL ALTIPLANO (IESA)">INSTITUTO DE ESTUDIOS SUPERIORES DEL ALTIPLANO (IESA)</option>
                                        <option name="institucion_ligada" value="INSTITUTO DE ESTUDIOS SUPERIORES ELISE FREINET">INSTITUTO DE ESTUDIOS SUPERIORES ELISE FREINET</option>
                                        <option name="institucion_ligada" value="INSTITUTO DE ESTUDIOS SUPERIORES ISIMA PLANTEL PACHUCA">INSTITUTO DE ESTUDIOS SUPERIORES ISIMA PLANTEL PACHUCA</option>
                                        <option name="institucion_ligada" value="INSTITUTO DE ESTUDIOS SUPERIORES JOHN F. KENNEDY">INSTITUTO DE ESTUDIOS SUPERIORES JOHN F. KENNEDY</option>
                                        <option name="institucion_ligada" value="INSTITUTO DE ESTUDIOS SUPERIORES TIOZIHUATL">INSTITUTO DE ESTUDIOS SUPERIORES TIOZIHUATL</option>
                                        <option name="institucion_ligada" value="INSTITUTO DE FORMACION PROFESIONAL">INSTITUTO DE FORMACION PROFESIONAL</option>
                                        <option name="institucion_ligada" value="INSTITUTO DE POSGRADO EN PSICOTERAPIA COGNITIVO-CONDUCTUAL">INSTITUTO DE POSGRADO EN PSICOTERAPIA COGNITIVO-CONDUCTUAL</option>
                                        <option name="institucion_ligada" value="INSTITUTO GASTRONOMICO HIDALGUENSE">INSTITUTO GASTRONÓMICO HIDALGUENSE</option>
                                        <option name="institucion_ligada" value="INSTITUTO MEXICANO DE TERAPIAS BREVES">INSTITUTO MEXICANO DE TERAPIAS BREVES</option>
                                        <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO CULTURAL DE HIDALGO">INSTITUTO TECNOLOGICO CULTURAL DE HIDALGO</option>
                                        <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO DE ATITALAQUIA">INSTITUTO TECNOLÓGICO DE ATITALAQUIA</option>
                                        <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO DE EDUCACION SUPERIOR">INSTITUTO TECNOLOGICO DE EDUCACION SUPERIOR</option>
                                        <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO DE ESTUDIOS SUPERIORES DE MONTERREY CAMPUS HIDALGO">INSTITUTO TECNOLÓGICO DE ESTUDIOS SUPERIORES DE MONTERREY CAMPUS HIDALGO</option>
                                        <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO DE HUEJUTLA">INSTITUTO TECNOLÓGICO DE HUEJUTLA</option>
                                        <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO DE LA CONSTRUCCION">INSTITUTO TECNOLÓGICO DE LA CONSTRUCCIÓN</option>
                                        <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO DE PACHUCA">INSTITUTO TECNOLOGICO DE PACHUCA</option>
                                        <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO LATINOAMERICANO">INSTITUTO TECNOLÓGICO LATINOAMERICANO</option>
                                        <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO LATINOAMERICANO CAMPUS TULA">INSTITUTO TECNOLÓGICO LATINOAMERICANO CAMPUS TULA</option>
                                        <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO SUPERIOR DE HUICHAPAN">INSTITUTO TECNOLÓGICO SUPERIOR DE HUICHAPAN</option>
                                        <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO SUPERIOR DEL OCCIDENTE DEL ESTADO DE HIDALGO">INSTITUTO TECNOLÓGICO SUPERIOR DEL OCCIDENTE DEL ESTADO DE HIDALGO</option>
                                        <option name="institucion_ligada" value="INSTITUTO TECNOLOGICO SUPERIOR DEL ORIENTE DEL ESTADO DE HIDALGO (ITESA)">INSTITUTO TECNOLÓGICO SUPERIOR DEL ORIENTE DEL ESTADO DE HIDALGO (ITESA)</option>
                                        <option name="institucion_ligada" value="INSTITUTO UNIVERSITARIO CONDE DE GUEVARA">INSTITUTO UNIVERSITARIO CONDE DE GUEVARA</option>
                                        <option name="institucion_ligada" value="INSTITUTO UNIVERSITARIO DE LAS NACIONES HISPANAS">INSTITUTO UNIVERSITARIO DE LAS NACIONES HISPANAS</option>
                                        <option name="institucion_ligada" value="INSTITUTO UNIVERSITARIO DEL CENTRO DE MEXICO CAMPUS ACTOPAN">INSTITUTO UNIVERSITARIO DEL CENTRO DE MÉXICO CAMPUS ACTOPAN</option>
                                        <option name="institucion_ligada" value="INSTITUTO UNIVERSITARIO DEL CENTRO DE MEXICO CAMPUS PACHUCA">INSTITUTO UNIVERSITARIO DEL CENTRO DE MÉXICO CAMPUS PACHUCA</option>
                                        <option name="institucion_ligada" value="INSTITUTO UNIVERSITARIO DEL CENTRO DE MEXICO CAMPUS TULA DE ALLENDE">INSTITUTO UNIVERSITARIO DEL CENTRO DE MÉXICO CAMPUS TULA DE ALLENDE</option>
                                        <option name="institucion_ligada" value="NORMAL DE LAS HUASTECAS">NORMAL DE LAS HUASTECAS</option>
                                        <option name="institucion_ligada" value="NORMAL RURAL LUIS VILLARREAL">NORMAL RURAL LUIS VILLARREAL</option>
                                        <option name="institucion_ligada" value="NORMAL SIERRA HIDALGUENSE">NORMAL SIERRA HIDALGUENSE</option>
                                        <option name="institucion_ligada" value="NORMAL VALLE DEL MEZQUITAL">NORMAL VALLE DEL MEZQUITAL</option>
                                        <option name="institucion_ligada" value="SAN FELIPE DE JESUS">SAN FELIPE DE JESUS</option>
                                        <option name="institucion_ligada" value="SISTEMA DE UNIVERSIDAD VIRTUAL">SISTEMA DE UNIVERSIDAD VIRTUAL</option>
                                        <option name="institucion_ligada" value="UNIDAD ACADEMICA DE CHAPULHUACAN">UNIDAD ACADÉMICA DE CHAPULHUACÁN</option>
                                        <option name="institucion_ligada" value="UNIDAD ACADEMICA DE CUAUTEPEC">UNIDAD ACADÉMICA DE CUAUTEPEC</option>
                                        <option name="institucion_ligada" value="UNIDAD ACADEMICA DE METZTITLAN">UNIDAD ACADÉMICA DE METZTITLÁN</option>
                                        <option name="institucion_ligada" value="UNIDAD ACADEMICA DE SANTA URSULA">UNIDAD ACADEMICA DE SANTA ÚRSULA</option>
                                        <option name="institucion_ligada" value="UNIDAD ACADEMICA DE TEPETITLAN">UNIDAD ACADÉMICA DE TEPETITLÁN</option>
                                        <option name="institucion_ligada" value="UNIDAD ACADEMICA DE TEZONTEPEC DE ALDAMA">UNIDAD ACADÉMICA DE TEZONTEPEC DE ALDAMA</option>
                                        <option name="institucion_ligada" value="UNIDAD PROFESIONAL INTERDISCIPLINARIA DE INGENIERIA CAMPUS HIDALGO">UNIDAD PROFESIONAL INTERDISCIPLINARIA DE INGENIERÍA CAMPUS HIDALGO</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD CANADIENSE">UNIVERSIDAD CANADIENSE</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD CIENTIFICA LATINO AMERICANA DE HIDALGO">UNIVERSIDAD CIENTÍFICA LATINO AMERICANA DE HIDALGO</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD DEL DESARROLLO PROFESIONAL TULA DE ALLENDE">UNIVERSIDAD DEL DESARROLLO PROFESIONAL (TULA DE ALLENDE)</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD DEL DESARROLLO PROFESIONAL HUICHAPAN">UNIVERSIDAD DEL DESARROLLO PROFESIONAL (HUICHAPAN)</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD DEL FUTBOL Y CIENCIAS DEL DEPORTE">UNIVERSIDAD DEL FUTBOL Y CIENCIAS DEL DEPORTE</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD DEL NUEVO MEXICO">UNIVERSIDAD DEL NUEVO MÉXICO</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD DEL NUEVO MEXICO, CAMPUS HUICHAPAN">UNIVERSIDAD DEL NUEVO MÉXICO, CAMPUS HUICHAPAN</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD DIGITAL DEL ESTADO DE HIDALGO">UNIVERSIDAD DIGITAL DEL ESTADO DE HIDALGO</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD ETAC CAMPUS TULANCINGO">UNIVERSIDAD ETAC CAMPUS TULANCINGO</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD HUMANISTA HIDALGO">UNIVERSIDAD HUMANISTA HIDALGO</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD IBEROMEXICANA DE HIDALGO">UNIVERSIDAD IBEROMEXICANA DE HIDALGO</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD INECUH">UNIVERSIDAD INECUH</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD INTERACTIVA MILENIO">UNIVERSIDAD INTERACTIVA MILENIO</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD INTERAMERICANA PARA EL DESARROLLO">UNIVERSIDAD INTERAMERICANA PARA EL DESARROLLO</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD INTERAMERICANA PARA EL DESARROLLO, SEDE TULA">UNIVERSIDAD INTERAMERICANA PARA EL DESARROLLO, SEDE TULA</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD INTERCULTURAL DEL ESTADO DE HIDALGO">UNIVERSIDAD INTERCULTURAL DEL ESTADO DE HIDALGO</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD INTERGLOBAL">UNIVERSIDAD INTERGLOBAL</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE CENTRAL PACHUCA">UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE CENTRAL PACHUCA</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL HUEJUTLA">UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL HUEJUTLA</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL IXMIQUILPAN">UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL IXMIQUILPAN</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL JACALA">UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL JACALA</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TENANGO DE DORIA">UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TENANGO DE DORIA</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TULA DE ALLENDE">UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TULA DE ALLENDE</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD PEDAGOGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TULANCINGO">UNIVERSIDAD PEDAGÓGICA NACIONAL-HIDALGO UNIDAD 131 SEDE REGIONAL TULANCINGO</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD POLITECNICA DE FRANCISCO I. MADERO">UNIVERSIDAD POLITECNICA DE FRANCISCO I. MADERO</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD POLITECNICA DE HUEJUTLA">UNIVERSIDAD POLITÉCNICA DE HUEJUTLA</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD POLITECNICA DE LA ENERGIA">UNIVERSIDAD POLITÉCNICA DE LA ENERGÍA</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD POLITECNICA DE PACHUCA">UNIVERSIDAD POLITÉCNICA DE PACHUCA</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD POLITECNICA DE TULANCINGO">UNIVERSIDAD POLITÉCNICA DE TULANCINGO</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD POLITECNICA METROPOLITANA DE HIDALGO">UNIVERSIDAD POLITÉCNICA METROPOLITANA DE HIDALGO</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD PRIVADA DEL CENTRO">UNIVERSIDAD PRIVADA DEL CENTRO</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD TECNOLOGICA DE LA HUASTECA HIDALGUENSE">UNIVERSIDAD TECNOLÓGICA DE LA HUASTECA HIDALGUENSE</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD TECNOLOGICA DE LA SIERRA HIDALGUENSE">UNIVERSIDAD TECNOLÓGICA DE LA SIERRA HIDALGUENSE</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD TECNOLOGICA DE LA ZONA METROPOLITANA DEL VALLE DE MEXICO">UNIVERSIDAD TECNOLÓGICA DE LA ZONA METROPOLITANA DEL VALLE DE MÉXICO</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD TECNOLOGICA DE MINERAL DE LA REFORMA">UNIVERSIDAD TECNOLÓGICA DE MINERAL DE LA REFORMA</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD TECNOLOGICA DE TULANCINGO">UNIVERSIDAD TECNOLÓGICA DE TULANCINGO</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD TECNOLOGICA DEL VALLE DEL MEZQUITAL">UNIVERSIDAD TECNOLÓGICA DEL VALLE DEL MEZQUITAL</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD TECNOLOGICA INTERNACIONAL CAMPUS HIDALGO TLAXCOAPAN">UNIVERSIDAD TECNOLOGICA INTERNACIONAL CAMPUS HIDALGO TLAXCOAPAN</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD TECNOLOGICA MINERA DE ZIMAPAN">UNIVERSIDAD TECNOLÓGICA MINERA DE ZIMAPÁN</option>
                                        <option name="institucion_ligada" value="UNIVERSIDAD TECNOLOGICA TULA-TEPEJI">UNIVERSIDAD TECNOLÓGICA TULA-TEPEJI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="descripcion">{{ __('Descripción *')}}</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="documento">{{ __('Documentación:')}}</label>
                                </div>
                                <div class="col-md-6">
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
                title: "<strong>Auntenticación de correo electronico</strong>",
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
                title: "<strong>HTML <u>example</u></strong>",
                icon: "info",
                html: `
    You can use <b>bold text</b>,
    <a href="#">links</a>,
    and other HTML tags
  `,
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: `
    <i class="fa fa-thumbs-up"></i> Great!
  `,
                confirmButtonAriaLabel: "Thumbs up, great!",
                cancelButtonText: `
    <i class="fa fa-thumbs-down"></i>
  `,
                cancelButtonAriaLabel: "Thumbs down"
            });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.get('/obtener-correos', function(data) {
                var opciones = '';
                data.forEach(function(correo) {
                    opciones += '<option value="' + correo + '">';
                });
                $('#colaboradores').attr('list', 'correosList');
                $('#colaboradores').after('<datalist id="correosList">' + opciones + '</datalist>');
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
    // Función para obtener la fecha actual en el formato YYYY-MM
    function obtenerFechaActual() {
        var fecha = new Date();
        var mes = (fecha.getMonth() + 1).toString().padStart(2, '0');
        var año = fecha.getFullYear();
        return `${año}-${mes}`;
    }

    // Obtener el campo de entrada de fecha
    var fechaInput = document.getElementById('fechaInput');

    // Establecer el valor del campo de entrada como la fecha actual
    fechaInput.value = obtenerFechaActual();
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