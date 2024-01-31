<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/administrador.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/estilosformulario.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
    @foreach ($postulantes as $postulante)
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
            <tr>
               
            </tr>
            </tbody>
        </table>
      
    </div>
    </div>
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="aprobacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulario de Aprobación</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>El postulado <span id="modalUsuarioAprobar"></span> cumple con los parámetros necesarios para ser un usuario verificado dentro de la PLATAFORMA ESTATAL DE INVESTIGADORES Y TECNOLÓGICOS DE HIDALGO.</p>
            <label for="dictamenAprobar">Dictamen de Aceptación:</label>
            <input type="file" id="dictamenAprobar" name="dictamenAprobar">
      </div>
      <div class="modal-footer">
      <button class="btn btn-primary" onclick="enviarAprobacion()">Enviar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="negacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulario de Negación</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>El postulado <span id="modalUsuarioNegar"></span> no cumple con los parámetros necesarios para ser un usuario verificado dentro de la PLATAFORMA ESTATAL DE INVESTIGADORES Y TECNOLÓGICOS DE HIDALGO.</p>
            <label for="dictamenNegar">Dictamen de Negación:</label>
            <input type="file" id="dictamenNegar" name="dictamenNegar">
      </div>
      <div class="modal-footer">
      <button class="btn btn-primary" onclick="enviarAprobacion()">Enviar</button>
      </div>
    </div>
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
            { usuario: '{{ $postulante->name }}', investigacion: '{{ $postulante->email }}', fecha: '2022-01-01' },
            { usuario: '{{ $postulante->name }}', investigacion: '{{ $postulante->email }}', fecha: '2022-01-01' },
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
                <a data-bs-toggle="modal" data-bs-target="#aprobacion">Aprobar postulación</a>                
                <a data-bs-toggle="modal" data-bs-target="#negacion">Negar postulación</a>`;

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
      
    </script>
         @endforeach
    </main>
@include('layouts/footer')
</body>
</html>