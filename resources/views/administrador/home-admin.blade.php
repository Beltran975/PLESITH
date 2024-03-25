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
            <section class="admin seccion-obscura">
                <div class="row blanco">
                    <div class="col blanco"></div>
                    <div class="col obscuro">
                        <div class="titulo row d-flex  mb-3">
                            <h3>{{ __('Bienvenido administrador') }}</h3>
                        </div>
                        <hr class="hr-gob">
                        <!--Administrador-->
                        <div class="card-group">
                            <!-- postulaciones plesith -->
                            <div class="card">
                                <div class="card-header home-admin">
                                    <h5 class="card-title home-admin">Postulaciones PLESITH</h5>
                                </div>
                                <div class="card-body">
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
                            <div class="card">
                                <div class="card-header home-admin">
                                    <h5 class="card-title home-admin">Producciones y Nodos de colaboración</h5>
                                </div>
                                <div class="card-body">
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
                            <div class="card">
                                <div class="card-header home-admin">
                                    <h5 class="card-title home-admin">Gestión Bibliotech e Infotech</h5>
                                </div>
                                <div class="card-body">
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
            </section>
        </main>
    </body>
</html>