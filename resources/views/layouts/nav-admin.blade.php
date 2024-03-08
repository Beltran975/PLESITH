<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('asset/adminHome.css') }}">

  </head>
  <body>
    <section class="container">
      <div class="sidebar">
        
        <div class="profile-info">
          <div class="avatar-circle">
            <i class="fa fa-user fa-2x"></i>
          </div>
          <span>{{ Auth::user()->name }}</span>
        </div>
        <ul>
          <li><a href="/administrador/postulaciones/tabla"><i class="bi bi-person-fill"></i> Postulaciones</a></li>
          <li><a href="#"><i class="bi bi-file-text-fill"></i> Producciones</a></li>
          <li><a href="#"><i class="bi bi-folder2"></i> Nodos de colaboración</a></li>
          <li><a href="/registros"><i class="bi bi-file-earmark-check-fill"></i>Bibliotech</a></li>
          <li><a href="/tablaInfo"><i class="bi bi-exclamation-circle-fill"></i> Infotech</a></li>
        </ul>
        <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Cerrar sesión
        </button>
      </div>
      <div class="trigger-area" style="height: 100%; width: 20px; position: fixed; top: 0; left: 0;"></div>
    </section>
    
    <!-- Menú desplegable para el usuario -->
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </div>
  </body>
</html>
