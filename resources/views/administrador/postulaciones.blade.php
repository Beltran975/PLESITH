<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/administrador.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/estilosformulario.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>

    <title>Administrador | PLESITH</title>
    
</head>
<body class="body">
@include('layouts/headregob')
    @include('layouts/header')

    <main class="main">

    <img src="https://lajornadahidalgo.com/wp-content/uploads/2022/08/CITNOVA-SINCROTON.jpg" alt="img">

            <div class="title">
            <div class="row ml-5">
              <h3>{{ __('Postulaciones') }}</h3>
            </div>
            <hr class="hr-gob" >
            <div id="tabGroup">
        <button class="tablinks" id="tab1" onclick="openTab(event, 'content1')">No revisados</button>
        <button class="tablinks" id="tab2" onclick="openTab(event, 'content2')">Revisados</button>
        <div id="postulacionesHeader">
            <p>Total de Postulaciones: <span id="postulacionCount">0</span></p>
        </div>
    </div>

    <div id="content1" class="tabcontent active">
        <h3>No revisados</h3>
        <table>
            <thead>
                <tr>
                    <th>Postulante</th>
                    <th>Línea Investigación</th>
                    <th>Fecha de Postulación</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí puedes añadir filas con información de postulaciones -->
            </tbody>
        </table>
    </div>

    <div id="content2" class="tabcontent">
        <h3>Revisados</h3>
        <table>
            <thead>
                <tr>
                    <th>Postulante</th>
                    <th>Línea Investigación</th>
                    <th>Fecha de Postulación</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí puedes añadir filas con información de postulaciones -->
            </tbody>
        </table>
    </div>
    </div>
    <div class="modal" id="aprobarModal">
        <div class="modal-content">
            <span class="close" onclick="closeAprobarModal()">&times;</span>
            <h2>Formulario de Aprobación</h2>
            <p>El postulado <span id="modalUsuarioAprobar"></span> cumple con los parámetros necesarios para ser un usuario verificado dentro de la PLATAFORMA ESTATAL DE INVESTIGADORES Y TECNOLÓGICOS DE HIDALGO.</p>
            <label for="dictamenAprobar">Dictamen de Aceptación:</label>
            <input type="file" id="dictamenAprobar" name="dictamenAprobar">
            <br><br>
            <button onclick="enviarAprobacion()">Enviar</button>
        </div>
    </div>

    <div class="modal" id="negarModal">
        <div class="modal-content">
            <span class="close" onclick="closeNegarModal()">&times;</span>
            <h2>Formulario de Negación</h2>
            <p>El postulado <span id="modalUsuarioNegar"></span> no cumple con los parámetros necesarios para ser un usuario verificado dentro de la PLATAFORMA ESTATAL DE INVESTIGADORES Y TECNOLÓGICOS DE HIDALGO.</p>
            <label for="dictamenNegar">Dictamen de Negación:</label>
            <input type="file" id="dictamenNegar" name="dictamenNegar">
            <br><br>
            <button onclick="enviarNegacion()">Enviar</button>
        </div>
    <script>
        function openTab(evt, contentId) {
            var i, tabcontent, tablinks;

            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            document.getElementById(contentId).style.display = "block";
            evt.currentTarget.className += " active";

            // Actualizar el contador de postulaciones al cambiar de pestaña
            updatePostulacionCount();
        }
        // Aqui deben de ir los datos de la bd

        // Simulación de datos de postulaciones porque no puedo con la bd troste
        var postulacionesData1 = [
            { usuario: 'Usuario1', investigacion: 'Investigación1', fecha: '2022-01-01' },
            { usuario: 'Usuario2', investigacion: 'Investigación2', fecha: '2022-02-01' },
            { usuario: 'Usuario2', investigacion: 'Investigación2', fecha: '2022-02-01' }

        ];

        var postulacionesData2 = [
            { usuario: 'Usuario3', investigacion: 'Investigación3', fecha: '2022-03-01' },
            { usuario: 'Usuario4', investigacion: 'Investigación4', fecha: '2022-04-01' }
        ];
        // Opciones del boton
        function showOptionsMenu(button, usuario) {
            var optionsMenu = document.createElement('div');
            optionsMenu.className = 'optionsMenu';
            optionsMenu.innerHTML = `
                <a href="#0" onclick="verPostulacion('${usuario}')">Ver Postulación</a>
                <a href="#1" onclick="aprobarPostulacion('${usuario}')">Aprobar Postulación</a>
                <a href="#2" onclick="negarPostulacion('${usuario}')">Negar Postulación</a>
            `;

            button.appendChild(optionsMenu);

            document.addEventListener('click', function hideOptionsMenu() {
                optionsMenu.remove();
                document.removeEventListener('click', hideOptionsMenu);
            });
        }

        function populateTable(tableId, data) {
            var table = document.querySelector(tableId + ' tbody');
            table.innerHTML = '';

            // Ordenar por fecha de más antiguo a más reciente
            data.sort(function (a, b) {
                return new Date(a.fecha) - new Date(b.fecha);
            });

            data.forEach(function (postulacion) {
                var row = table.insertRow();
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);

                cell1.innerHTML = postulacion.usuario;
                cell2.innerHTML = postulacion.investigacion;
                cell3.innerHTML = postulacion.fecha;

                var optionsButton = document.createElement('button');
                optionsButton.className = 'optionsButton';
                optionsButton.innerHTML = '<i class="bi bi-list"></i>';

                optionsButton.addEventListener('click', function (event) {
                    event.stopPropagation(); // Evita que el click en el botón cierre el menú al mismo tiempo
                    showOptionsMenu(optionsButton, postulacion.usuario);
                });

                cell4.appendChild(optionsButton);
            });
        }
        // Termina donde deberian de ir los datos de la bd
        // Mostrar datos iniciales al cargar la página
        populateTable('#content1', postulacionesData1);
        populateTable('#content2', postulacionesData2);

        // Establecer la pestaña activa inicial
        document.getElementById("tab1").click();

        // Función para actualizar el contador de postulaciones
        function updatePostulacionCount() {
            var totalPostulaciones = postulacionesData1.length + postulacionesData2.length;
            document.getElementById('postulacionCount').textContent = totalPostulaciones;
        }

        // Funciones de ejemplo para ver, aprobar y negar postulación
        function verPostulacion(usuario) {
        console.log('Ver postulación de ' + usuario);
    }

    function aprobarPostulacion(usuario) {
        console.log('Aprobar postulación de ' + usuario);
    }

    function negarPostulacion(usuario) {
        console.log('Negar postulación de ' + usuario);
    }
        function aprobarPostulacion(usuario) {
            openAprobarModal();
            document.getElementById('modalUsuarioAprobar').textContent = usuario;
        }

        function negarPostulacion(usuario) {
            openNegarModal();
            document.getElementById('modalUsuarioNegar').textContent = usuario;
        }

        function openAprobarModal() {
            document.getElementById('aprobarModal').style.display = 'block';
        }

        function closeAprobarModal() {
            document.getElementById('aprobarModal').style.display = 'none';
        }

        function enviarAprobacion() {
            // Lógica para enviar el formulario de aprobación
            console.log('Formulario de aprobación enviado');
            closeAprobarModal();
        }

        function openNegarModal() {
            document.getElementById('negarModal').style.display = 'block';
        }

        function closeNegarModal() {
            document.getElementById('negarModal').style.display = 'none';
        }

        function enviarNegacion() {
            // Lógica para enviar el formulario de negación
            console.log('Formulario de negación enviado');
            closeNegarModal();
        }
    </script>
</div>
        
    </main>
@include('layouts/footer')
</body>
</html>