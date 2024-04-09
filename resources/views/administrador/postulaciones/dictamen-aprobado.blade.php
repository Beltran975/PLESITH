<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Aprobación</title>
</head>
<style>
     body {
        display: flex;
        align-items: center;
        font-family: 'Arial', sans-serif;
    }
</style>
<body>
<h1>Estimado {{$datosUser->user->name}}</h1>
    <p>Nos complace informar que su solicitud cumple con los parámetros necesarios para ser un usuario verificado dentro de la PLATAFORMA ESTATAL DE INVESTIGADORES Y TECNOLÓGOS DE HIDALGO.</p>
    <P>Resaltando los siguientes motivos</P>
    <p><strong>Descripción general:</strong> {{ $descripcion }}</p>
    <p><strong>Razón de la aprobación:</strong> {{ $razonAprobacion === 'Otros' ? $razonTextArea : $razonAprobacion }}</p>
</body>
</html>
