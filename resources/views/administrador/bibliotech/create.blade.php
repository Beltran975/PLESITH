<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('asset/home-admin.css') }}">
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Bibliotech | PLESITH</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        @include('layouts/datos-gob')
        @include('layouts.nav-admin')
        <main class="main">
            <img src="https://lajornadahidalgo.com/wp-content/uploads/2022/08/CITNOVA-SINCROTON.jpg" alt="img">
            <div class="row">
                <div class="col invisible"></div>
                <div class="col obscuro">
                    <div class="titulo row d-flex  mb-3">
                        <h1>{{ __('Bibliotech') }}</h1>
                    </div>
                    <hr class="hr-gob">
                    <!-- crear bibliotech -->
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">
                                <h4>Crear</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('add.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="control-label" for="titulo">{{ __('Título:') }}</label>
                                        <input class="form-control" type="text" name="titulo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label" for="year">{{ __('Fecha *')}}</label>
                                        <input id="fecha-input" class="form-control" name="year" type="date" min=<?php $hoy=date("Y-m-d"); echo $hoy;?> max="2099" step="1" required />
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label" for="documento">{{ __('Documento:')}}</label>
                                        <div class="tooltipUNO">
                                            <div class="iconUNO">i</div>
                                            <div class="tooltiptextUNO">Éste documento no se podrá modificar</div>
                                        </div>
                                        <input class="form-control" type="file" name="documento" required>
                                    </div>
                                    <div class="mb-5">
                                        <label class="control-label" for="descripcion">{{ __('Descripción:')}}</label>
                                        <textarea class="form-control" name="descripcion" required></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="javascript:history.back()" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <script>
        // Obtener la fecha actual del sistema
        var fechaActual = new Date();
        
        // Formatear la fecha en el formato adecuado para el campo de entrada
        var formattedDate = fechaActual.toISOString().split('T')[0];
        
        // Establecer el valor del campo de entrada como la fecha actual
        document.getElementById('fecha-input').value = formattedDate;
        document.getElementById('#fecha-input').value = new Date().toDateInputValue();
    </script>
</html>