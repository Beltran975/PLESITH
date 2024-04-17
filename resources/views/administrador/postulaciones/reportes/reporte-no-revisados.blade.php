<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte general de usuarios</title>
</head>
<style>
    * {
        font-family: Arial, Helvetica, sans-serif;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    table,
    td,
    th {
        border: 1px solid black;
    }

    td,
    th {
        padding: 5px;
        text-align: left;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
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
</style>

<body>
    <main>
        <div class="title">
            <p>Postulaciones no revisadas</p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Área de conocimiento</th>
                    <th>Estatus</th>
                    <th>Fecha de postulación</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                @foreach ($user->postulaciones as $postulacion)
                @if($user->postulaciones->count() > 0 && $postulacion->estatus == 'No revisado' )
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user-> programa}}</td>
                    <td>{{ $postulacion->estatus}}</td>
                    <td>{{ $postulacion->created_at->format('d/m/Y') }}</td>
                </tr>
                @endif
                @endforeach
                @endforeach
            </tbody>
        </table>
    </main>
</body>

</html>