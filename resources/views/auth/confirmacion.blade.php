<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de registro</title>
</head>
<body>
    <h1>¡Bienvenido, {{ $user->name }}!</h1>
    <p>Gracias por registrarte en nuestro sitio. Por favor, haz clic en el siguiente enlace para confirmar tú correo electrónico:</p>
    <a href="{{ route('confirmacion', $user->email_token) }}">Confirmar correo electrónico</a>
</body>
</html>
