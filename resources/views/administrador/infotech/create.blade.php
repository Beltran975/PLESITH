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
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('nuevo.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-4">
                            <label class="form-label" for="titulo">{{ __('Título *') }}</label>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="titulo" required>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-4">
                            <label class="form-label" for="year">{{ __('Año *')}}</label>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" name="year" type="date" min="1900" max="2099" step="1" required />
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-4">
                            <label class="form-label" for="documento">{{ __('Documento *')}}</label>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="file" name="documento" required>
                        </div>                                                
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-md-4">
                            <label class="form-label" for="descripcion">{{ __('Descripción *')}}</label>
                        </div>
                        <div class="col-md-6">
                            <textarea class="form-control" name="descripcion" required></textarea>
                        </div>
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