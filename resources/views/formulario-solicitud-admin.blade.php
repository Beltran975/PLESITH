<!-- resources/views/formulario-solicitud-admin.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Solicitud</title>
    <link rel="stylesheet" href="{{ asset('asset/home-admin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('layouts.datos-gob')
    @include('layouts.nav-admin')

    <main class="main">
        <div class="container mt-5">
            <h1>Formulario de Solicitud</h1>
            <p>Por favor, completa el siguiente formulario para enviar tu solicitud.</p>

            <form action="{{ route('enviar-formulario') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}"> <!-- Campo oculto para el token -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre Completo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
