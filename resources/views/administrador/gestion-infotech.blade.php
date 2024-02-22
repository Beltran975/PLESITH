<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/documentosinfo.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Administrador | PLESITH</title>
</head>

<body class="body">
    @include('layouts/datos-gob')

    <main class="main">
        <img src="https://lajornadahidalgo.com/wp-content/uploads/2022/08/CITNOVA-SINCROTON.jpg" alt="img">
        @include('layouts.nav-admin')
        <div class="title">
        <div class="row ml-5">
                <h3>{{ __('Gestión de datos PLESITH | Infotech') }}</h3>
            </div>
            <hr class="hr-gob">
            <div class="card">
                
                <div class="card-body">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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