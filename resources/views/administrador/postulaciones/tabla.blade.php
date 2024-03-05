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
                                                <a class="dropdown-item" href="../storage/postulaciones/{{ $postulacion->pdfPostulacion }}" target="_blank">Ver postulación</a>

                                            </li>
                                            <li><a class="dropdown-item" href="/administrador/postulaciones/form-aprobacion">Aprobar postulación</a></li>
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

        <div class="modal fade" id="aprobacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulario de aprobación</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('dictamen.pdf') }}" method="post">
                        @csrf
                        <input type="hidden" name="postulacion_id" value="{{ $postulacion->id }}">
                        <div class="modal-body">
                            <div class="mb-3">
                                <blockquote>
                                    <p>Para aprobar al usuario <span>{{ $user->name }}</span> favor de llenar el siguiente formulario</p>
                                </blockquote>
                            </div>
                            <div class="md-3">
                                <label for="dictamenAprobar" class="form-label">Descripción general</label>
                                <textarea class="form-control" id="descripcion-apro" name="descripcion-apro" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="razonAprobacion" class="form-label">Razón de la aprobación:</label>
                                <select class="form-control" id="razonAprobacion" name="razonAprobacion" onchange="mostrarTextArea()">
                                    <option name="razon" value="" disabled selected>Seleccionar</option>
                                    <option value="Calificación Excelente">Calificación Excelente</option>
                                    <option value="Cumplimiento de requisitos">Cumplimiento de requisitos</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </div>
                            <div id="otraRazon" style="display: none;">
                                <div class="mb-3">
                                    <label for="razonTextArea" class="form-label">Ingrese la razón:</label>
                                    <textarea class="form-control" id="razonTextArea" name="razonTextArea" rows="3"></textarea>
                                </div>
                            </div>
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
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulario de negación</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('dictamenNegado.pdf') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <blockquote>
                                    <p>Para aprobar al usuario favor de llenar el siguiente formulario</p>
                                </blockquote>
                            </div>
                            <div class="md-3">
                                <label for="dictamenAprobar" class="form-label">Descripción general</label>
                                <textarea class="form-control" id="descripcion-nega" name="descripcion-nega" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="razon-negada" class="form-label">Razón de la negación:</label>
                                <select class="form-control" id="razon-negada" name="razon-negada" onchange="mostrarTextAreaNegada()">
                                    <option name="razon" value="" disabled selected>Seleccionar</option>
                                    <option value="Calificación insuficiente">Calificación insuficiente</option>
                                    <option value="Falta de requisitos">Falta de requisitos</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </div>
                            <div id="otraRazonNegada" style="display: none;">
                                <div class="mb-3">
                                    <label for="razonTextArea-negada" class="form-label">Ingrese la razón:</label>
                                    <textarea class="form-control" id="razonTextArea-negada" name="razonTextArea-negada" rows="3"></textarea>
                                </div>
                            </div>
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
        function mostrarTextArea() {
            var select = document.getElementById("razonAprobacion");
            var otroRazonDiv = document.getElementById("otraRazon");
            var selectedOption = select.options[select.selectedIndex].value;

            if (selectedOption === "Otros") {
                otroRazonDiv.style.display = "block";
            } else {
                otroRazonDiv.style.display = "none";
            }
        }

        function mostrarTextAreaNegada() {
            var select = document.getElementById("razon-negada");
            var otroRazonDiv = document.getElementById("otraRazonNegada");
            var selectedOption = select.options[select.selectedIndex].value;

            if (selectedOption === "Otros") {
                otroRazonDiv.style.display = "block";
            } else {
                otroRazonDiv.style.display = "none";
            }
        }
    </script>

</body>

</html>