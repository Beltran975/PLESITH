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
                
                <div class="titulo row d-flex  mb-3">
                    <h3>Datos Generales</h3>
                    <h3>|</h3>
                    <h3>{{ Auth::user()->name }}</h3>
                    <ul class="hidden">
                        <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
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
            <div class="col-md-6">
                <p>Valentina Sánchez</p>
                <p>valentina.sanchez@email.com</p>
                <p>SANV031020MDFLR05</p>
                <p>Universidad Tecnológica del Valle</p>
                <p>Ingeniería en Sistemas Computacionales</p>
                <div class="image-Ipersonal">
                    <img src="https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="IMGperfil">
                </div>
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
        <div class="row form-outline md-4">
            <div class="col-md-4">
                <label class="form-label" for="institucion">Linea de investigacion</label>
            </div>
            <div class="col-md-8">
                <select id="institucion" class="form-select">
                    <option value="" disabled selected>Seleccionar institución</option>
                    <option value="opcion1">institución 1</option>
                    <option value="opcion2">institución 2</option>
                    <option value="opcion3">institución 3</option>
                </select>
            </div>
        </div>
        <!-- Grado Academico -->
        <div class="row form-outline mb-4">
            <div class="col-md-4">
                <label class="form-label" for="form2Example1">Grado Academico</label>
            </div>
            <div class="col-md-8">
            <input type="text" id="form3Example4" class="form-control" 
            pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios"
            required/>
            </div>
        </div>
        <!-- Evidencia Grado Academico -->
        <div class="row form-outline mb-4">
            <div class="col-md-4">
            <label class="form-label" for="form2Example1">Evidencia del Gardo Academico </label>
            </div>
            <div class="col-md-8">
            <input type="file" id="form3Example3"  
            accept=".pdf" placeholder="Seleccionar archivo PDF"/>
            </div>
        </div>
        <!-- Pertenece al SNI -->
        <div class="row form-outline mb-4">
            <div class="col-md-4">
                <label class="form-label">¿Pertenece al SNI?</label>
            </div>
            <div class="col-md-8">
                <input type="radio" class="btn-check" name="sniStatus" id="sniSi" autocomplete="off" value="si">
                <label class="btn" for="sniSi">Sí</label>
                <input type="radio" class="btn-check" name="sniStatus" id="sniNo" autocomplete="off" value="no">
                <label class="btn" for="sniNo">No</label>
            </div>
        </div>
        <!-- Evidencia de SNI -->
        <div class="row form-outline mb-4">
            <div class="col-md-4">
                <label class="form-label" for="form2Example1">Evidencia del Gardo Academico </label>
            </div>
            <div class="col-md-8">
                <input type="file" id="form3Example3" 
                accept=".pdf" placeholder="Seleccionar archivo PDF"/>
            </div>
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
        <div class="nav-producciones">
            <ul class="nav">
                <li class="nav-link" onclick="showTab('1')"><a href="#">1</a></li>
                <li class="nav-link" onclick="showTab('2')"><a href="#">2</a></li>
                <li class="nav-link" onclick="showTab('3')"><a href="#">3</a></li>
                <li class="nav-link" onclick="showTab('4')"><a href="#">4</a></li>
            </ul>
            
            <!--Botones de CRUD-->
            <div class="nav-crud">
                    <a href="#" class="btn btn-primary">
                        <i class="bi bi-plus-circle-fill"></i>
                    </a>
                    <a href="#" class="btn btn-secondary">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="#" class="btn btn-danger">
                        <i class="bi bi-trash3-fill"></i>
                    </a>
            </div>
        </div>
        <div id="tab1" class="tabs-producciones active">
            <table class="table contenido produccion">
                <tbody>
                    <tr>
                        <th class="rotated-header">Tipo:</th>
                        <td class="contenido-produccion">Investigación</td>
                    </tr>
                    <tr>
                        <th class="rotated-header">Evidencia:</th>
                        <td class="contenido-produccion">Datos recopilados de experimentos controlados y análisis estadísticos.</td>
                    </tr>
                    <tr>
                        <th class="rotated-header">Autor(es):</th>
                        <td class="contenido-produccion">Dr. Ana García, Ing. Carlos Martínez</td>
                    </tr>
                    <tr>
                        <th class="rotated-header">Titulo:</th>
                        <td class="contenido-produccion">"Avances en la Eficiencia Energética de Celdas Solares: Un Enfoque Multidisciplinario"</td>
                    </tr>
                    <tr>
                        <th class="rotated-header">Descripción:</th>
                        <td class="contenido-produccion">Este estudio examina los desarrollos más recientes en la eficiencia de celdas solares, combinando principios de nanotecnología, química y física aplicada. Los autores, con experiencia en sus respectivos campos, exploran la mejora de la conversión fotovoltaica y la reducción de pérdidas energéticas.</td>
                    </tr>
                    <tr>
                        <th class="rotated-header">País:</th>
                        <td class="contenido-produccion">Estados Unidos</td>
                    </tr>                
                    <tr>
                        <th class="rotated-header">Año:</th>
                        <td class="contenido-produccion">2023</td>
                    </tr>
                    <tr>
                        <th class="rotated-header">Propósito:</th>
                        <td class="contenido-produccion">El propósito principal de esta investigación es proponer soluciones innovadoras para aumentar la eficiencia de las celdas solares, contribuyendo así a la transición hacia fuentes de energía más sostenibles. Además, se busca establecer un estándar para futuras investigaciones en el campo de la energía renovable.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="tab2" class="tabs-producciones">
            <!-- Contenido del tab 2 -->
            <p>Contenido del Tab 2</p>
        </div>
        <div id="tab3" class="tabs-producciones">
            <!-- Contenido del tab 3 -->
            <p>Contenido del Tab 3</p>
        </div>
        <div id="tab4" class="tabs-producciones">
            <!-- Contenido del tab 4 -->
            <p>Contenido del Tab 4</p>
        </div>
    </div>
</div>
</div>
</div>
  <hr>
  <div class="row d-flex justify-content-center mb-3">
  
    <button type="submit" class="btn btn-primary btn-sm " name="accion" value="descargar">Descargar</button>
    
    <button type="button" class="btn btn-primary btn-sm ml-2">Guardar</button>

  </div>
            <hr>
   </main>
    @include('layouts/footer')

    <!-- Include Bootstrap JS and Popper.js before closing body tag -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
  function showTab(tabId) {
    // Oculta todas las tabs
    var tabs = document.getElementsByClassName('tabs-producciones');
    for (var i = 0; i < tabs.length; i++) {
      tabs[i].classList.remove('active');
    }

    // Muestra la tab actual
    document.getElementById('tab' + tabId).classList.add('active');

    // Actualiza el estilo de la pestaña activa
    var navLinks = document.getElementsByClassName('nav-link');
    for (var i = 0; i < navLinks.length; i++) {
      navLinks[i].classList.remove('active');
    }
    document.querySelector('[onclick="showTab(\'' + tabId + '\')"]').classList.add('active');
  }
</script>
</body>
</html>