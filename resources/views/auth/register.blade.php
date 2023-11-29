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
<main class="page">
  <br>
  <div class="content">
    <div class="card">
    <div class="content-form">
      
      <form class="form">
        <p class="titulo">Datos Generales</p>
  <!-- Nombre -->
  <div class="mb-4">
  <label class="form-label" for="form2Example1">Nombre completo</label>
    <input type="text" id="form3Example4" class="form-control" 
    pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios"
              required/>
  </div>
<!-- Curp -->
  <div class=" mb-4">
  <label class="form-label" for="form2Example1">Curp</label>
    <input type="file" id="form3Example3" class="form-control" 
    accept=".pdf" placeholder="Seleccionar archivo PDF"/>
  </div>

  <!-- Corre -->
  <div class=" mb-4">
  <label class="form-label" for="form2Example1">Correo electronico</label>
    <input type="email" id="form3Example3" class="form-control"/>
  </div>

  <!-- Contraseña -->
  <div class=" mb-4">
  <label class="form-label" for="form2Example2">Contraseña</label>
    <input type="password" id="form3Example3" class="form-control" />
  </div>

   <!-- Confirmar Contraseña -->
   <div class=" mb-4">
   <label class="form-label" for="confirmPassword">Confirmar Contraseña</label>
    <input type="password" id="confirmPassword" class="form-control" />
  </div>

  <!-- Institucion-->
  <div class=" mb-4">
  <label class="form-label" for="institucion">Institución a la que pertenece</label>
  <select id="institucion" class="form-select">
  <option value="" disabled selected>Seleccionar institución</option>
    <option value="opcion1">institución 1</option>
    <option value="opcion2">institución 2</option>
    <option value="opcion3">institución 3</option>
    </select>
  </div>

  <!-- Programa educativo -->
  <div class=" mb-4">
  <label class="form-label" for="form3Example4">Programa educativo</label>
    <input type="text" id="form3Example4" class="form-control" />
  </div>

   <!-- Fotografia -->
   <div class="form-outline mb-4">
   <label class="form-label" for="form3Example4">Fotografia</label>
    <input type="file" id="form3Example4" class="form-control" accept="image/*"
    placeholder="Seleccionar imagen"/>
  </div>

  <!-- Botones -->
  <a href="{{ route('login') }}">Login</a>
  <button type="button" class="btn btn-primary btn-block mb-4">Enviar</button>
  
</form>
      
    </div>
    </div>
  </div>
</main>
@include('layouts/footer')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8N+1lUE3+XjwIXqityaM2UwEJrHjeZX/nezF8+Ad5A0tjFkA5Vx7Js1KrI95" crossorigin="anonymous"></script>
</body>
</html>