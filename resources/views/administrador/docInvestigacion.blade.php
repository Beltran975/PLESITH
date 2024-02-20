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
        <title>Documentos de investigación</title>
    </head>
    <body>
    @include('layouts/headregob')
    @include('layouts/header')
        <main class="page">
            <div class="content">
                <div class="green-box">
                    <div class="titulo row d-flex  mb-3">
                        <h3>Gestión de datos PLESITH</h3>
                    </div>
                    <hr class="hr-gob" >
                    <div class="titulo row d-flex mb-3">
                        <h4>Documentos de investigación</h4>
                    </div>
                    
                    <!-- Produccion -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="bibliotech-tab" data-bs-toggle="tab" href="#produccion" data-bs-target="#bibliotech" type="button" role="tab" aria-controls="bibliotech" aria-selected="true">Bibliotech</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="infotech-tab" data-bs-toggle="tab" data-bs-target="#infotech" type="button" role="tab" aria-controls="infotech" aria-selected="false">Infotech</button>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="myTabContent">
                            <!-- bibliotech -->
                            <div class="tab-pane fade show card-body active" id="bibliotech" role="tabpanel" aria-labelledby="bibliotech-tab">
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
                                <div id="tab1" class="tabs-producciones active">
                                    <table class="table contenido produccion">
                                        <tbody>
                                            <tr>
                                                <th class="rotated-header">Título :</th>
                                                <td class="contenido-produccion">Título</td>
                                            </tr>
                                            <tr>
                                                <th class="rotated-header">Año :</th>
                                                <td class="contenido-produccion">Año</td>
                                            </tr>
                                            <tr>
                                                <th class="rotated-header">Documento :</th>
                                                <td class="contenido-produccion">Documento</td>
                                            </tr>
                                            <tr>
                                                <th class="rotated-header">Descripción:</th>
                                                <td class="contenido-produccion">Descripción</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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

                            <!-- infotech -->
                            <div class="tab-pane fade card-body" id="infotech" role="tabpanel" aria-labelledby="infotech-tab">
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
                                <div id="tab1" class="tabs-producciones active">
                                    <table class="table contenido produccion">
                                        <tbody>
                                            <tr>
                                                <th class="rotated-header">Título2 :</th>
                                                <td class="contenido-produccion">Título2</td>
                                            </tr>
                                            <tr>
                                                <th class="rotated-header">Año2 :</th>
                                                <td class="contenido-produccion">Año2</td>
                                            </tr>
                                            <tr>
                                                <th class="rotated-header">Documento2 :</th>
                                                <td class="contenido-produccion">Documento2</td>
                                            </tr>
                                            <tr>
                                                <th class="rotated-header">Descripción2:</th>
                                                <td class="contenido-produccion">Descripción2</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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
                    </div>
                </div>
            </div>
            
            <!-- Modales de edición -->
            <!--Modal con formulario de producciones-->
            <div class="modal fade" id="Modal-crear-produccion">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar</h4>
                        </div>
                        <div class="modal-body">
                            <form action="EnvioDocInves" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-center mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label" for="titulo">{{ __('Título *') }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="titulo" required>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label" for="year">{{ __('Año *')}}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" name="year" type="text" min="1900" max="2099" step="1" required />
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-2">
                                    <div class="col-md-4">
                                        <label class="form-label" for="documento">{{ __('Documento *')}}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="file" name="documento" required>
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
        </script>
    </body>
</html>