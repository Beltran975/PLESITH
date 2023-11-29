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

  
    <br>
    <main>
    <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h1 class="bottom-buffer">Iniciar sesión</h1>
      </div>
    </div>
      <div class="content">
        <form>
          <!-- Usuario -->
          <div class="input-span">
            <label class="form-label" for="form">Usuario</label>
            <input type="email" id="form" class="form-control" />
          </div>
          
          <!-- Contraseña -->
          <div class="input-span">
            <label class="form-label" for="form">Contraseña</label>
            <input type="password" id="form" class="form-control" />
          </div>

          <div class="mb-3">
            <a href="#!" class="">¿Has olvidado tu contraseña?</a>
          </div>

          <!-- Botones -->
          <div class="mb-3">
            <a href="{{ route('register') }}" class="btn btn-primary ">Regístrate aquí</a>
            <button type="button" class="btn btn-primary">Enviar</button>
          </div>
        </form>
      </div>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8N+1lUE3+XjwIXqityaM2UwEJrHjeZX/nezF8+Ad5A0tjFkA5Vx7Js1KrI95" crossorigin="anonymous"></script>
  @include('layouts/footer')
</body>
</html>
