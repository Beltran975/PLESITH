<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/bibliotech.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png" />
    <title>Bibliotech | PLESITH</title>
</head>
<style>

</style>

<body class="body">

    @include('layouts/headregob')
    @include('layouts/header')
    
    <main class="main">

        
        <section class="busquedas">
            <div class="col-3">
                <div class="filtros">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col">
                                <h3>Búsqueda</h3>
                                <div class="busqueda">
                                    <input type="search" class="search" aria-label="Search" aria-describedby="search-addon" />
                                    <button class="button" type="button">
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
                    <div class="image">
                        <img src="docInvestigacion/{{ $item->documento }}" alt="...">

                    </div>
                    <div class="card-body-biblio">
                        <th>{{ $item->titulo }}</th>
                        <br>
                        <th>{{ $item->year }}</th>
                        <th>{{ $item->descripcion }}</th>

                    </div>
                </div>
                @endforeach
            </section>
        </div>
    </main>
    @include('layouts/footer')
</body>

</html>