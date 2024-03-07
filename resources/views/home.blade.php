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
                    <h3>Datos generales</h3>&nbsp<!-- espacio en blanco -->
                    <h3>|</h3>&nbsp
                    <h3>{{ Auth::user()->name }}</h3>
                </div>
                
                @if(Auth::user()->verificacion == 'en proceso') 
                <a style="display: none;" class="btn btn-primary" id="ruta" href="/generate-pdf">Generar postulación</a>
                <button class="btn btn-primary" id="botonPostulacion">Enviar postulación</button>
                
                <!-- Otros campos de la postulación si es necesario -->
                @elseif(Auth::user()->verificacion == 'ninguno')
                <a href="/verificar-Correo" class="btn btn-secondary">Verificar correo</a>
                
                @endif
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
                                    <input type="file" name="evidenciaGrado" accept=".pdf" placeholder="Seleccionar archivo PDF" required/>
                                </div>
                            </div>
                            <!-- Pertenece al SNI -->
                            <div class="row form-outline mb-4">
                                <div class="col-md-4">
                                    <label class="form-label" for="pertenece">¿Pertenece al SNI?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="radio"  name="pertenece" autocomplete="off" value="si" required>
                                    <label class="btn" for="pertenece">Sí</label>
                                    <input type="radio"  name="pertenece" autocomplete="off" value="no" required>
                                    <label class="btn" for="pertenece">No</label>
                                </div>
                            </div>
                            <!-- Evidencia de SNI -->
                            <div class="row form-outline mb-4">
                                <div class="col-md-4">
                                    <label class="form-label" for="evidenciaSni">Evidencia SNI </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" name="evidenciaSni" accept=".pdf" placeholder="Seleccionar archivo PDF" required/>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>

                <!-- Produccion -->
                <div class="card mb-3">
                    <div class="card-header" data-bs-toggle="collapse" href="#produccion">
                        Mis producciones
                    </div>
                    <div class="card-body collapse" id="produccion">
                        <div class="nav-producciones">
                            <table>
                                <thead>
                                    <tr>
                                        <th><p href="#" class="btn btn-primary" id="btnAbrirModalProduccion" data-bs-toggle="modal" data-bs-target="#Modal-crear-produccion">Crear</p></th>
                                        <th><a class="btn btn-primary" href="/Producciones/listaProducciones">Mis Producciones</a></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    <!--<div class="card-body collapse" id="produccion">
                        <div id="tab5" class="tabs-producciones active">
                            <table class="table contenido produccion">
                                <thead>
                                    <tr>
                                        <th>Tipo:</th>
                                        <th>Evidencia:</th>
                                        <th>Autores:</th>
                                        <th>Titulo:</th>
                                        <th>Descripción:</th>
                                        <th>Pais:</th>
                                        <th>Año:</th>
                                        <th>Proposito:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Bases de Datos</td>
                                        <td>Nacional</td>
                                        <td>Dr. Ana García</td>
                                        <td>Ing. Carlos Martínez</td>
                                        <td>Este estudio examina los desarrollos más recientes en la eficiencia de celdas solares, al combinar los principios de nanotecnología, química y física aplicada. Los autores, con experiencia en sus respectivos campos, exploran la mejora de la conversión fotovoltaica y la reducción de pérdidas energéticas.</td>
                                        <td>Mexico</td>
                                        <td>2024</td>
                                        <td>Creacion</td>
                                        <td>
                                            <a href="#" class="btn btn-secondary">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-danger">
                                                <i class="bi bi-trash3-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>-->
                    
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
                                        <th><p class="btn btn-primary" id="btnAbrirModalProduccion" data-bs-toggle="modal" data-bs-target="#Modal-crear-nodo" class="bi bi-plus-circle-fill">Crear</p></th>
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
                                    function validarDocumento(event)
                                    {
                                        const input = event.target;
                                        const file = input.files[0];
                                        const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
                                        
                                        if (!allowedTypes.includes(file.type))
                                        {
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
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="pais">{{ __('País *')}}</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control" name="pais" type="text" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="year">{{ __('Fecha *')}}</label>
                                    </div>
                                    <div class="col-md-9 mb-3">
                                        <input class="form-control" name="year" type="month" min="1900" max="2099" step="1" required />
                                    </div>
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
                                    <label class="form-label" for="lider">{{ __('Lider*')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input class="form-control" id="lider" name="lider" type="text" required>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="colaboradores">{{ __('Colaboradores*')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input class="form-control" id="colaboradores" name="colaboradores" type="text" required>
                                </div>
                            </div>


                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="linea_inv">{{ __('Área de conocimiento*')}}</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="linea_inv" required>
                                        <option name="linea_inv" disabled selected>Seleccionar</option>
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
                                    <input class="form-control" type="file" name="documento" id="documento"  onchange="validarDocumento(event)" required>
                                </div>
                                <script>
                                    function validarDocumento(event) 
                                    {
                                        const input = event.target;
                                        const file = input.files[0];
                                        const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
                                        
                                        if (!allowedTypes.includes(file.type)) 
                                        {
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
        // Asociar un evento de clic al botón
        document.getElementById('botonPostulacion').addEventListener('click', function (event) {
        // Prevenir la acción predeterminada del enlace
        event.preventDefault();

        // Mostrar una alerta SweetAlert2
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
    </script>

</body>
</html>