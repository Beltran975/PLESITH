<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/tabla.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png" />
    <title>Administrador | PLESITH</title>
</head>

<body class="body">
    @include('layouts/datos-gob')

    <main class="main">
        <img src="https://lajornadahidalgo.com/wp-content/uploads/2022/08/CITNOVA-SINCROTON.jpg" alt="img">
        @include('layouts.nav-admin')
        <div class="title">
            <div class="row ml-5">
                <h3>{{ __('Postulaciones') }}</h3>
            </div>
            <hr class="hr-gob">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active " id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">No revisados</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Revisados</button>
                </li>


            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

                    <!--Tabla de "No revisados"-->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Postulante</th>
                                <th>Área de conocimiento</th>
                                <th>Fecha de postulación</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            @foreach ($user->postulaciones as $postulacion)
                            @if($user->postulaciones->count() > 0 && $postulacion->estatus == 'No revisado' )
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user-> programa}}</td>
                                <td>{{ $postulacion->created_at->format(' d/m/Y') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-list"></i></button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="/storage/postulaciones/{{ $postulacion->pdfPostulacion }}" target="_blank">Ver postulación</a>

                                            </li>
                                            <li><a class="dropdown-item" href="/administrador/postulaciones/form-aprobar/{{ $postulacion->id }}">Aprobar postulación</a></li>
                                            <li><a class="dropdown-item" href="/administrador/postulaciones/form-negar/{{$postulacion->id}}">Negar postulación</a></li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                            @endif
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <!--Tabla de "Revisados"-->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Postulante</th>
                                <th>Área de conocimiento</th>
                                <th>Estatus</th>
                                <th>Fecha de postulación</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            @foreach ($user->postulaciones as $postulacion)
                            @if($user->postulaciones->count() > 0 && $postulacion->estatus == 'Aprobado' || $postulacion->estatus == 'Negado' )
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user-> programa}}</td>
                                <td>{{ $postulacion->estatus}}</td>
                                <td>{{ $postulacion->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <div class="    btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-list"></i></button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="/storage/postulaciones/{{ $postulacion->pdfPostulacion }}" target="_blank">Ver postulación</a>
                                            </li>
                                            @if($postulacion->estatus == 'Negado')
                                            <li><a class="dropdown-item" href="/administrador/postulaciones/form-aprobar/{{ $postulacion->id }}">Aprobar postulación</a></li>
                                            @else
                                            <li><a class="dropdown-item" href="/administrador/postulaciones/form-negar/{{$postulacion->id}}">Negar postulación</a></li>
                                            @endif
                                            <li><a class="dropdown-item" href="#">Dar de baja al usuario</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Script para manejar modales con jQuery -->

</body>

</html>