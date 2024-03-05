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
    <title>Mis nodos {{ Auth::user()->name }}</title>
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
                        <th>Tema de investigación:</th>
                        <th>Categoría:</th>
                        <th>Líder:</th>
                        <th>Colaboradores:</th>
                        <th>Descripción:</th>
                        <th>Documentación:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $dato)
                    <tr>
                        <td>{{$dato->tema_inv}}</td>
                        <td>{{$dato->categoria}}</td>
                        <td>{{$dato->lider}}</td>
                        <td>{{$dato->colaboradores}}</td>
                        <td>{{$dato->descripcion}}</td>
                        <td><a href="nodos/{{ $dato->documento}}" target="blanck_">{{ $dato->documento }}</a></td>
                        <td>
                            <a href="#" class="btn btn-secondary">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$dato->id}}">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                    @include('nodo.delete')
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