<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>PDF Title</title>
</head>
<body>
    <h1>Postulación PLESITH</h1>
    <p>Usuario: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>CURP: {{ $user->curp }}</p>
    <p>Institución: {{ $user-> institucion}}</p>
    <p>
        <strong>Imagen de Perfil:</strong>
        <img src="{{ asset('storage/' . $user->image_path) }}" alt="Imagen de Perfil" style="max-width: 200px; max-height: 200px;">
    </p>
</body>
</html>
