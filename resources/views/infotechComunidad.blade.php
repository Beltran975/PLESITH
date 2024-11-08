<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('asset/infotechComunidad.css') }}">
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
        <title>Infotech | PLESITH</title>
    </head>
    <body class="body">
        @include('layouts/headregob')
        @include('layouts/header')
        <main class="main">
            <div class="row-invisible nav"></div>
            <!-- carrusel -->
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="https://pbs.twimg.com/media/DltW2R-U8AYQOvU?format=jpg&name=4096x4096" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://lh3.googleusercontent.com/p/AF1QipOPGmrRbLz_rjEJY8iqWm9aXhR3ka3lULyCLAsO=s1360-w1360-h1020" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://lh3.googleusercontent.com/p/AF1QipN-7owpDO3C0RV4O5HNizETIEJ5vVIDLEA_gbO2=s1360-w1360-h1020" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="title">
                <h1>Infotech</h1>
            </div>
            <div class="row initial justify-content-center">
                <!-- convocatorias -->
                <div class="titulo row d-flex  mb-3">
                    <h3>Convocatorias</h3>
                </div>
                <hr class="hr-gob">
            </div>
            <div class="row elementary justify-content-center">
                <!-- tabla meses y años pantallas grandes-->
                <form action="{{ route('filtro-buscar') }}" method="GET" id="monthsTableContainer">
                    <table class="months">
                        <tr>
                            <td><button type="submit" name="mes" value="1">Enero</button></td>
                            <td><button type="submit" name="mes" value="2">Febrero</button></td>
                            <td><button type="submit" name="mes" value="3">Marzo</button></td>
                            <td><button type="submit" name="mes" value="4">Abril</button></td>
                            <td><button type="submit" name="mes" value="5">Mayo</button></td>
                            <td><button type="submit" name="mes" value="6">Junio</button></td>
                            <td><button type="submit" name="mes" value="7">Julio</button></td>
                            <td><button type="submit" name="mes" value="8">Agosto</button></td>
                            <td><button type="submit" name="mes" value="9">Septiembre</button></td>
                            <td><button type="submit" name="mes" value="10">Octubre</button></td>
                            <td><button type="submit" name="mes" value="11">Noviembre</button></td>
                            <td><button type="submit" name="mes" value="12">Diciembre</button></td>
                        </tr>
                    </table>
                    <select class="fechaaño" name="year" onchange="this.form.submit()">
                        <option value="">Año</option>
                        <option value="all">Todos</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <!-- Agrega los demás años según sea necesario -->
                    </select>
                </form>
            </div>
            <div class="" id="monthsSelectContainer">
                <!-- tabla meses y años pantallas pequeñas-->
                <form action="{{ route('filtro-buscar') }}" method="GET" id="formFilter" class="row elementary justify-content-center">
                    <select class="fechames" name="mes" id="selectMes">
                        <option value="" disabled selected>Mes</option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                    <select class="fechaaño" name="year" onchange="this.form.submit()">
                        <option value="" disabled selected>Año</option>
                        <option value="all">Todos</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <!-- Agrega los demás años según sea necesario -->
                    </select>
                </form>
            </div>
            <div class="row secondary justify-content-center">
                <div class="modal-body">
                    <!-- Tabla de convocatorias -->
                    <table class="resultados table table-responsive table-striped" id="convocationsTable">
                        <tr>
                            <th class="subtitulo1">Nombre de la convocatoria</th>
                            <th class="subtitulo2">Fecha de publicación</th>
                            <th class="subtitulo3">Ver convocatoria</th>
                            <th class="subtitulo4">Descripción</th>
                        </tr>
                        @foreach($convocatorias as $convocatoria)
                        <tr>
                            <th >{{$convocatoria->titulo}}</th>
                            <th>{{$convocatoria->year}}</th>
                            <th class="docinfotech"><a href="/documentos-admin/infotech/{{$convocatoria->documento}}" target="_blank">{{$convocatoria->documento}}</a></th>
                            <th class="descinfotech">{{$convocatoria->descripcion}}</th>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </main>
        @include('layouts/footer')
        <script>
            document.getElementById('btnFiltrar').addEventListener('click', function() {
                var selectedMonth = document.getElementById('selectMes').value;
                var form = document.getElementById('formFilter');
                form.action = "{{ route('filtro-buscar') }}?mes=" + selectedMonth;
                form.submit();
            });
        </script>
    </body>
</html>