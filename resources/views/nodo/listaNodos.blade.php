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
        <div class="content">
            <div class="green-box">
                <div class="titulo row d-flex mb-3">
                    <h3>Mis nodos de colaboración</h3>
                    <div class="d-flex justify-content-start">
                        <a href="/home" class="btn btn-primary"> <i class="bi bi-arrow-bar-left"></i> Volver atrás</a>
                    </div>
                </div>
                <hr class="hr-gob">
                <div id="tab5" class="tabs-producciones active">


                    <div class="card">

                        <table class="table">

                            <thead>
                                <tr>
                                    <th scope="col">Tema de investigación:</th>
                                    <th scope="col">Categoría:</th>
                                    <th scope="col">Documentación:</th>
                                    <th scope="col">Líder:</th>
                                    <th scope="col">Área de conocimiento:</th>
                                    <th scope="col">Colaboradores:</th>
                                    

                                </tr>
                            </thead>
                            @foreach (Auth::user()->nodos as $nodo)
                            <tbody>

                                <tr>
                                    <td scope="row">{{$nodo->tema_inv}}</td>
                                    <td scope="row">{{$nodo->categoria}}</td>
                                    <td scope="row"><a href="../../documentos-users/nodos/{{ $nodo->documento}}" target="blanck_">{{ $nodo->documento}}</a></td>
                                    <td scope="row">{{$nodo->lider}}</td>
                                    <td scope="row">{{$nodo->linea_inv}}</td>
                                    @foreach($datos as $dd)
                                    @foreach($dd->nodosColab as $colab)
                                    @php
                                    $usuario = \App\Models\User::find($colab->colaboradores);
                                    @endphp
                                    <td scope="row">
                                        @if($usuario && $usuario->id == $nodo->colaboradores)
                                        {{$usuario->name}}
                                        @else(count($datos)<=0)
                                            <h6>"No existen colaboradores"</h6>
                                        @endif
                                    </td>
                                    @endforeach
                                    @endforeach

                                    
                                    <td scope="row">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownDetails" data-bs-toggle="dropdown" aria-expanded="false">
                                                Opciones
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownDetails">
                                                <li>
                                                    <a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#detalles-{{ $nodo->id }}">
                                                        <i class="bi bi-book"></i>
                                                        Detalles
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{route('nodos.edit', $nodo->id)}}" class="dropdown-item">
                                                        <i class="bi bi-pencil-square"></i> Editar
                                                    </a>
                                                </li>
                                                <li>
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$nodo->id}}">
                                                        <i class="bi bi-trash3"></i> Eliminar
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @include('nodo.delete')
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Modal de de descripción -->
                        @foreach($datos as $d)
                        @foreach($d->nodos as $nodo)
                        <div class="modal fade" id="detalles-{{ $nodo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{$nodo->tema_inv}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="tabla-modal table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th class="rotated-header">Área de conocimiento: </th>
                                                    <td class="contenido-produccion">{{ $nodo->linea_inv}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="rotated-header">Categoría: </th>
                                                    <td class="contenido-produccion">{{$nodo->categoria}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="rotated-header">Líder:</th>
                                                    <td class="contenido-produccion">{{ $nodo->lider}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="rotated-header">Colaboradores: </th>
                                                    <td class="contenido-produccion">{{ $nodo->colaboradores}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="rotated-header">Institución ligada: </th>
                                                    <td class="contenido-produccion">{{ $nodo->institucion_ligada}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="rotated-header">Descripción: </th>
                                                    <td class="contenido-produccion">{{ $nodo->descripcion}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="rotated-header">Documentación: </th>
                                                    <td class="contenido-produccion"><a href="/documentos-users/nodos/{{ $nodo->documento}}" target="blanck_">{{ $nodo->documento}}</a></td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach

                    </div>

                </div>
            </div>

        </div>
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