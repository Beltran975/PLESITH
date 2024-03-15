<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('asset/bibliotech.css') }}">
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png" />
        <title>Bibliotech | PLESITH</title>
    </head>
    <body class="body">
        @include('layouts/headregob')
        @include('layouts/header')
        <main>
            <section class="bibliotech seccion-obscura">
                <div class="container-lx">
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
                </div>
                <div class="title">
                    <h1>Bibliotech</h1>
                </div>
            </section>
            <section class="bibliotech seccion-clara container-lx">
                <div class="row">
                    <!-- Filtros de busqueda -->
                    <div id="busqueda-menu" class="busquedas col-3">
                        <div class="filtros">
                            <form action="" method="get">
                                <div class="row">
                                    <div class="col">
                                        <h3>Búsqueda</h3>
                                        <div class="busqueda">
                                            <input name="buscador" type="search" class="search" aria-label="Search" aria-describedby="search-addon" />
                                            <button class="button" type="submit">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h3>Fecha de publicación</h3>
                                        <div class="fecha">
                                            <input type="date" id="" class="date">
                                        </div>
                                    </div>                    
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h3>Área del conocimiento</h3>
                                        <div class="linea">
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Seleccionar</option>
                                                <option value="linea1">ÁREA I. Físico-Matemáticas y Ciencias de la Tierra  </option>
                                                <option value="linea2">ÁREA II. Biología y Química</option>
                                                <option value="linea3">ÁREA III. Medicina y Ciencias de la Salud </option>
                                                <option value="linea4">ÁREA IV. Ciencias de la Conducta y la Educación</option>
                                                <option value="linea5">ÁREA V. Humanidades</option>
                                                <option value="linea6">ÁREA VI. Ciencias Sociales</option>
                                                <option value="linea7">ÁREA VII. Ciencias de la Agricultura, Agropecuarias, Forestales y de Ecosistemas</option>
                                                <option value="linea8">ÁREA VIII. Ingenierías y Desarrollo Tecnológico </option>
                                                <option value="linea9">ÁREA IX. Multidisciplinaria</option>
                                            </select>
                                        </div>
                                    </div>                    
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h3>Tipo</h3>
                                        <div class="tipo">
                                            <input type="checkbox" id="cbox2" value="second_checkbox"/>
                                            <label for="cbox2">Revista</label>
                                            <br><br>
                                            <input type="checkbox" id="cbox2" value="second_checkbox"/>
                                            <label for="cbox2">Capítulos</label>
                                            <br><br>
                                            <input type="checkbox" id="cbox2" value="second_checkbox"/>
                                            <label for="cbox2">Tesis</label>
                                            <br><br>
                                            <input type="checkbox" id="cbox2" value="second_checkbox"/>
                                            <label for="cbox2">Investigaciones</label>
                                        </div>
                                    </div>                    
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Resultados de busqueda -->
                    <div class="col">
                        <div class="resultados">
                            <div class="row justify-content-around">
                                <div class="titulo">
                                    <h5>Resultados encontrados:</h5>
                                </div>
                                <!-- <hr class="hr-gob"> -->
                                <div class="cards">
                                    @foreach($datos as $item)
                                    <div class="card-biblio">
                                        <label class="control-label" for="titulo">{{$item->titulo}}</label>
                                        <iframe src="/bibliotech/{{ $item->documento }}" type="application/pdf" width="100%" height="100%"></iframe>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-toggle-container">
                    <div class="menu-toggle" onclick="toggleMenu()">Filtros de busqueda</div>
                </div>
            </section>
        </main>
        @include('layouts/footer')
        <script>
        function toggleMenu() {
            var menu = document.getElementById('busqueda-menu');
            menu.classList.toggle('active');
            }
        </script>
    </body>
</html>