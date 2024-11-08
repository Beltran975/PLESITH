<!-- Correo con link de formulario para registrar nuevos encargados de universidades -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Enlace</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style> 
</head>
<body>
    <div class="container">
        <h1>Solicitud de Enlace</h1>
        <p>Haz clic en el siguiente enlace para completar tu solicitud:</p>
        <a href="{{ $enlace }}" class="button">Completar Solicitud</a>
        <p>Si no solicitaste este enlace, puedes ignorar este correo.</p>
        <p>Gracias,</p>
        <p>El equipo de PLESITH</p>
    </div>
</body>
</html>
