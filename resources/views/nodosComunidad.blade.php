<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/nodos.css') }}">        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Nodos de colaboración | PLESITH</title>
</head>
<style>
    
</style>
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
                        <a class="btn " href="/home"   data-bs-target="#Modal-crear-produccion">Crear nodo</a>
                    </div>
                    <div class="col-3 barra-nodo">
                    <input type="search" class="form-control rounded" aria-label="Search" aria-describedby="search-addon" />
                    </div>
                    <div class="col-2">
                    <button class="btn btn-primary" type="button">
                        <i class="bi bi-search"></i>
                        Buscar
                    </button>
                    </div>
                </div>
            </div>
            <hr class="hr-gob" >
            <div class="seccion">
            
                    <h3>Nodos de la Comunidad</h3>
                    <h5>Resultados Encontrados:</h5>
                
            </div>
            <table class="tabla-nodos">
                <thead>
                    <th class="rotated-header">Título:</th>
                    <th class="rotated-header">Líder:</th>
                    <th class="rotated-header">Línea de investigación: </th>
                    <th class="rotated-header">Institución Ligada: </th>
                </thead>
                <tbody>
                @foreach ($datos as $d)
                    <tr>
                        <td class="contenido-produccion">{{ $d->tema_inv}}</td>
                        <td class="contenido-produccion">Dr. Ana García, Ing. Carlos Martínez</td>
                        <td class="contenido-produccion">{{ $d->linea_inv}}</td>
                        <td class="contenido-produccion">{{ $d->institucion_ligada}}</td>
                        <td>
                            <button class="btn btn-primary" onclick="AlertaColaborador()" type="button">
                                Colaborar
                            </button>
                        </td>
                        <td>
                            <a href="#" class="btn btn-primary" id="btnAbrirModalnodo" data-bs-toggle="modal" data-bs-target="#Modal-crear-produccion">
                                Leer más
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Modal de nodos de colaboración -->
            <div class="modal fade" id="Modal-crear-produccion">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Investigación en Criptomonedas</h4>
                                </div>
                                <div class="modal-body">
                                <table class="tabla-modal table table-borderless" >
                <tbody>
                @foreach ($datos as $d)
                    <tr>
                        <th class="rotated-header">Línea de Investigación: </th>
                        <td class="contenido-produccion">{{ $d->linea_inv}}</td>
                    </tr>
                    <tr>
                        <th class="rotated-header">Categoría: </th>
                        <td class="contenido-produccion">{{ $d->categoria}}</td>
                    </tr>
                    <tr>
                        <th class="rotated-header">Líder:</th>
                        <td class="contenido-produccion">Dr. Ana García</td>
                    </tr>
                   
                    <tr>
                        <th class="rotated-header">Colaboradores: </th>
                        <td class="contenido-produccion">Ing. Carlos Martínez</td>
                      
                    </tr>
                    <tr>
                        <th class="rotated-header">Institución ligada: </th>
                        <td class="contenido-produccion">{{ $d->institucion_ligada}}</td>
                      
                    </tr>
                    <tr>
                        <th class="rotated-header">Descripción: </th>
                        <td class="contenido-produccion">{{ $d->descripcion}}</td>
                      
                    </tr>
                    <tr>
                        <th class="rotated-header">Documentación: </th>
                        <td class="contenido-produccion"><a href="nodos/{{ $d->documento}}" target="blanck_">{{ $d->documento}}</a></td>
                      
                    </tr>
                    @endforeach
                </tbody>
            </table>
                                </div>
                                <div class="modal-footer">
                                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

        </div>
        
    </main>
    @include('layouts/footer')
     <!-- Include Bootstrap JS and Popper.js before closing body tag -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
     <script>
         //script modal 
  $(document).ready(function(){
        $("#btnAbrirModalnodo").click(function(){
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
     </script>
</body>

</html>