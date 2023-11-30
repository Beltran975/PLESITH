<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/home.css') }}">        
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    @include('layouts/headregob')
    @include('layouts/header')
    <main class="page">
        <div class="content">
            <div class="green-box">
                
                <div class="titulo">
                    <h3>Datos Generales</h3>
                    <ul class="hidden">
                        <li><a href="#">{{ Auth::user()->name }}</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>

<!-- Informacion personal -->
<div class="card mb-3">
    <div class="card-header" data-bs-toggle="collapse" href="#informacionPersonal">
         Informacion personal
    </div>
    <div class="card-body collapse" id="informacionPersonal">
        <div class="row">
            <div class="col-md-6">
                <p>Nombre:</p>
                <p>Correo:</p>
                <p>CURP:</p>
                <p>Institucion a la que pertenece:</p>
                <p>Programa educativo:</p>
                <p>Fotografia del perfil:</p>
            </div>
            
        </div>
    </div>
</div>

<!-- Informacion PLESITH -->
<div class="card mb-3">
    <div class="card-header" data-bs-toggle="collapse" href="#informacionPLESITH">
         Informacion PLESITH
    </div>
    <div class="card-body collapse" id="informacionPLESITH">
        <form>
        <div class="form-outline mb-4">
<label class="form-label" for="institucion">Linea de investigacion</label>
<select id="institucion" class="form-select">
<option value="" disabled selected>Seleccionar institución</option>
<option value="opcion1">institución 1</option>
<option value="opcion2">institución 2</option>
<option value="opcion3">institución 3</option>
</select>
</div>
<!-- Grado Academico -->
<div class="form-outline mb-4">
<label class="form-label" for="form2Example1">Grado Academico</label>
<input type="text" id="form3Example4" class="form-control" 
pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios"
      required/>
</div>
<!-- Evidencia Grado Academico -->
<div class="form-outline mb-4">
<label class="form-label" for="form2Example1">Evidencia del Gardo Academico </label>
<input type="file" id="form3Example3" class="form-control" 
accept=".pdf" placeholder="Seleccionar archivo PDF"/>
</div>

<!-- Pertenece al SNI -->
<div class="form-outline mb-4">
<label class="form-label">¿Pertenece al SNI?</label>
<input type="radio" class="btn-check" name="sniStatus" id="sniSi" autocomplete="off" value="si">
<label class="btn btn-outline-primary" for="sniSi">Sí</label>

<input type="radio" class="btn-check" name="sniStatus" id="sniNo" autocomplete="off" value="no">
<label class="btn btn-outline-primary" for="sniNo">No</label>
</div>

<!-- Evidencia de SNI -->
<div class="form-outline mb-4">
<label class="form-label" for="form2Example1">Evidencia del Gardo Academico </label>
<input type="file" id="form3Example3" class="form-control" 
accept=".pdf" placeholder="Seleccionar archivo PDF"/>
</div>
        </form>
    </div>
</div>

<!-- Produccion -->
<div class="card mb-3">
    <div class="card-header" data-bs-toggle="collapse" href="#produccion">
         Produccion
    </div>
    <div class="card-body collapse" id="produccion">
    
        <form>
        <div class="row">
            <div class="col-md-4">
            <p>Tipo:</p>  
            <p>Evidencia:</p> 
            <p>Autor(es):</p> 
            <p>Titulo:</p> 
            <p>Descripción:</p> 
            <p>País:</p> 
            <p>Año:</p> 
            <p>Propósito:</p>
            </div>
            
        </div>

            <!-- Buttons -->
            
        </form>
    </div>
</div>
</div>

  </div>
  <hr>
  <div class="d-flex justify-content-center mb-3">
                <button type="submit" class="btn btn-primary btn-sm me-2" name="accion" value="descargar">Descargar</button>
                <button type="button" class="btn btn-primary btn-sm">Guardar</button>
            </div>
            <hr>
   </main>
    @include('layouts/footer')

    <!-- Include Bootstrap JS and Popper.js before closing body tag -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>