<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/documentosinfo.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
    <title>Nodos | PLESITH</title>
</head>
<body class="body">
        @include('layouts/datos-gob')
        
        <main class="main">
            <img src="https://lajornadahidalgo.com/wp-content/uploads/2022/08/CITNOVA-SINCROTON.jpg" alt="img">
            @include('layouts.nav-admin')
            <div class="title">
            <h1>Buscador de nodos</h1>
    <form id="busqueda-form">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo"><br>

        <label for="region">Región:</label>
        <select id="region" name="region">
            <option value="">Selecciona una región</option>
            <option value="Altiplanicie pulquera">Altiplanicie pulquera</option>
            <option value="Valle del mezquital">Valle del mezquital</option>
            <option value="Comarca minera">Comarca minera</option>
            <option value="Huasteca">Huasteca</option>
            <option value="Valle de Tulancingo">Valle de Tulancingo</option>
            <option value="Sierra alta">Sierra alta</option>
            <option value="Sierra gorda">Sierra gorda</option>
            <option value="Sierra baja">Sierra baja</option>
            <option value="Cuenca de mexico">Cuenca de mexico</option>
        </select><br>

        <label for="area">Área de conocimiento:</label>
        <select id="area" name="area">
            <option value="">Selecciona un área de conocimiento</option>
            <option value="Ciencias Naturales">Ciencias Naturales</option>
            <option value="Ciencias Sociales">Ciencias Sociales</option>
            <option value="Matemáticas">Matemáticas</option>
            <option value="Arte y Cultura">Arte y Cultura</option>
            <option value="Tecnología">Tecnología</option>
        </select><br>

        <label for="año">Año:</label>
        <select id="año" name="año">
            <option value="">Selecciona un año</option>
            <option value="2020">2020</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
        </select><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br>

        <label for="institucion">Institución ligada:</label>
        <select id="institucion" name="institucion">
            <option value="">Selecciona una institución</option>
            <option value="Institución 1">Institución 1</option>
            <option value="Institución 2">Institución 2</option>
            <option value="Institución 3">Institución 3</option>
        </select><br>

        <input type="submit" value="Buscar">
        <br>
        <h7>Resultados encontrados</h7>
    </form>

    <div id="resultados">
    </div>

    <script>
        document.getElementById('busqueda-form').addEventListener('submit', function(event) {
            event.preventDefault(); 

            // Obtener los valores de los campos
            var titulo = document.getElementById('titulo').value;
            var region = document.getElementById('region').value;
            var area = document.getElementById('area').value;
            var año = document.getElementById('año').value;
            var nombre = document.getElementById('nombre').value;
            var institucion = document.getElementById('institucion').value;

            // Crear tabla con los resultados en formato vertical
            var tablaResultados = '<table><tr><th>Nombre de los nodos</th><th>Informacion</th></tr>';
            tablaResultados += '<tr><td>Título</td><td>' + titulo + '</td></tr>';
            tablaResultados += '<tr><td>Región</td><td>' + region + '</td></tr>';
            tablaResultados += '<tr><td>Área de Conocimiento</td><td>' + area + '</td></tr>';
            tablaResultados += '<tr><td>Año</td><td>' + año + '</td></tr>';
            tablaResultados += '<tr><td>Nombre</td><td>' + nombre + '</td></tr>';
            tablaResultados += '<tr><td>Institución Ligada</td><td>' + institucion + '</td></tr>';
            tablaResultados += '</table>';

            // Mostrar tabla en la sección de resultados
            document.getElementById('resultados').innerHTML = tablaResultados;
        });
    </script>
                <hr class="hr-gob">
               
            </div>
          

    </main>
   
</body>
</html>