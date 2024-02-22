<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('asset/register.css') }}">    
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-rbs5oRmyz9BDjzS9nEIEUnzM1qDe5ICorxF9uF8g5SeFOByuB+8Z3Gk5Sck/GJvI" crossorigin="anonymous">
        <title>Registro | PLESITH</title>
        <script> //funcion para mayusculas
            function mayus(e) {
                e.value = e.value.toUpperCase();
            }
        </script>
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
                        <form action="{{ route('home.update', Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method ('PUT')
                            
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-4">
                                    <label class="control-label" for="name" >{{ __('Nombre completo *') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus>
                                </div>
                            </div>
                            
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-4">
                                    <label class="control-label" for="curp" class="">{{ __('CURP *')}}</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="curp" ttype="text" onkeyup="mayus(this);" class="form-control" name="curp" value="{{Auth::user()->curp}}" required maxlength="18"><br>
                                </div>
                            </div>
                            
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-4">
                                    <label class="control-label" for="email" class="">{{ __('Correo *') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="email">
                                </div>
                            </div>
                            
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-4">
                                    <label class="control-label" for="password" >{{ __('Contraseña *') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" value="{{Auth::user()->password}}" required autocomplete="new-password">
                                </div>
                            </div>
                            
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-4">
                                    <label for="institucion" class="control-label">{{ __('Institución a la que pertenece *')}}</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" name="institucion" type="text" required value="{{Auth::user()->institucion}}">
                                </div>
                                <br>
                            </div>
                            
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-4">
                                    <label class="control-label" for="programa" class="">{{ __('Programa educativo *')}}</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" onkeypress="return check(event)" id="programa" value="{{Auth::user()->programa}}"  type="text"  name="programa" required>
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
        </main>
        @include('layouts/footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8N+1lUE3+XjwIXqityaM2UwEJrHjeZX/nezF8+Ad5A0tjFkA5Vx7Js1KrI95" crossorigin="anonymous"></script>
        <script>
            function check(e)
            {
                tecla = (document.all) ? e.keyCode : e.which;
                
                //Tecla de retroceso para borrar, siempre la permite
                if (tecla == 8) {
                    return true;
                }
                
                // Patrón de entrada, en este caso solo acepta numeros y letras
                patron = /[A-Za-z]/;
                tecla_final = String.fromCharCode(tecla);
                return patron.test(tecla_final);
            }
        </script>
    </body>
</html>