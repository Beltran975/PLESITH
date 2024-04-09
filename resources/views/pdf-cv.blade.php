<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículum Vitae</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 20px auto;
        }

        h1,
        h2,
        h3 {
            margin-bottom: 10px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section h2 {
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }

        .section-content {
            margin-top: 10px;
        }

        .section-content p {
            margin: 5px 0;
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
        .profile-img {
            max-width: 200px;
            display: block;
            margin: 0 auto;
            border-radius: 50%;
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
</head>

<body>

    <div class="container">
        <header>
            <h1>Perfil PLESITH</h1>
        </header>
        <section class="section">
            <h2>{{ $user->name }}</h2>
            <div class="section-content">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>{{ $user-> institucion}}</td>
                        </tr>
                        <tr>
                            <td>{{ $user-> programa}}</td>

                        </tr>
                        <tr>
                            <td>

                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </section>
        <section class="section">
            <h2>Información PLESITH</h2>
            <div class="section-content">
                <table class="table contenido-produccion">
                    @foreach ( Auth::user()->datos as $dato)
                    <tr>
                        <th>Área de conocimiento</th>
                        <td>{{ $dato -> lineaInv}}</td>
                    </tr>
                    <tr>
                        <th class="rotated-header">Grado académico</th>
                        <td>{{ $dato->grado }}</td>
                    </tr>
                    <tr>
                        <th class="rotated-header">Evidencia del grado académico</th>
                        <td><a href="documentos-users/info-PLESITH/academico/{{ $dato->evidenciaGrado}}" target="blanck_">{{ $dato->evidenciaGrado}}</a></td>
                    </tr>
                    <tr>
                        <th class="rotated-header">Colaboración al SNI</th>
                        <td>{{ $dato-> pertenece}}</td>
                    </tr>
                    <tr>
                        <th class="rotated-header">Evidencia SNI</th>
                        <td><a href="documentos-users/info_PLESITH/evidencia/{{ $dato->evidenciaSni}}" target="blanck_">{{ $dato->evidenciaSni}}</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </section>
        <section class="section">
            <h2>Producciones</h2>
            <div class="section-content">
            @foreach (Auth::user()->producciones as $produccion)
    <table class="table contenido-produccion">
        <tbody>
            <tr>
                <th>Tipo</th>
                <td>{{ $produccion->tipo}}</td>
            </tr>
            <tr>
                <th>Evidencia</th>
                <td scope="row"><a href="documentos-users/produccion/{{ $produccion->evidencia}}" target="blanck_">{{ $produccion->evidencia}}</a></td>
            </tr>
            <tr>
                <th>Autores</th>
                <td>{{ $produccion->autores}}</td>
            </tr>
            <tr>
                <th>Título</th>
                <td>{{ $produccion->titulo}}</td>
            </tr>   
            <tr>
                <th>Descripción</th>
                <td>{{ $produccion->descripcion}}</td>
            </tr>
            <tr>
                <th>País</th>
                <td>{{ $produccion->pais}}</td>
            </tr>
            <tr>
                <th>Fecha</th>
                <td>{{ $produccion->year}}</td>
            </tr>
            <tr>
                <th>Proposito</th>
                <td>{{ $produccion->proposito}}</td>
            </tr>
           
        </tbody>
    </table>
    @endforeach
            </div>
        </section>
    </div>
</body>

</html>