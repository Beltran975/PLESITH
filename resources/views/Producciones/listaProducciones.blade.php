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
        <input class="btn btn-primary" type="button" onclick="history.back()" name="volver atrás" value="volver atrás">
        <div id="tab5" class="tabs-producciones active">
        <table class="table contenido produccion">
                                <thead>
                                    <tr>
                                        <th>Tipo:</th>
                                        <th>Evidencia:</th>
                                        <th>Autores:</th>
                                        <th>Titulo:</th>
                                        <th>Descripción:</th>
                                        <th>Pais:</th>
                                        <th>Año:</th>
                                        <th>Proposito:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($producciones as $produccion)
                                <tr>
                                    <td>{{ $produccion->tipo }}</td>
                                    <td>{{ $produccion->evidencia }}</td>
                                    <td>{{ $produccion->autores }}</td>
                                    <td>{{ $produccion->titulo }}</td>
                                    <td>{{ $produccion->descripcion }}</td>
                                    <td>{{ $produccion->pais }}</td>
                                    <td>{{ $produccion->year }}</td>
                                    <td>{{ $produccion->proposito }}</td>
                                    <td>
                                <a href="{{ route('editProduc.edit', $produccion->id_pro)}}" class="btn btn-secondary">
                                <i class="bi bi-pencil-square"></i>
                                </a>
                                    </td>
                                    <td>
                                <a href="#" class="btn btn-danger">
                                <i class="bi bi-trash3-fill"></i>
                                </a>
                                    </td>
                                </tr>
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