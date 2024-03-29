<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('asset/bibliotechComunidad.css') }}">
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png" />
        <title>Bibliotech | PLESITH</title>
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
                <h1>Bibliotech</h1>
            </div>
            <div class="row initial">
                <!-- filtros de busqueda -->
                <div class="searchBibliotech col-3" id="searchBibliotech-menu">
                    <div class="filtros search">
                        <form action="" method="get">
                            <div class="row1">
                                <div class="col1">
                                    <h3>Título</h3>
                                    <div class="titulo">
                                        <input name="titulo" type="search" class="search" aria-label="Search" aria-describedby="search-addon" />
                                        <button class="button" type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row2">
                                <div class="col2">
                                    <h3>Fecha de publicación</h3>
                                    <div class="fecha">
                                        <label><input type="radio" name="fecha" value="dia"checked> Día</label>
                                        <label><input type="radio" name="fecha" value="mes"> Mes</label>
                                        <label><input type="radio" name="fecha" value="año"> Año</label>
                                        <input name="date" id="date" class="form-control" type="date">
                                        <input name="month" id="month" class="form-control"  type="month" min="1900" max="2099" step="1" />
                                        <select name="year" id="year" class="form-control">
                                            <option value="0">Año</option>
                                            <!-- <option value="2024">2024</option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option> -->
                                            <?php 
                                                $year = date("Y");
                                                for ($i = 2020; $i <= $year; $i++) { 
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                                }
                                            ?>
                                        </select>
                                        <button class="button" type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </div>                    
                            </div>
                        </form>
                    </div>
                </div>
                <!-- resultados de busqueda -->
                <div class="col resultados" id="resultados">
                    <div class="row3">
                        <h5>Resultados encontrados:</h5>
                        <div class="cards bibliotech">
                            @foreach($datos as $item)
                            <div class="card bibliotech">
                                <div class="card-titulo">
                                    <label class="control-label" for="titulo">{{$item->titulo}}</label>
                                </div>
                                <iframe src="/bibliotech/{{ $item->documento }}" type="application/pdf" width="100%" height="100%"></iframe>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="menu-toggle-container">
                    <div class="menu-toggle" onclick="toggleMenu()">Filtros de busqueda</div>
                </div>     
            </div>      
        </main>
        @include('layouts/footer')
        <script>
            function toggleMenu() {
                var menu = document.getElementById('searchBibliotech-menu');
                menu.classList.toggle('active');
            }
            document.addEventListener("click", function(event) {
                var menu = document.getElementById("searchBibliotech-menu");
                var menuToggle = document.querySelector(".menu-toggle");
                    
                if (!menu.contains(event.target) && event.target !== menuToggle) {
                    menu.classList.remove("active");
                }
            });
        </script>
        <script>
            const radioDate = document.querySelector('input[value="dia"]');
            const radioMonth = document.querySelector('input[value="mes"]');
            const radioYear = document.querySelector('input[value="año"]');
            const dateInput = document.querySelector('input[name="date"]');
            const monthInput = document.querySelector('input[name="month"]');
            const yearSelect = document.querySelector('select[name="year"]');
            function toggleDateInput() {
                if (radioDate.checked) {
                    dateInput.removeAttribute('disabled');
                    monthInput.setAttribute('disabled', 'disabled');
                    yearSelect.setAttribute('disabled', 'disabled');
                } else if (radioMonth.checked) {
                    monthInput.removeAttribute('disabled');
                    dateInput.setAttribute('disabled', 'disabled');
                    yearSelect.setAttribute('disabled', 'disabled');
                } if (radioYear.checked) {
                    yearSelect.removeAttribute('disabled');
                    dateInput.setAttribute('disabled', 'disabled');
                    monthInput.setAttribute('disabled', 'disabled');
                }
            }
            radioDate.addEventListener('change', toggleDateInput);
            radioMonth.addEventListener('change', toggleDateInput);
            radioYear.addEventListener('change', toggleDateInput);
            toggleDateInput();
        </script>
    </body>
</html>