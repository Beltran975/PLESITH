<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('asset/home.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png" />
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="sweetalert2.min.js"></script>
        <link rel="stylesheet" href="sweetalert2.min.css">
        <title>{{ Auth::user()->name }}</title>
    </head>
    <body>
        @include('layouts/headregob')
        @include('layouts/header')
        <br>
        <main class="page">
            <a href="/home" class="btn btn-primary">Volver atrás</a>
            <div id="tab5" class="tabs-producciones active">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Tipo:</th>
                            <th scope="col">Evidencia:</th>
                            <th scope="col">Autores:</th>
                            <th scope="col">Título:</th>
                            <th scope="col">Descripción:</th>
                            <th scope="col">País:</th>
                            <th scope="col">Fecha:</th>
                            <th scope="col">Propósito:</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($producciones as $produccion)
                        <tr>
                            <td scope="row">{{ $produccion->tipo }}</td>
                            <td scope="row"><a href="produccion/{{ $produccion->evidencia}}" target="blanck_">{{ $produccion->evidencia}}</a></td>
                            <td scope="row">{{ $produccion->autores }}</td>
                            <td scope="row">{{ $produccion->titulo }}</td>
                            <td scope="row">{{ $produccion->descripcion }}</td>
                            <td scope="row">{{ $produccion->pais }}</td>
                            <td scope="row">{{ $produccion->year }}</td>
                            <td scope="row">{{ $produccion->proposito }}</td>
                            <td scope="row">
                                <a href="{{ route('editProduc.edit', $produccion->id_pro)}}" class="btn btn-secondary">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                            <td scope="row">       
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete1-{{$produccion->id_pro}}">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                        @include('Producciones.delete1')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main> 
        @include('layouts/footer')
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="sweetalert2.min.js"></script>
        <link rel="stylesheet" href="sweetalert2.min.css">
    </body>
</html>