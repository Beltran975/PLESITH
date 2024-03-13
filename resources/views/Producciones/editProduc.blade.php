<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('asset/register.css') }}">    
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-rbs5oRmyz9BDjzS9nEIEUnzM1qDe5ICorxF9uF8g5SeFOByuB+8Z3Gk5Sck/GJvI" crossorigin="anonymous">
        <title>Document</title>
    </head>
    <body>
        @include('layouts/headregob')
        @include('layouts/header')
        <main class="main">
            <div class="content-registro form-group">
                <div class="row ml-5">
                    <h3>{{ __('Actualizacion') }}</h3>
                </div>
                <hr class="hr-gob" >
                <div class="card">
                    <div class="card-header">
                        <h3>Producción</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('editProduc.update', $produccion->id_pro)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="tipo">{{ __('Tipo *') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="tipo" required>
                                        <option name="tipo" disabled selected>{{ $produccion->tipo }}</option>
                                        <option name="tipo" value="Libros o capitulos de libro">Libros o capítulos de libro</option>
                                        <option name="tipo" value="Articulos arbitrados y articulos indexados">Artículos arbitrados y artículos indexados</option>
                                        <option name="tipo" value="Propiedad intelectual">Propiedad intelectual</option>
                                        <option name="tipo" value="Modelos de utilidad">Modelos de utilidad</option>
                                        <option name="tipo" value="Patentes">Patentes</option>
                                        <option name="tipo" value="Prototipos">Prototipos</option>
                                        <option name="tipo" value="Transferencia de tecnología">Transferencia de tecnología</option>
                                        <option name="tipo" value="Desarrollo de infraestructura">Desarrollo de infraestructura</option>
                                        <option name="tipo" value="Informes técnicos">Informes técnicos</option>
                                        <option name="tipo" value="Obras artísticas">Obras artísticas</option>
                                        <option name="tipo" value="Otro">Otro</option>
                                    </select>
                                    
                                </div>
                            </div>
                            
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="autores">{{ __('Autor (es) *')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input id="autores" type="text" class="form-control" name="autores" value="{{ $produccion->autores }}" required autocomplete="autores" autofocus>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="titulo">{{ __('Título *')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input id="titulo" type="text" class="form-control" name="titulo" value="{{ $produccion->titulo }}" required autocomplete="titulo" autofocus>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="descripcion">{{ __('Descripción *')}}</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10">{{ $produccion->descripcion }}</textarea>
                                    
                                </div>
                            </div>

                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="pais">{{ __('País *')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input id="pais" type="text" class="form-control" name="pais" value="{{ $produccion->pais }}" required autocomplete="pais" autofocus>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="year">{{ __('Fecha *')}}</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input id="year" type="month" min="1900" max="2099" step="1"  class="form-control" name="year" value="{{ $produccion->year }}" required autocomplete="year" autofocus>
                                </div>
                            </div>
                            
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="proposito">{{ __('Propósito *')}}</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="proposito" required>
                                        <option name="proposito" disabled selected>{{ $produccion->proposito }}</option>
                                        <option name="proposito" value="Asimilacion de tecnologia">Asimilación de tecnología</option>
                                        <option name="proposito" value="Creación">Creación</option>
                                        <option name="proposito" value="Desarrollo tecnológico">Desarrollo tecnológico</option>
                                        <option name="proposito" value="Difusión">Difusión</option>
                                        <option name="proposito" value="Generación de conocimiento">Generación de conocimiento</option>
                                        <option name="proposito" value="Investigación aplicada">Investigación aplicada</option>
                                        <option name="proposito" value="Transferencia tecnologica">Transferencia tecnológica</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <div class="row d-flex justify-content-center mb-3">
                                    <input class="btn btn-secondary" type="button" onclick="history.back()" name="Cancelar" value="Cancelar">
                                </div>
                                <div class="row d-flex justify-content-center mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Actualizar') }}
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div> 
        </main>
        @include('layouts/footer')
</body>
</html>