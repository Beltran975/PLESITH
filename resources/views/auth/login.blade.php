<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/login.css') }}">        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-rbs5oRmyz9BDjzS9nEIEUnzM1qDe5ICorxF9uF8g5SeFOByuB+8Z3Gk5Sck/GJvI" crossorigin="anonymous">
    <title>Login</title>
  </head>
  <body>
    @include('layouts/headregob')
    @include('layouts/header')
    <br><br><br><br>
    
    <div>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">{{ __('Iniciar Sesion') }}</div>
            
            <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="row mb-3">
                  <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Usuario') }}</label>
                  <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                      @enderror
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>
                  <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                
                <div class="row mb-0">
                  <div class="col-md-8 offset-md-4">
                    <a href="{{ route('register') }}" class="btn btn-primary ">Regístrate aquí</a>
                    <button type="submit" class="btn btn-primary">
                      {{ __('Enviar') }}
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8N+1lUE3+XjwIXqityaM2UwEJrHjeZX/nezF8+Ad5A0tjFkA5Vx7Js1KrI95" crossorigin="anonymous"></script>
    @include('layouts/footer')
  </body>
  </html>
