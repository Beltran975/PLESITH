<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/createinfotech.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Administrador | PLESITH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @include('layouts.nav-admin')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="col-sm-4 my1">
                    <center><a href="{{ route('nuevo.create')}}" class="btn btn-primary">
                        <i class="bi bi-plus-circle-fill"></i> Crear
                    </a></center>
                </div>
                <br>
                <div class="col-sm-8 table-wrapper">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Titulo:</th>
                                <th>Fecha:</th>
                                <th>Documento:</th>
                                <th>Descripcion</th>
                                <th>Opciones</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($datos)<=0)
                            <tr>
                                <td colspan="8"><h4>"No existen registros"</h4></td>
                            </tr>
                            @else
                            @foreach ($datos as $d)
                            <tr>
                                <td>{{ $d->titulo}}</td>
                                <td>{{ $d->year}}</td>
                                <td><a href="/infotech/{{ $d->documento}}" target="blanck_">{{ $d->documento}}</a></td>
                                <td>{{ $d->descripcion}}</td>
                                <td>
                                    <a href="{{route('infotech.edit', $d->id)}}" class="btn btn-warning">Editar</a>
                                </td>
                                <th>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$d->id}}">
                                        Eliminar
                                    </button>
                                </th>
                            </tr>
                            @include('administrador.infotech.delete')
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</html>