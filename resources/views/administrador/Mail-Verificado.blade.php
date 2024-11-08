<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/formatoCorreo.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Verificación de correo</title>
    
</head>
<body>
    <h1>PLATAFORMA ESTATAL DE INVESTIGADORES Y TECNÓLOGOS DE HIDALGO</h1>
    <p>Para completar el registro de usuario, verifica tu dirección de correo electrónico.</p>
    <a class="btn btn-primary" href="{{ route('aprobarVerificacionDeCorreo', ['userId' => $user->id]) }}">Verificar correo</a>
    <p>*Si no te has registrado con esta dirección de correo recientemente, puedes ignorar este mensaje.</p>
</body>
</html>
