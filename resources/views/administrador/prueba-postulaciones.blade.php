<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/tabla.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>postulantes | PLESITH</title>
</head>

<body class="body">
    @include('layouts/headregob')
    @include('layouts/header')
    <main class="main">
        <img src="https://lajornadahidalgo.com/wp-content/uploads/2022/08/CITNOVA-SINCROTON.jpg" alt="img">
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
                                <th>Area de Conocimiento</th>
                                <th>Fecha de Postulación</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            @foreach ($user->postulaciones as $postulacion)
                            @if($user->postulaciones->count() > 0 && $postulacion->estatus == 'No revisado' )
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user-> programa}}</td>
                                <td>{{ $postulacion->created_at->format('H:i d/m/Y') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-list"></i></button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="../storage/postulaciones/{{ $postulacion->pdfPostulacion }}" target="_blank">Ver postulación</a>

                                            </li>
                                            <li><button class="dropdown-item" href="#" onclick="abrirModalAprobacion('{{ $user->name }}')">Aprobar postulación</button></li>
                                            <li><button class="dropdown-item" href="#" onclick="abrirModalNegacion('{{ $user->name }}')">Negar postulación</button></li>
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
                                <th>Área de Conocimiento</th>
                                <th>Estatus</th>
                                <th>Fecha de Postulación</th>
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
                                <td>{{ $postulacion->created_at->format('H:i d/m/Y') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-list"></i></button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="../storage/postulaciones/{{ $postulacion->pdfPostulacion }}" target="_blank">Ver postulación</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#aprobacion" onclick="abrirModalAprobacion('{{$user->name }}')">Aprobar postulación</a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#negacion">Negar postulación</a></li>
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
        <!--Modales de postulacion-->

        <!--Formulario de aprobación-->
        <div class="modal fade" id="aprobacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulario de Aprobación</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('postulaciones.aprobar', ['id' => $postulacion->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <p>El postulado <span id="modalTituloAprobacion"></span> Cumple con los parámetros necesarios para ser un usuario verificado dentro de la PLATAFORMA ESTATAL DE INVESTIGADORES Y TECNOLÓGOS DE HIDALGO.</p>
                            <label for="dictamenAprobar">Dictamen de Aceptación:</label>
                            <input type="file" id="dictamenAprobar" name="dictamenAprobar">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Formulario de negación-->
        <div class="modal fade" id="negacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulario de Negación</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('postulaciones.negar', ['id' => $postulacion->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <p>El postulado <span id="modalUsuarioNegar"></span> No cumple con los parámetros necesarios para ser un usuario verificado dentro de la PLATAFORMA ESTATAL DE INVESTIGADORES Y TECNOLÓGOS DE HIDALGO.</p>
                            <label for="dictamenNegar">Dictamen de Negación:</label>
                            <input type="file" id="dictamenNegar" name="dictamenNegar">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Script para manejar modales con jQuery -->
    <script>
        // Función para abrir el modal de aprobación
        function abrirModalAprobacion(nombre) {
            // Actualizar el contenido del modal con el nombre del postulante
            $('#modalTituloAprobacion').text(nombre);
            // Mostrar el modal de aprobación
            $('#aprobacion').modal('show');
        }

        // Función para abrir el modal de negación
        function abrirModalNegacion(nombre) {
            // Actualizar el contenido del modal con el nombre del postulante
            $('#modalUsuarioNegar').text(nombre);
            // Mostrar el modal de negación
            $('#negacion').modal('show');
        }
    </script>

    @include('layouts/footer')
</body>

</html>