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
        <div class="menu-toggle-container">
            <div class="menu-toggle" onclick="toggleMenu()">Menú</div>
        </div>
    <main class="main">
        <section class="busquedas" id="busqueda-menu">
            <div class="col-3">
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
                                <h3>Área de conocimiento</h3>
                                <div class="linea">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Seleccionar</option>
                                        <option value="linea1">ÁREA I. Físico-Matemáticas y Ciencias de la Tierra </option>
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
                                    <input type="checkbox" id="cbox2" value="second_checkbox" />
                                    <label for="cbox2">Revista</label>
                                    <br><br>
                                    <input type="checkbox" id="cbox2" value="second_checkbox" />
                                    <label for="cbox2">Capítulos</label>
                                    <br><br>
                                    <input type="checkbox" id="cbox2" value="second_checkbox" />
                                    <label for="cbox2">Tesis</label>
                                    <br><br>
                                    <input type="checkbox" id="cbox2" value="second_checkbox" />
                                    <label for="cbox2">Investigaciones</label>
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
                    </form>
                </div>
            </div>
        </section>
        <div class="content-biblio">
            <section class="cards">
                @foreach($datos as $item)
                <div class="card-biblio">
                    <iframe src="/bibliotech/{{ $item->documento }}" type="application/pdf" width="100%" height="100%"></iframe>
                </div>
                @endforeach
            </section>
        </div>
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
