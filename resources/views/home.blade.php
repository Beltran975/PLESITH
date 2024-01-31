<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('asset/home.css') }}">        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <title>{{ Auth::user()->name }} | PLESITH</title>
    </head>
    <body>
        @include('layouts/headregob')
        @include('layouts/header-nav')
        <main class="page">
            <div class="content">
                <div class="green-box">
                    
                    <div class="titulo row d-flex  mb-3">
                        <h3>Datos Generales</h3>
                        <h3>|</h3>
                        <h3>{{ Auth::user()->name }}</h3>
                    </div>
                    <hr class="hr-gob" >
                    
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
                                        <label class="form-label" for="lineaInv">Línea de investigación</label>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-md-8">
                                        <select class="form-select" name="lineaInv">
                                            <option name="lineaInv" value="" disabled selected>Tipo de línea de investigación</option>
                                            <option name="lineaInv" value="Tecnología">Tecnología</option>
                                            <option name="lineaInv" value="Ciencia">Ciencia</option>
                                            <option name="lineaInv" value="Filosofía">Filosofía</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Grado Academico -->
                                <div class="row form-outline mb-4">
                                    <div class="col-md-4">
                                        <label class="form-label" for="grado">Grado académico</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="grado" class="form-control" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" required/>
                                    </div>
                                </div>
                                <!-- Evidencia Grado Academico -->
                                <div class="row form-outline mb-4">
                                    <div class="col-md-4">
                                        <label class="form-label" for="evidenciaGrado">Evidencia del del grado académico </label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" name="evidenciaGrado" accept=".pdf" placeholder="Seleccionar archivo PDF"/>
                                    </div>
                                </div>
                                <!-- Pertenece al SNI -->
                                <div class="row form-outline mb-4">
                                    <div class="col-md-4">
                                        <label class="form-label" for="pertenece">¿Pertenece al SNI?</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="radio" class="btn-check" name="pertenece" autocomplete="off" value="si">
                                        <label class="btn" for="pertenece">Sí</label>
                                        <input type="radio" class="btn-check" name="pertenece" autocomplete="off" value="no">
                                        <label class="btn" for="pertenece">No</label>
                                    </div>
                                </div>
                                <!-- Evidencia de SNI -->
                                <div class="row form-outline mb-4">
                                    <div class="col-md-4">
                                        <label class="form-label" for="evidenciaSni">Evidencia SNI </label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" name="evidenciaSni" accept=".pdf" placeholder="Seleccionar archivo PDF"/>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Produccion -->
                    <div class="card mb-3">
                        <div class="card-header" data-bs-toggle="collapse" href="#produccion">
                            Producción
                        </div>
                        <div class="card-body collapse" id="produccion">
                            <div class="nav-producciones">
                                <ul class="nav">
                                    <li class="nav-link" onclick="showTab('1')"><a href="#">1</a></li>
                                    <li class="nav-link" onclick="showTab('2')"><a href="#">2</a></li>
                                    <li class="nav-link" onclick="showTab('3')"><a href="#">3</a></li>
                                    <li class="nav-link" onclick="showTab('4')"><a href="#">4</a></li>
                                </ul>
                                <!--Botones de CRUD-->
                                <div class="nav-crud">
                                    <!--Boton crear produccion-->
                                    <a href="#" class="btn btn-primary" id="btnAbrirModalProduccion" data-bs-toggle="modal" data-bs-target="#Modal-crear-produccion">
                                        <i class="bi bi-plus-circle-fill"></i>
                                    </a>
                                    <!--Boton edit-->
                                    <a href="#" class="btn btn-secondary">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <!--Boton delete-->
                                    <a href="#" class="btn btn-danger">
                                        <i class="bi bi-trash3-fill"></i>
                                    </a>
                                </div>
                            </div>
                            <div id="tab1" class="tabs-producciones active">
                                include('layouts.listaProducciones')
                            </div>
                            <div id="tab2" class="tabs-producciones">
                                <!-- Contenido del tab 2 -->
                                <p>Contenido del Tab 2</p>
                            </div>
                            <div id="tab3" class="tabs-producciones">
                                <!-- Contenido del tab 3 -->
                                <p>Contenido del Tab 3</p>
                            </div>
                            <div id="tab4" class="tabs-producciones">
                                <!-- Contenido del tab 4 -->
                                <p>Contenido del Tab 4</p>
                            </div>
                        </div>
                    </div>

                    <!-- Nodos de colaboración -->
                    <div class="card mb-3">
                        <div class="card-header" data-bs-toggle="collapse" href="#nodos">
                            Nodos de colaboración
                        </div>
                        <div class="card-body collapse" id="nodos">
                            <div class="nav-producciones">
                                <ul class="nav">
                                    <li class="nav-link" onclick="showTab('5')"><a href="#">1</a></li>
                                    <li class="nav-link" onclick="showTab('6')"><a href="#">2</a></li>
                                    <li class="nav-link" onclick="showTab('7')"><a href="#">3</a></li>
                                    <li class="nav-link" onclick="showTab('8')"><a href="#">4</a></li>
                                </ul>
                                <!--Botones de CRUD-->
                                <div class="nav-crud">
                                    <!--Boton crear nodo-->
                                    <a href="#Modal-crear-nodo" class="btn btn-primary" id="btnAbrirModalProduccion" data-bs-toggle="modal" data-bs-target="#Modal-crear-nodo">
                                        <i class="bi bi-plus-circle-fill"></i>
                                    </a>
                                    <!--Boton edit-->
                                    <a href="#" class="btn btn-secondary">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <!---->
                                    <a href="#" class="btn btn-danger">
                                        <i class="bi bi-trash3-fill"></i>
                                    </a>
                                </div>
                            </div>
                            <div id="tab5" class="tabs-producciones active">
                                <table class="table contenido produccion">
                                    <tbody>
                                        <tr>
                                            <th class="rotated-header">Tema de la investigación:</th>
                                            <td class="contenido-produccion">Bases de datos</td>
                                        </tr>
                                        <tr>
                                            <th class="rotated-header">Categoría:</th>
                                            <td class="contenido-produccion">Nacional</td>
                                        </tr>
                                        <tr>
                                            <th class="rotated-header">Líder:</th>
                                            <td class="contenido-produccion">Dr. Ana García</td>
                                        </tr>
                                        <tr>
                                            <th class="rotated-header">Colaboradores:</th>
                                            <td class="contenido-produccion">Ing. Carlos Martínez</td>
                                        </tr>
                                        <tr>
                                            <th class="rotated-header">Descripción:</th>
                                            <td class="contenido-produccion">Este estudio examina los desarrollos más recientes en la eficiencia de celdas solares, combinando principios de nanotecnología, química y física aplicada. Los autores, con experiencia en sus respectivos campos, exploran la mejora de la conversión fotovoltaica y la reducción de pérdidas energéticas.</td>
                                        </tr>
                                        <tr>
                                            <th class="rotated-header">Documentación:</th>
                                            <td class="contenido-produccion"><a href="#">ejemplo.pdf</a></td>
                                        </tr>                
                                    </tbody>
                                </table>
                            </div>
                            <div id="tab6" class="tabs-producciones">
                                <!-- Contenido del tab 2 -->
                                <p>Contenido del Tab 2</p>
                            </div>
                            <div id="tab7" class="tabs-producciones">
                                <!-- Contenido del tab 3 -->
                                <p>Contenido del Tab 3</p>
                            </div>
                            <div id="tab8" class="tabs-producciones">
                                <!-- Contenido del tab 4 -->
                                <p>Contenido del Tab 4</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row d-flex justify-content-center mb-3">
                <button type="submit" class="btn btn-primary btn-sm " name="accion" value="descargar">Descargar</button>
                <button type="button" class="btn btn-primary btn-sm ml-2">Guardar</button>
            </div>
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
                                            <option name="tipo" value="" disabled selected>Seleccionar tipo</option>
                                            <option name="tipo" value="Libros o capitulos de libro">Libros o capitulos de libro</option>
                                            <option name="tipo" value="Articulos arbitrados y articulos indexados">Articulos arbitrados y articulos indexados</option>
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
                                        <input class="form-control" type="file" name="evidencia" required>
                                    </div>                                                
                                </div>
                                <div class="row justify-content-center mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label" for="autores">{{ __('Autor (es) *')}}</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control" name="autores" type="text" required>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label" for="titulo">{{ __('Titulo *')}}</label>
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
                                            <label class="form-label" for="pais">{{ __('Pais *')}}</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control" name="pais" type="text" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label" for="year">{{ __('Año *')}}</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control" name="year" type="text" min="1900" max="2099" step="1" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label" for="proposito">{{ __('Propósito *')}}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="proposito" required>
                                            <option name="proposito" value="" disabled selected>Seleccionar propósito</option>
                                            <option name="proposito" value="Proposito 1">Proposito 1</option>
                                            <option name="proposito" value="Proposito 2">Proposito 2</option>
                                            <option name="proposito" value="Proposito 3">Proposito 3</option>
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
                            <h4 class="modal-title">Nodos de colaboración</h4>
                        </div>
                        <div class="modal-body">
                            <form action="post">
                                <div class="row justify-content-center mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label" for="tema">{{ __('Tema de la investigación*')}}</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input class="form-control" id="tema" name="tema" type="text" required>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label" for="categoria">{{ __('Categoria*') }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="categoria" id="categoria"required>
                                            <option name="categoria" value="" disabled selected>Seleccionar</option>
                                            <option name="categoria" value="opcion1">Nacional</option>
                                            <option name="categoria" value="opcion2">Internacional</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label" for="linea">{{ __('Línea de investigación*')}}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="linea" id="linea">
                                    </div>                                                
                                </div>
                                <div class="row justify-content-center mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label" for="InstitucionLigada">{{ __('Institución ligada* ')}}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="InstitucionLigada" id="InstitucionLigada"required>
                                            <option name="InstitucionLigada" value="" disabled selected>Seleccionar</option>
                                            <option name="InstitucionLigada" value="opcion1">Institución Ligada 1</option>
                                            <option name="InstitucionLigada" value="opcion2">Institución Ligada 2</option>
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
                                        <label class="form-label" for="pais">{{ __('Documentación:')}}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="file" name="evidencia" id="evidencia">
                                    </div> 
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Guardar</button>
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
        $(document).ready(function(){
        $("#btnAbrirModalProduccion").click(function(){
        $("#Modal-crear-produccion").modal();
        });
        });
        //modal de nodos
        $(document).ready(function(){
        $("#btnAbrirModalnodo").click(function(){
        $("#Modal-crear-nodo").modal();
        });
        });
        </script>
    </body>
</html>