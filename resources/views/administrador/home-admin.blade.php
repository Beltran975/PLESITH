<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('asset/home-admin.css') }}">
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Administrador | PLESITH</title>
    </head>
    <body class="body">
        @include('layouts/datos-gob')
        @include('layouts.nav-admin')
        <main class="main">
            <img src="https://lajornadahidalgo.com/wp-content/uploads/2022/08/CITNOVA-SINCROTON.jpg" alt="img">
            <div class="row">
                <div class="col invisible"></div>
                <div class="col obscuro">
                    <div class="titulo row d-flex  mb-3">
                        <h1>{{ __('Bienvenido administrador') }}</h1>
                    </div>
                    <hr class="hr-gob">
                    <!--Administrador-->
                    <div class="card-group modal-body">
                        <!-- postulaciones plesith -->
                        <div class="card home-admin">
                            <div class="card-header home-admin">
                                <h2 class="card-title home-admin">Postulaciones PLESITH</h2>
                            </div>
                            <div class="card-body home-admin">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Número de usuarios : 
                                        <span>{{ $userCount }}</span>
                                    </li>
                                    <li class="list-group-item">Número de postulaciones : 
                                        <span>{{ $postulacionesCount }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- producciones y nodos -->
                        <div class="card home-admin">
                            <div class="card-header home-admin">
                                <h2 class="card-title home-admin">Producciones y Nodos de colaboración</h2>
                            </div>
                            <div class="card-body home-admin">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Número de producciones :
                                        <span>{{ $produccionesCount }}</span>
                                    </li>
                                    <li class="list-group-item">Número de nodos :
                                        <span>{{ $nodoCount }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- bibliotech e infotech -->
                        <div class="card home-admin">
                            <div class="card-header home-admin">
                                <h2 class="card-title home-admin">Gestión Bibliotech e Infotech</h2>
                            </div>
                            <div class="card-body home-admin">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Número de convocatorias (Infotech) :
                                        <span>{{ $infotechCount }}</span>
                                    </li>
                                    <li class="list-group-item">Número de publicaciones (Bibliotech) :
                                        <span>{{ $bibliotechCount }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>