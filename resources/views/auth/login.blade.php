<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/estiloslogin.css') }}">

</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-y5JQ8Lg4P7W/EzIkeBNMAYA6U2MmAwR8HcHced79ZdAqDEW6r/BbYU3oE0888rwB" crossorigin="anonymous">
  <title>Login</title>
</head>
<body>

  <div class="container">
    <div class="row justify-content-center align-items-center vh-100">
      
      <form>
        <p class="titulo">Iniciar sesión</p>
  <!-- Usuario -->
  <div class="form-outline mb-4">
    <input type="email" id="form2Example1" class="form-control" />
    <label class="form-label" for="form2Example1">Usuario</label>
  </div>

  <!-- Contraseña -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" />
    <label class="form-label" for="form2Example2">Contraseña</label>
  </div>

  <div class="row mb-4">
  <div class="col text-end">
    <a href="#!">¿Has olvidado tu contraseña?</a>
  </div>
</div>
    <br>

  <!-- Botones -->
  <div class="col text-end">
  <a href="{{ route('register') }}" class="btn btn-primary btn-block mb-4"
              >Registrate aqui</a>
  <button type="button" class="btn btn-primary btn-block mb-4">Enviar</button>

 
</form>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8N+1lUE3+XjwIXqityaM2UwEJrHjeZX/nezF8+Ad5A0tjFkA5Vx7Js1KrI95" crossorigin="anonymous"></script>
</body>
</html>

</body>
</html>