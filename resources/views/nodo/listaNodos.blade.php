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
        <a href="/home" class="btn btn-primary">Volver atrás</a>
        <div id="tab5" class="tabs-producciones active">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Tema de investigación:</th>
                        <th scope="col">Categoría:</th>
                        <th scope="col">Líder:</th>
                        <th scope="col">Colaboradores:</th>
                        <th scope="col">Área de conocimiento:</th>
                        <th scope="col">Institución ligada:</th>
                        <th scope="col">Descripción:</th>
                        <th scope="col">Documentación:</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($datos as $dato)
                    <tr>
                        <td scope="row">{{$dato->tema_inv}}</td>
                        <td scope="row">{{$dato->categoria}}</td>
                        <td scope="row">{{$dato->lider}}</td>
                        <td scope="row">{{$dato->colaboradores}}</td>
                        <td scope="row">{{$dato->linea_inv}}</td>
                        <td scope="row">{{$dato->institucion_ligada}}</td>
                        <td scope="row">{{$dato->descripcion}}</td>
                        <td scope="row"><a href="/nodos/{{ $dato->documento}}" target="blanck_">{{ $dato->documento }}</a></td>
                        <td scope="row">
                            <a href="{{route('nodos.edit', $dato->id)}}" class="btn btn-secondary">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td scope="row">
                            <!-- Button delete modal -->
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