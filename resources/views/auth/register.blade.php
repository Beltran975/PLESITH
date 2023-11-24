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

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
      <div class="card">
      <form>
        <p class="titulo">Datos Generales</p>
  <!-- Nombre -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form2Example1">Nombre completo</label>
    <input type="text" id="form3Example4" class="form-control" 
    pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios"
              required/>
  </div>
<!-- Curp -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form2Example1">Curp</label>
    <input type="file" id="form3Example3" class="form-control" 
    accept=".pdf" placeholder="Seleccionar archivo PDF"/>
  </div>

  <!-- Corre -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form2Example1">Correo electronico</label>
    <input type="email" id="form3Example3" class="form-control"/>
  </div>

  <!-- Contraseña -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form2Example2">Contraseña</label>
    <input type="password" id="form3Example3" class="form-control" />
  </div>

   <!-- Confirmar Contraseña -->
   <div class="form-outline mb-4">
   <label class="form-label" for="confirmPassword">Confirmar Contraseña</label>
    <input type="password" id="confirmPassword" class="form-control" />
  </div>

  <!-- Institucion-->
  <div class="form-outline mb-4">
  <label class="form-label" for="institucion">Institución a la que pertenece</label>
  <select id="institucion" class="form-select">
  <option value="" disabled selected>Seleccionar institución</option>
    <option value="opcion1">institución 1</option>
    <option value="opcion2">institución 2</option>
    <option value="opcion3">institución 3</option>
    </select>
  </div>

  <!-- Programa educativo -->
  <div class="form-outline mb-4">
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8N+1lUE3+XjwIXqityaM2UwEJrHjeZX/nezF8+Ad5A0tjFkA5Vx7Js1KrI95" crossorigin="anonymous"></script>
</body>
</html>
</body>

</html>