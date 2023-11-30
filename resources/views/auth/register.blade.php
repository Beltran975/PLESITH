<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/register.css') }}">     
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-rbs5oRmyz9BDjzS9nEIEUnzM1qDe5ICorxF9uF8g5SeFOByuB+8Z3Gk5Sck/GJvI" crossorigin="anonymous">
    <title>Registro</title>
  </head>
  <body>
    @include('layouts/headregob')
    @include('layouts/header')
    <br><br>
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div >
            <div class="card-header">{{ __('Iniciar Sesion') }}</div>
            
            <div>
              <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="row mb-3">
                  <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre completo *') }}</label>
                  <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="curp" class="col-md-4 col-form-label text.md-end">{{ __('CURP *')}}</label>
                  <div class="col-md-6">
                    <input id="curp" type="text" class="form-control" name="curp" required><br>
                    <input id="archivoCurp" type="file" class="form-control" name="archivoCurp" required>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo *') }}</label>
                  <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña *') }}</label>
                  <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña *') }}</label>
                  <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="institucion" class="col-md-4 col-form-label text-md-end">{{ __('Institución a la que pertenece *')}}</label>
                  <div class="col-md-6">
                    <select name="institucion" id="institucion" class="form-control" required>
                      <option name="institucion" value="" disabled selected>Seleccionar</option>
                      <option name="institucion" value="opcion1">Institución 1</option>
                      <option name="institucion" value="opcion2">Institución 2</option>
                      <option name="institucion" value="opcion3">Institución 3</option>
                    </select>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="programa" class="col-md-4 col-form-label text-md-end">{{ __('Programa educativo *')}}</label>
                  <div class="col-md-6">
                    <input id="programa" type="text" class="form-control" name="programa" required>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="foto" class="col-md-4 col-form-label text-md-end">{{ __('Fotografia de perfil *')}}</label>
                  <div class="col-md-6">
                    <input id="foto" type="file" class="form-control" name="foto" required>
                  </div>
                </div>
                
                <div class="row mb-0">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                      {{ __('Enviar') }}
                    </button>
                  </div>
                </div>
                <br>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('layouts/footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8N+1lUE3+XjwIXqityaM2UwEJrHjeZX/nezF8+Ad5A0tjFkA5Vx7Js1KrI95" crossorigin="anonymous"></script>
  </body>
  </html>