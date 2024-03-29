<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('asset/home-admin.css') }}">    
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-rbs5oRmyz9BDjzS9nEIEUnzM1qDe5ICorxF9uF8g5SeFOByuB+8Z3Gk5Sck/GJvI" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Bibliotech | PLESITH</title>
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
                    <!-- actualizar bibliotech -->
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">
                                <h4>Actualizar</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('bibliotech.update', $datos->id)}}" method="post" enctype="multipart/form-data" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="control-label" for="titulo">{{ __('Título:') }}</label>
                                        <input id="titulo" class="form-control @error('titulo') is-invalid @enderror"  type="text" name="titulo" value="{{$datos->titulo}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label" for="year">{{ __('Fecha:')}}</label>
                                        <input class="form-control @error('titulo') is-invalid @enderror" name="year" type="date" min="1900" max="2099" step="1" value="{{$datos->year}}" required />
                                    </div>
                                    <div class="mb-5">
                                        <label class="control-label" for="descripcion">{{ __('Descripción:')}}</label>
                                        <textarea class="form-control @error('titulo') is-invalid @enderror" name="descripcion" required>{{$datos->descripcion}}</textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" onclick="history.back()" name="volver atrás">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </div>           
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>