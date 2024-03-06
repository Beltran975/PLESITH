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
                    <h3>{{ __('Actualizacion de usuario') }}</h3>
                </div>
                <hr class="hr-gob" >
                <div class="card">
                    <div class="card-header">
                        <h3>Datos generales</h3>
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
                                <input id="tipo" type="text" class="form-control" name="tipo" value="{{ $produccion->tipo }}" required autocomplete="tipo" autofocus>
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
                                <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ $produccion->descripcion }}" required autocomplete="descripcion" autofocus>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="pais">{{ __('País *')}}</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <input id="pais" type="text" class="form-control" name="pais" value="{{ $produccion->pais }}" required autocomplete="pais" autofocus>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="year">{{ __('Año *')}}</label>
                                    </div>
                                    <div class="col-md-9 mb-3">
                                    <input id="year" type="month" min="1900" max="2099" step="1"  class="form-control" name="year" 
                                    value="{{ $produccion->year }}" required autocomplete="year" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="proposito">{{ __('Propósito *')}}</label>
                                </div>
                                <div class="col-md-6">
                                <input id="proposito" type="text" class="form-control" name="proposito" value="{{ $produccion->proposito }}" required autocomplete="proposito" autofocus>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <div class="row d-flex justify-content-center mb-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
                                </button>
                                
                            </div>
                            <div class="row d-flex justify-content-center mb-3">
                            <input class="btn btn-primary" type="button" onclick="history.back()" name="Cancelar" value="Cancelar">
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </main>
        @include('layouts/footer')




@include('layouts/headregob')
        @include('layouts/header')
                        <div class="modal fade" id="Modal-crear-produccion">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Producción</h4>
                        <input class="btn btn-primary" type="button" onclick="history.back()" name="volver atrás" value="volver atrás">
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('editProduc.update', Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row justify-content-center mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="tipo">{{ __('Tipo *') }}</label>
                                </div>
                                <div class="col-md-6">
                                <input id="tipo" type="text" class="form-control" name="tipo" value="{{ $produccion->tipo }}" required autocomplete="tipo" autofocus>
                                </div>
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
        </div>
        @include('layouts/footer')
</body>
</html>