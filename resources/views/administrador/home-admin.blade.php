<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/tabla.css') }}">
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
                <h3>{{ __('Bienvenido administrador') }}</h3>
            </div>
            <hr class="hr-gob">
            <!--cards de acciones-->
            <section class="card-group">
                <div class="card">
                    <div class="card-header">
                    <h5 class="card-title">Postulaciones PLESITH</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Número de usuarios:
                            <span>185</span>
                            </li>
                            <li class="list-group-item">Número de postulaciones:
                            <span>119</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                    <h5 class="card-title">Producciones y Nodos de colaboración</h5>
                    </div>
                    <div class="card-body">
                        
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Número de producciones:
                            <span>76</span>
                            </li>
                            <li class="list-group-item">Número de nodos:
                            <span>91</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card">
                <div class="card-header">
                        <h5 class="card-title">Gestión Bibliotech e Infotech</h5>

                        </div>
                    <div class="card-body">
                        
                        
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Número de convocatorias:
                            <span>19</span>
                            </li>
                            <li class="list-group-item">Número de publicaciones:
                            <span>21</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

    </main>


</body>

</html>