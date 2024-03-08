<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/documentosinfo.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Administrador | PLESITH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @include('layouts.nav-admin')
    <br>
    <div class="container">
        <h4>Crear</h4>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('nuevo.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="titulo">{{ __('Título *') }}</label>
                        <input class="form-control" type="text" name="titulo" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="year">{{ __('Fecha *')}}</label>
                        <input class="form-control" name="year" type="date" min="1900" max="2099" step="1" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="documento">{{ __('Documento *')}}</label>
                        <input class="form-control" type="file" name="documento" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="descripcion">{{ __('Descripción *')}}</label>
                        <textarea class="form-control" name="descripcion" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="javascript:history.back()" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>