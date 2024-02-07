<html>

<head>
    <title>Tu Vista</title>
</head>

<body>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre de Usuario</th>
                <th>Email</th>
                <th>Postulaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            @if ($user->postulaciones->count() > 0)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach ($user->postulaciones as $postulacion)
                    <a href="storage/postulaciones/{{ $postulacion->pdfPostulacion }}" target="_blank">{{ $postulacion->pdfPostulacion }}</a>
                    @endforeach
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>

    </table>
</body>

</html>