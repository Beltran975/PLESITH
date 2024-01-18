<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/register.css') }}">    
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-rbs5oRmyz9BDjzS9nEIEUnzM1qDe5ICorxF9uF8g5SeFOByuB+8Z3Gk5Sck/GJvI" crossorigin="anonymous">
    <title>Registro | PLESITH</title>
  </head>
  <body>
    @include('layouts/headregob')
    @include('layouts/header')
    <main class="main">
    <div class="content-registro form-group">
            <div class="row ml-5">
              <h3>{{ __('Registro de usuario') }}</h3>
            </div>
            <hr class="hr-gob" >
            <div class="card">
              <div class="card-header">
                <h3>Datos generales</h3>
              </div>
                <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="row justify-content-center mb-3">
                  <div class="col-md-4">
                    <label class="control-label" for="name" >{{ __('Nombre completo *') }}</label>
                  </div>
                  <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>{{ $message }}</strong>
                      </div>
                    </span>
                    @enderror
                  </div>
                </div>
                
                <div class="row justify-content-center mb-3">
                  <div class="col-md-4">
                    <label class="control-label" for="curp" class="">{{ __('CURP *')}}</label>
                  </div>
                  <div class="col-md-6">
                    <input id="curp" type="text" class="form-control" name="curp" required><br>
                    <input class="form-control" id="archivoCurp" type="file"  name="archivoCurp" required>
                  </div>
                </div>
                
                <div class="row justify-content-center mb-3">
                  <div class="col-md-4">
                    <label class="control-label" for="email" class="">{{ __('Correo *') }}</label>
                  </div>
                  <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>{{ $message }}</strong>
                      </div>
                    </span>
                    @enderror
                  </div>
                </div>
                
                <div class="row justify-content-center mb-3">
                  <div class="col-md-4">
                    <label class="control-label" for="password" >{{ __('Contraseña *') }}</label>
                  </div>
                  <div class="col-md-6">
                  <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>{{ $message }}</strong>
                      </div>
                    </span>
                    @enderror
                  </div>
                </div>
                
                <div class="row justify-content-center mb-3">
                  <div class="col-md-4">
                    <label class="control-label" for="password-confirm">{{ __('Confirmar contraseña *') }}</label>
                  </div>
                  <div class="col-md-6">
                  <input class="form-control" id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password">
                  </div>
                </div>
                
                <div class="row justify-content-center mb-3">
                  <div class="col-md-4">
                    <label for="institucion" class="control-label">{{ __('Institución a la que pertenece *')}}</label>
                  </div>
                  <div class="col-md-6">
                  <select class="form-control" name="institucion" id="institucion" required>
                      <option name="institucion" value="" disabled selected>Seleccionar</option>
                      <option name="institucion" value="opcion1">Escuela Superior de Actopan</option>
                      <option name="institucion" value="opcion2">Universidad Tecnológica del Valle del Mezquital</option>
                      <option name="institucion" value="opcion3">Centro Universitarío Hídalguense</option>
                    </select>
                  </div>
                </div>
                
                <div class="row justify-content-center mb-3">
                  <div class="col-md-4">
                    <label class="control-label" for="programa" class="">{{ __('Programa educativo *')}}</label>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="programa" type="text"  name="programa" required>
                  </div>
                </div>
                
                <div class="row justify-content-center mb-3">
                  <div class="col-md-4">
                    <label for="foto" class="control-label">{{ __('Fotografia de perfil *')}}</label>
                  </div>  
                  <div class="col-md-6">
                    <input class="form-control" id="foto" type="file" name="foto" required>
                  </div>
                </div>
                
                <div class="row d-flex justify-content-center mb-3">
                    <button type="submit" class="btn btn-primary">
                      {{ __('Enviar') }}
                    </button>
                </div>
                
              </form>
                </div>
            </div>
    </div> 
    </main>
    @include('layouts/footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8N+1lUE3+XjwIXqityaM2UwEJrHjeZX/nezF8+Ad5A0tjFkA5Vx7Js1KrI95" crossorigin="anonymous"></script>
  </body>
  </html>