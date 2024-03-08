<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('asset/register.css') }}">    
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-rbs5oRmyz9BDjzS9nEIEUnzM1qDe5ICorxF9uF8g5SeFOByuB+8Z3Gk5Sck/GJvI" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Bibibliotech | PLESITH</title>
    </head>
<body>
    @include('layouts/headregob')
    @include('layouts/header')
    <main class="main">
        <div class="content-registro form-group">
            <div class="row ml-5">
                <h3>{{ __('Actualización') }}</h3>
            </div>
            <hr class="hr-gob" >
            <div class="card">
                <div class="card-header">
                    <h3>Bibliotech</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('bibliotech.update', $datos->id)}}" method="post" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                        
                        <div class="row justify-content-center mb-2">
                            <div class="col-md-4">
                                <label class="control-label" for="titulo">{{ __('Título *') }}</label>
                            </div>
                            <div class="col-md-6">
                                <input id="titulo" class="form-control @error('titulo') is-invalid @enderror"  type="text" name="titulo" value="{{$datos->titulo}}" required>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-2">
                            <div class="col-md-4">
                                <label class="control-label" for="year">{{ __('Fecha *')}}</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control @error('titulo') is-invalid @enderror" name="year" type="date" min="1900" max="2099" step="1" value="{{$datos->year}}" required />
                            </div>
                        </div>
                        <!-- <div class="row justify-content-center mb-2">
                            <div class="col-md-4">
                                <label class="form-label" for="documento">{{ __('Documento *')}}</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="file" name="documento" required>
                            </div>                                                
                        </div> -->
                        <div class="row justify-content-center mb-2">
                            <div class="col-md-4">
                                <label class="control-label" for="descripcion">{{ __('Descripción *')}}</label>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control @error('titulo') is-invalid @enderror" name="descripcion" required>{{$datos->descripcion}}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="history.back()" name="volver atrás">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @include('layouts/footer')
</body>
</html>