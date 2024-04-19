<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/nodos.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Nodos de colaboración | PLESITH</title>
</head>

<body>
    @include('layouts/headregob')
    @include('layouts/header')
    <main class="page d-flex justify-content-center">
        <div class="content">
            <div class="container ">
                <div class="row align-items-end">
                    <div class="col-5">
                        <h3>Nodos de colaboración</h3>
                    </div>
                    <div class="col-2 barra-nodo">
                        <a class="btn btn-primary" href="/home"><i class="bi bi-plus-circle-fill"></i> Crear nodo</a>
                    </div>
                    <div class="col-3 buscar-nodo">
                        <form class="form-inline" action="{{route('buscar.index')}}" method="get">
                            <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="Área de conocimiento" aria-label="Search">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Buscar</button>
                    </div>
                    </form>
                </div>
            </div>
            <hr class="hr-gob">
            <div class="seccion">
                <h3>Nodos de la comunidad</h3>
                <h5>Resultados encontrados:</h5>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <th class="rotated-header">Título:</th>
                    <th class="rotated-header">Líder:</th>
                    <th class="rotated-header">Área de conocimiento: </th>
                    <th class="rotated-header">Institución ligada: </th>
                </thead>
                <tbody>
                    @foreach ($datos as $d)
                    @foreach ($d->nodos as $nodo)
                    <tr>
                        <td class="contenido-produccion">{{ $nodo->tema_inv}}</td>
                        <td class="contenido-produccion">{{ $nodo->lider}}</td>
                        <td class="contenido-produccion">{{ $nodo->linea_inv}}</td>
                        <td class="contenido-produccion">{{ $nodo->institucion_ligada}}</td>
                        @if($nodo->id_user == Auth::user()->id)
                        <td>
                            <button disabled type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="">
                                Colaborar
                            </button>
                        </td>
                        @elseif(Auth::user()->id == $nodo->colaboradores)
                        <td class="contenido-produccion"><button type="button" onclick="colaboradorRegis()" class="btn btn-primary">Colaborar</button></td>
                        @else
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal-colaborar-{{$nodo->id}}">
                                Colaborar
                            </button>
                        </td>
                        @endif
                        <td>
                            <a href="#" class="btn btn-primary" id="btnAbrirModalnodo" data-bs-toggle="modal" data-bs-target="#Modal-crear-produccion-{{ $nodo->id }}">
                                <i class="bi bi-book"></i> Leer más
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @include('nodo.solicitudNodo')
                    @endforeach
                </tbody>
            </table>

            <!-- Modal de nodos de colaboración -->
            @foreach ($datos as $d)
            @foreach ($d->nodos as $nodo)
            <div class="modal fade" id="Modal-crear-produccion-{{ $nodo->id }}">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{$nodo->tema_inv}}</h4>
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
                                        <td class="contenido-produccion">{{ $nodo->categoria}}</td>
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endforeach
        </div>
    </main>
    @include('layouts/footer')
    <!-- Include Bootstrap JS and Popper.js before closing body tag -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>

    <script>
        //script modal 
        $(document).ready(function() {
            $("#btnAbrirModalnodo").click(function() {
                $("#Modal-crear-produccion").modal();
            });
        });

        //Alerta de colaborador
        function AlertaColaborador() {
            Swal.fire({
                title: 'Solicitud enviada',
                text: 'Recibirás una respuesta a tu correo electrónico una vez que el líder del nodo acepte tu solicitud para colaborar.',
                icon: 'success',
                iconColor: '#bc955b',
                confirmButtonText: 'Aceptar',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
        }

        function colaboradorRegis() {
            Swal.fire({
                icon: "error",
                title: "Lo sentimos",
                text: "Tu ya colaboras dentro de este nodo!",
                showConfirmButton: false,
                timer: 1500
            });
        }
    </script>
</body>

</html>