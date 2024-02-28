<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/infotech.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
    <title>Infotech | PLESITH</title>
</head>
<body class="body">
    @include('layouts/headregob')
    @include('layouts/header')
    <main class="main">
        <section class="infotech seccion-obscura">
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
                <h1>Infotech</h1>
            </div>
        </section>
        <section class="infotech seccion-clara">
            <div class="titulo row d-flex  mb-3">
                <h3>Convocatorias</h3>
            </div>
            <hr class="hr-gob">
            <div class="row justify-content-center">
    <!-- Tabla de meses -->
            <table class="months">
                <tr>
                    <td onclick="showConvocations('Enero')">Enero</td>
                    <td onclick="showConvocations('Febrero')">Febrero</td>
                    <td onclick="showConvocations('Marzo')">Marzo</td>
                    <td onclick="showConvocations('Abril')">Abril</td>
                    <td onclick="showConvocations('Mayo')">Mayo</td>
                    <td onclick="showConvocations('Junio')">Junio</td>
                    <td onclick="showConvocations('Julio')">Julio</td>
                    <td onclick="showConvocations('Agosto')">Agosto</td>
                    <td onclick="showConvocations('Septiembre')">Septiembre</td>
                    <td onclick="showConvocations('Octubre')">Octubre</td>
                    <td onclick="showConvocations('Noviembre')">Noviembre</td>
                    <td onclick="showConvocations('Diciembre')">Diciembre</td>
                </tr>
            </table>
    <!-- Menú desplegable con años -->
            <select class="fecha" onchange="showConvocationsByYear(this.value)">
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <option value="2023">2022</option>
                <option value="2023">2021</option>
                <option value="2023">2020</option>
                <!-- Agrega los demás años según sea necesario -->
            </select>
    <!-- Tabla de convocatorias -->
            <table class="resultados" id="convocationsTable" style="display: table;">
                <tr>
                    <th width="200">Fecha de publicación</th>
                    <th width="600">Nombre de la convocatoria</th>
                    <th width="200">Ver convocatoria</th>
                </tr>
            </table>
            </div>
        </section>
        
        <!-- <img src="https://lajornadahidalgo.com/wp-content/uploads/2022/08/CITNOVA-SINCROTON.jpg" alt="img"> -->
        <!-- <div class="title">
                <div id="carousel-container">
                    <div id="carousel">
                        <div class="carousel-item"><img src="{{ asset('storage/imagen1.jpg') }}" alt="Imagen 1"></div>
                            <div class="carousel-item"><img src="{{ asset('storage/imagen2.jpg') }}" alt="Imagen 2"></div>
                                <div class="carousel-item"><img src="{{ asset('storage/imagen3.jpg') }}" alt="Imagen 3"></div>
                    </div>
                </div> -->
<script>
    // const carousel = document.getElementById('carousel');
    // const totalImages = 3; // Total de imágenes en el carrusel
    // const intervalDuration = 3000; // Duración del intervalo en milisegundos

    // // Crear dinámicamente las imágenes del carrusel
    // for (let i = 1; i <= totalImages; i++) {
    //     const imageDiv = document.createElement('div');
    //     imageDiv.classList.add('carousel-item');
    //     const image = document.createElement('img');
    //     image.src = `imagen${i}.jpg`;
    //     image.alt = `Imagen ${i}`;
    //     imageDiv.appendChild(image);
    //     carousel.appendChild(imageDiv);
    // }

    // // Lógica para el carrusel de imágenes
    // const carouselItems = document.querySelectorAll('.carousel-item');
    // const carouselWidth = carousel.clientWidth;
    // let currentPosition = 0;

    // function updateCarousel() {
    //     currentPosition += 1;
    //     carousel.style.transition = 'transform 0.5s ease-in-out';
    //     carousel.style.transform = `translateX(-${currentPosition * carouselWidth}px)`;

    //     if (currentPosition >= totalImages) {
    //         setTimeout(() => {
    //             carousel.style.transition = 'none';
    //             carousel.style.transform = 'translateX(0)';
    //             currentPosition = 0;
    //         }, 500);
    //     }
    // }

    // setInterval(updateCarousel, intervalDuration); // Cambia la imagen cada 3 segundos

    // Función para mostrar las convocatorias del mes seleccionado
        function showConvocations(month) {
    // Aquí debes agregar lógica para obtener y mostrar las convocatorias del mes específico
            const convocationsTable = document.getElementById('convocationsTable');
            const convocationDate = document.getElementById('convocationDate');  
    // Mapea el nombre del mes con su número correspondiente
            const monthNumber = {
            'Enero': '01',
            'Febrero': '02',
            'Marzo': '03',
            'Abril': '04',
            'Mayo': '05',
            'Junio': '06',
            'Julio': '07',
            'Agosto': '08',
            'Septiembre': '09',
            'Octubre': '10',
            'Noviembre': '11',
            'Diciembre': '12'
        };
    // Obtén el año seleccionado del menú desplegable
            const selectedYear = document.querySelector('select').value;
    // Supongamos que obtienes los datos de convocatorias de alguna manera, por ejemplo, de un array de objetos:
            const convocationsData = [
            { fecha: `01/${monthNumber[month]}/${selectedYear}`, nombre: `Convocatoria 1 de ${month}`, enlace: '#' },
            { fecha: `15/${monthNumber[month]}/${selectedYear}`, nombre: `Convocatoria 2 de ${month}`, enlace: '#' },
            // Agrega más convocatorias según sea necesario
        ];
    // Limpia la tabla actual
        while (convocationsTable.rows.length > 1) {
            convocationsTable.deleteRow(1);
        }
    // Llena la tabla con los datos de convocatorias
        convocationsData.forEach(convocation => {
            const row = convocationsTable.insertRow(-1);
            const cell1 = row.insertCell(0);
            const cell2 = row.insertCell(1);
            const cell3 = row.insertCell(2);

            cell1.innerHTML = convocation.fecha;
            cell2.innerHTML = convocation.nombre;
            cell3.innerHTML = `<a href="${convocation.enlace}" target="_blank">Ver</a>`;
        });
    // Actualiza la fecha en la tabla
        convocationDate.innerHTML = `01/${monthNumber[month]}/${selectedYear}`;
    // Muestra la tabla
        convocationsTable.style.display = 'table';
        }

    // Función para mostrar las convocatorias del año seleccionado
        function showConvocationsByYear(year) {
        }
</script>        
    </main>
    @include('layouts/footer')
</body>
</html>