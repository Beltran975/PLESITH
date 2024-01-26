<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
    <strong>Nombre:</strong>
        {{ $profile->name }}
    </p>
    <p>
    <strong>Email:</strong>
        {{ $profile->email }}
    </p>
    <p>
    <strong>CURP:</strong>
        {{ $profile->curp }}
    </p>
    <p>
        <strong>Archivo CURP:</strong>
        <a href="{{ asset('storage/' . $profile->archivoCurp) }}" target="_blank">CURP</a>
    </p>
    <p>
        <strong>Imagen de Perfil:</strong>
        <img src="{{ asset('storage/' . $profile->image_path) }}" alt="Imagen de Perfil" style="max-width: 200px; max-height: 200px;">
    </p>
</body>
</html>