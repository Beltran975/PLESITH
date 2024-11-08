<!DOCTYPE html>
<html>
<head>
    <title>Mapa</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="{{ asset('asset/map.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    </head>
<body>
    @include('layouts.headregob')
    @include('layouts.header')
    @include('ModalReserva')
    <div class="content">
        <h1>Mapa de referenciación tecnológica</h1>
        <div class="controles">
            <input type="text" id="busqueda" placeholder="Buscar institución">
            <select id="instituciones">
                <option disabled selected>Selecciona una institución</option>
                @foreach ($instituciones as $id => $institucion)
                    <option value="{{ $id }}" data-lat="{{ $institucion['lat'] }}" data-lon="{{ $institucion['lon'] }}" data-imagen="{{ $institucion['imagen'] }}">
                        {{ $institucion['name'] }}
                    </option>
                @endforeach
            </select>
            <a id="mostrarTodas">Mostrar Todas</a>
        </div>
        <div id="map"></div>
        <div id="info-box">
            <div class="container-info">
                <h2 id="institution-name"></h2>
                <p id="marker-info"></p>
                <img id="institution-image" src="" alt="Imagen de la Institución"/>
                <!-- Carrusel para imágenes de carreras -->
                <div id="career-images-carousel" class="carousel slide" data-ride="carousel">
                    <ol id="carousel-indicators" class="carousel-indicators">
                        <!-- Los indicadores se agregarán dinámicamente -->
                    </ol>
                    <div class="carousel-inner">
                        <!-- Los elementos del carrusel se agregarán dinámicamente -->
                    </div>
                    <a class="carousel-control-prev" href="#career-images-carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#career-images-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>
                <select id="carreras" disabled>
                    <option disabled selected>Selecciona una carrera</option>
                </select>
                <div id="lab-info" style="display:none;">
                    <h3 class="lab-title">Laboratorios disponibles</h3>
                    <select id="lab-list">
                        <option disabled selected>Selecciona un laboratorio</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Inicialización del mapa centrado en coordenadas específicas con un zoom inicial
    const map = L.map("map").setView([20.0911, -98.7624], 9);

    // Capa de mapas de OpenStreetMap
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);

    // Capa de marcadores
    const markerLayer = L.layerGroup().addTo(map);

    // Función para agregar un marcador al mapa
    function addMarker(lat, lon, name, carreras, imagen) {
        const marker = L.marker([lat, lon]).bindPopup(name).on('click', function() {
            showMarkerInfo(name, carreras, imagen);
            map.setView([lat, lon], 15);
        });
        marker.bindTooltip(name, {permanent: false, direction: 'top', offset: L.point(0, -10)});
        markerLayer.addLayer(marker);
        return marker;
    }

    // Función para mostrar información del marcador
    function showMarkerInfo(name, carreras, imagen) {
        const institutionName = document.getElementById("institution-name");
        institutionName.textContent = name;

        const imageElement = document.getElementById("institution-image");
        if (imagen) {
            imageElement.src = imagen;
            imageElement.style.display = 'block';
        } else {
            imageElement.style.display = 'none';
        }

        const carrerasSelect = document.getElementById("carreras");
        carrerasSelect.innerHTML = '<option disabled selected>Carreras disponibles</option>';

        // Limpiar carrusel de imágenes
        const carouselInner = document.querySelector("#career-images-carousel .carousel-inner");
        carouselInner.innerHTML = '';

        if (carreras) {
            for (const [id, carrera] of Object.entries(carreras)) {
                const option = document.createElement('option');
                option.value = id;
                option.textContent = carrera.name;
                option.dataset.career = JSON.stringify(carrera);
                carrerasSelect.appendChild(option);
            }
            carrerasSelect.disabled = false;
        } else {
            carrerasSelect.disabled = true;
        }

        // Reiniciar el carrusel de imágenes
        $('#career-images-carousel').carousel('dispose');
        $('#career-images-carousel').carousel();

        carrerasSelect.addEventListener('change', function() {
            const selectedOption = carrerasSelect.options[carrerasSelect.selectedIndex];
            const selectedCareer = JSON.parse(selectedOption.dataset.career);
            showCareerInfo(selectedCareer);
        });

        
    }

    // Función para mostrar información de la carrera seleccionada
    function showCareerInfo(career) {
        const labInfo = document.getElementById("lab-info");
        const labList = document.getElementById("lab-list");
        labList.innerHTML = '<option disabled selected>Selecciona un laboratorio</option>';

        const imageCarousel = document.getElementById("career-images-carousel");
        const carouselInner = document.querySelector("#career-images-carousel .carousel-inner");
        carouselInner.innerHTML = ''; // Limpiar elementos anteriores del carrusel

        const institutionImage = document.getElementById("institution-image");
        const institutionName = document.getElementById("institution-name");

        if (career.imagenes && career.imagenes.length > 0) {
            institutionImage.style.display = 'none';

            career.imagenes.forEach((imageSrc, index) => {
                const carouselItem = document.createElement('div');
                carouselItem.classList.add('carousel-item');
                if (index === 0) {
                    carouselItem.classList.add('active');
                }

                const image = document.createElement('img');
                image.src = imageSrc;
                image.classList.add('d-block', 'w-100');
                carouselItem.appendChild(image);

                carouselInner.appendChild(carouselItem);
            });

            imageCarousel.style.display = 'block';
            institutionName.textContent = career.name;

            let currentIndex = 0;
            const totalItems = career.imagenes.length;
            const interval = 3000;

            const autoScrollInterval = setInterval(function() {
                $('#career-images-carousel').carousel('next');
                currentIndex++;
                if (currentIndex >= totalItems) {
                    clearInterval(autoScrollInterval);
                }
            }, interval);

        } else {
            const institutionImageSrc = institutionImage.dataset.originalSrc;
            institutionImage.src = institutionImageSrc;
            institutionImage.style.display = 'block';

            imageCarousel.style.display = 'none';
            institutionName.textContent = career.name;
        }

        if (career.laboratorios && career.laboratorios.length > 0) {
            career.laboratorios.forEach(lab => {
                const option = document.createElement('option');
                option.value = lab.id;
                option.textContent = lab.nombre;
                option.dataset.descripcion = lab.descripcion;
                option.dataset.responsable = lab.responsable;
                option.dataset.imagenes = JSON.stringify(lab.imagenes);
                labList.appendChild(option);
            });
            labInfo.style.display = 'block';

            labList.addEventListener('change', function() {
                const selectedLab = labList.options[labList.selectedIndex];
                const nombreLaboratorio = selectedLab.textContent;
                const descripcionLaboratorio = selectedLab.dataset.descripcion;
                const responsableLaboratorio = selectedLab.dataset.responsable;
                const imagenesLaboratorio = JSON.parse(selectedLab.dataset.imagenes);
                mostrarVentanaFlotante(nombreLaboratorio, descripcionLaboratorio, responsableLaboratorio, imagenesLaboratorio);
            });
        } else {
            labInfo.style.display = 'none';
        }
    }

    // Función para centrar la ventana flotante
    function centrarVentanaFlotante(ventanaFlotante) {
        const windowHeight = window.innerHeight;
        const windowWidth = window.innerWidth;
        const ventanaHeight = ventanaFlotante.offsetHeight;
        const ventanaWidth = ventanaFlotante.offsetWidth;

        const topPosition = (windowHeight - ventanaHeight) / 2;
        const leftPosition = (windowWidth - ventanaWidth) / 2;

        ventanaFlotante.style.top = topPosition + "px";
        ventanaFlotante.style.left = leftPosition + "px";
    }

    // Función para mostrar la ventana flotante con información del laboratorio
    function mostrarVentanaFlotante(nombreLaboratorio, descripcionLaboratorio, responsableLaboratorio, imagenesLaboratorio) {
        cerrarVentanaFlotante(); // Cerrar cualquier ventana flotante abierta antes de abrir una nueva

        // Agregar fondo borroso al abrir la ventana flotante
        const blurBackground = document.createElement('div');
        blurBackground.classList.add('blur-background');
        document.body.appendChild(blurBackground);
        blurBackground.addEventListener('click', cerrarVentanaFlotante); // Cerrar la ventana al hacer clic en el fondo borroso

        const ventanaFlotante = document.createElement('div');
        ventanaFlotante.classList.add('ventana-flotante');

        const selectedInstitucion = document.getElementById("institution-name").textContent;

        let contenido = `
            <h3>${nombreLaboratorio}</h3>
            <h4 class="CarreraVentana"><strong>Carrera:</strong> ${selectedInstitucion}</h4>
            <div class="ventana-contenido">
                <div class="ventana-izquierda">`;

        if (imagenesLaboratorio && imagenesLaboratorio.length > 0) {
            contenido += `
                <div class="lab-images-carousel carousel slide" data-ride="carousel">
                    <div class="carousel-inner">`;
            imagenesLaboratorio.forEach((imagen, index) => {
                contenido += `
                    <div class="carousel-item${index === 0 ? ' active' : ''}">
                        <img src="${imagen}" class="d-block w-100" alt="Imagen del laboratorio">
                    </div>`;
            });
            contenido += `
                    </div>
                    <a class="carousel-control-prev" href=".lab-images-carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href=".lab-images-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>`;
        }

        contenido += `
                </div>
                <div class="ventana-derecha">
                    <div class="titleInf">Descripción</div>
                    <ul>`;
        
        // Dividir la descripción en elementos de lista
        const lineasDescripcion = descripcionLaboratorio.split("\n");
        lineasDescripcion.forEach(linea => {
            if (linea.trim() !== "") {
                contenido += `<li>${linea}</li>`;
            }
        });

        contenido += `
                    <div class="titleInf responsable">Responsable</div>
                    <li>${responsableLaboratorio}</li>
                </ul>
            </div>
        </div>
        <button id="btnReservar" class="btnReservar" data-bs-toggle="modal" data-bs-target="#reservaModal" onclick="abrirReservaModal()">Reservar</button>
        <button class="btnCerrar" onclick="cerrarVentanaFlotante()">Cancelar</button>`;

        const supervisorInput = document.getElementById("responsable");
        supervisorInput.value = responsableLaboratorio;

        const laboratorioInput = document.getElementById("laboratorio");
        laboratorioInput.value = nombreLaboratorio;

        //const carreraInput = document.getElementById("carreraLaboratorio");
        //carreraInput.value = institucionNombre;

        ventanaFlotante.innerHTML = contenido;

        document.body.appendChild(ventanaFlotante);

        centrarVentanaFlotante(ventanaFlotante);
    }

    // Función para cerrar la ventana flotante y remover el fondo borroso
    function cerrarVentanaFlotante() {
        const ventana = document.querySelector('.ventana-flotante');
        const blurBackground = document.querySelector('.blur-background');
        if (ventana) {
            ventana.classList.add('ventana-flotante-cerrada'); // Agregar clase de animación de salida
            setTimeout(() => {
                ventana.remove();
            }, 300); // Eliminar la ventana después de la animación
        }
        if (blurBackground) {
            blurBackground.remove();
        }
    }

    // Variables y evento para el selector de instituciones
    const institucionesSelect = document.getElementById("instituciones");
    const instituciones = @json($instituciones);
    const labList = document.getElementById("lab-list");

    institucionesSelect.addEventListener('change', function() {
        const selectedOption = institucionesSelect.options[institucionesSelect.selectedIndex];
        labList.innerHTML = '<option disabled selected>Selecciona un laboratorio</option>';

        const lat = selectedOption.dataset.lat;
        const lon = selectedOption.dataset.lon;
        const imagen = selectedOption.dataset.imagen;
        const name = selectedOption.textContent;
        const carreras = instituciones[selectedOption.value].carreras;

        // Limpiar todos los marcadores existentes antes de añadir uno nuevo
        markerLayer.clearLayers();

        // Añadir el nuevo marcador al mapa
        addMarker(lat, lon, name, carreras, imagen);

        // Mostrar información en el info-box y actualizar mapa
        showMarkerInfo(name, carreras, imagen);
        map.setView([lat, lon], 15);
    });

    // Evento para mostrar todas las instituciones
    document.getElementById("mostrarTodas").addEventListener('click', function() {
        // Limpiar el contenido del recuadro de la derecha
        const institutionName = document.getElementById("institution-name");
        institutionName.textContent = '';

        const markerInfo = document.getElementById("marker-info");
        markerInfo.textContent = '';

        const institutionImage = document.getElementById("institution-image");
        institutionImage.src = '';
        institutionImage.style.display = 'none';

        const carrerasSelect = document.getElementById("carreras");
        carrerasSelect.innerHTML = '<option disabled selected>Selecciona una carrera</option>';

        const labInfo = document.getElementById("lab-info");
        labInfo.style.display = 'none';

        const labList = document.getElementById("lab-list");
        labList.innerHTML = '<option disabled selected>Selecciona un laboratorio</option>';

        const careerImagesCarousel = document.getElementById("career-images-carousel");
        careerImagesCarousel.style.display = 'none';

        const carouselInner = document.querySelector("#career-images-carousel .carousel-inner");
        carouselInner.innerHTML = '';

        // Limpiar ventana flotante si está abierta
        cerrarVentanaFlotante();

        // Limpiar marcadores del mapa
        markerLayer.clearLayers();

        // Agregar todos los marcadores nuevamente
        for (const id in instituciones) {
            const institucion = instituciones[id];
            const marker = addMarker(institucion.lat, institucion.lon, institucion.name, institucion.carreras, institucion.imagen);
            markerLayer.addLayer(marker);
        }

        // Ajustar vista del mapa
        map.setView([20.0911, -98.7624], 9);
    });

    // Inicializar mostrando todas las instituciones
    document.getElementById("mostrarTodas").click();



    function abrirReservaModal() {
        const selectInstituciones = document.getElementById('instituciones');
        const institucionSeleccionada = selectInstituciones.options[selectInstituciones.selectedIndex].text;

        const selectCarreras = document.getElementById('carreras');
        const carreraSeleccionada = selectCarreras.options[selectCarreras.selectedIndex].text;
        
        const intitucionLaboratorioInput = document.getElementById('institucionLaboratorio');
        intitucionLaboratorioInput.value = institucionSeleccionada;

        const carreraLaboratorioInput = document.getElementById('carreraLaboratorio');
        carreraLaboratorioInput.value = carreraSeleccionada;
    }

</script>
@include('layouts.footer')
</body>
</html>
