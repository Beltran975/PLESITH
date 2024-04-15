<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('asset/nav-admin.css') }}">
    <title>Administrador</title>
  </head>
  <body>
    <!-- boton sidebar -->
    <button id="sidebar-toggle" class="small-screen-only">
      <i class="bi bi-list"></i>
    </button>
    <!-- sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="profile-info">
          <div class="avatar-circle">
            <i class="fa fa-user fa-2x"></i>
          </div>
          <a href="/home-admin"><span>{{ Auth::user()->name }}</span></a>
        </div>
        <ul>
          <li><a href="/administrador/postulaciones/tabla"><i class="bi bi-person-fill"></i>Usuarios</a></li>
          <li><a href="/administrador/producciones/table"><i class="bi bi-file-text-fill"></i> Producciones</a></li>
          <li><a href="/administrador/nodos/tabla"><i class="bi bi-folder2"></i> Nodos de colaboración</a></li>
          <li><a href="/administrador/bibliotech/tabla"><i class="bi bi-file-earmark-check-fill"></i> Bibliotech</a></li>
          <li><a href="/administrador/infotech/tabla"><i class="bi bi-exclamation-circle-fill"></i> Infotech</a></li>
        </ul>
        <div class="container text-center">
          <div aria-labelledby="navbarDropdown">
            <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="bi bi-arrow-left-square"></i> {{ __('Cerrar sesión') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Menú desplegable para el usuario -->
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- abrir/cerrar sidebar -->
    <script>
      $(document).ready(function() {
        $("#sidebar-toggle").click(function() {
          $("#sidebar").toggleClass("show");
        });
      });
    </script>
    <!-- <style>
      /* Asegura que el sidebar esté siempre visible en pantallas más grandes */
      @media screen and (min-width: 769px) {
        .sidebar {
          left: 0; /* Muestra el sidebar */
        }
      }
      </style> -->
  </body>
</html>