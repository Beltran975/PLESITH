<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('asset/home-admin.css') }}">
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Gestión Bibliotech | PLESITH</title>
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
                            <h3>{{ __('Bibliotech') }}</h3>
                        </div>
                        <hr class="hr-gob">
                        <!-- boton crear -->
                        <a href="{{ route('bibliotech.create')}}" class="btn btn-primary">
                            <i class="bi bi-plus-circle-fill"></i> 
                            Crear
                        </a>
                        <!-- tabla bibliotech-->
                        <div class="card-group bibliotech">
                            <div class="card bibliotech"> 
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Título</th>
                                            <th>Fecha</th>
                                            <th>Documento</th>
                                            <th>Descripción</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($datos)<=0)
                                        <tr>
                                            <td colspan="8"><h6>"No existen registros"</h6></td>
                                        </tr>
                                        @else
                                        @foreach ($datos as $d)
                                        <tr>
                                            <td>{{ $d->titulo}}</td>
                                            <td>{{ $d->year}}</td>
                                            <td><a href="/bibliotech/{{ $d->documento}}" target="blanck_">{{ $d->documento}}</a></td>
                                            <td>{{ $d->descripcion}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-list"></i></button>
                                                        <ul class="dropdown-menu">
                                                            <a href="{{route('bibliotech.edit', $d->id)}}" class="btn btn-warning">Editar</a>
                                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $d->id}}">
                                                                Eliminar
                                                            </button>
                                                        </ul>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('administrador.bibliotech.delete')
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</html>
