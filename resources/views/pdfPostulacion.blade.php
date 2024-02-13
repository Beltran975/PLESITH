<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Postulación</title>
</head>
<style>
    body {
        display: flex;
        align-items: center;
        font-family: 'Arial', sans-serif;
    }

    h1 {
        color: white;
        font-family: 'Arial', sans-serif;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }


    .title {
        color: white;
        font-size: xx-large;
        background-color: grey;
        height: 50px;
    }

    .title p {
        margin-left: 5%;
    }

    th,
    td {
        border: none;
        padding: 8px;
        text-align: left;
    }

 .contenido-produccion  td{
    border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
 }

 .contenido-produccion th{
    border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
 }
</style>

<body>
    <div class="title">
        <p>Datos de Postulación</p>
    </div>
    <table class="table">
        <tbody>
            <tr>
                <th>Nombre</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th class="rotated-header">E-mail</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th class="rotated-header">CURP</th>
                <td>{{ $user->curp }}</td>
            </tr>
            <tr>
                <th class="rotated-header">Institución a la que Pertenece</th>
                <td>{{ $user-> institucion}}</td>
            </tr>
            <tr>
                <th class="rotated-header">Programa Educativo</th>
                <td>{{ $user-> programa}}</td>
            </tr>
        </tbody>
    </table>
    <div class="title">
        <p>Información PLESITH</p>
    </div>
    <table class="table">
        <tbody>
            <tr>
                <th>Area de Conocimiento</th>
                <td>Físico-Matemático y Ciencias de la Tierra</td>
            </tr>
            <tr>
                <th class="rotated-header">Grado Académico</th>
                <td>Ingeniería</td>
            </tr>
            <tr>
                <th class="rotated-header">¿Pertenece al ESNI?:</th>
                <td>Sí</td>
            </tr>
            <tr>
                <th class="rotated-header">Evidencia SNI</th>
                <td><a href="storage/archivos_curp/{{ $user-> archivoCurp}}">DocumentoSNI.pdf</a></td>
            </tr>
        </tbody>
    </table>
    <div class="title">
        <p>Producciones </p>
    </div>
    <div>
    </div>
    <table class="table contenido-produccion">
        <tbody>
            <tr>
                <th class="rotated-header">Tema de la Investigación:</th>
                <td class="contenido-produccion">Bases de Datos</td>
            </tr>
            <tr>
                <th class="rotated-header">Categoría:</th>
                <td class="contenido-produccion">Nacional</td>
            </tr>
            <tr>
                <th class="rotated-header">Líder:</th>
                <td class="contenido-produccion">Dr. Ana García</td>
            </tr>
            <tr>
                <th class="rotated-header">Colaboradores:</th>
                <td class="contenido-produccion">Ing. Carlos Martínez</td>
            </tr>
            <tr>
                <th class="rotated-header">Descripción:</th>
                <td class="contenido-produccion">Este estudio examina los desarrollos más recientes en la eficiencia de celdas solares, al combinar los principios de nanotecnología, química y física aplicada. Los autores, con experiencia en sus respectivos campos, exploran la mejora de la conversión fotovoltaica y la reducción de pérdidas energéticas.</td>
            </tr>
            <tr>
                <th class="rotated-header">Documentación:</th>
                <td class="contenido-produccion"><a href="storage/archivos_curp/{{ $user-> archivoCurp}}">Ejemplo.pdf</a></td>
            </tr>
        </tbody>
    </table>
    <!---->
    <table class="table contenido-produccion">
        <tbody>
            <tr>
                <th class="rotated-header">Tema de la Investigación:</th>
                <td class="contenido-produccion">Bases de Datos</td>
            </tr>
            <tr>
                <th class="rotated-header">Categoría:</th>
                <td class="contenido-produccion">Nacional</td>
            </tr>
            <tr>
                <th class="rotated-header">Líder:</th>
                <td class="contenido-produccion">Dr. Ana García</td>
            </tr>
            <tr>
                <th class="rotated-header">Colaboradores:</th>
                <td class="contenido-produccion">Ing. Carlos Martínez</td>
            </tr>
            <tr>
                <th class="rotated-header">Descripción:</th>
                <td class="contenido-produccion">Este estudio examina los desarrollos más recientes en la eficiencia de celdas solares, combinando principios de nanotecnología, química y física aplicada. Los autores, con experiencia en sus respectivos campos, exploran la mejora de la conversión fotovoltaica y la reducción de pérdidas energéticas.</td>
            </tr>
            <tr>
                <th class="rotated-header">Documentación:</th>
                <td class="contenido-produccion"><a href="storage/archivos_curp/{{ $user-> archivoCurp}}">Ejemplo.pdf</a></td>
            </tr>
        </tbody>
    </table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>