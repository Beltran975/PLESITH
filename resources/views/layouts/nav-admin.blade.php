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
  <button id="sidebar-toggle" class="small-screen-only" style="z-index: 999; position: absolute; top: 60%; left: 50%; transform: translate(-50%, -50%);">Abrir Sidebar</button> <!-- Botón solo visible en pantallas pequeñas -->

  <div class="sidebar" id="sidebar">
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
      <li><a href="/administrador/bibliotech/tabla"><i class="bi bi-file-earmark-check-fill"></i> Bibliotech</a></li>
      <li><a href="/administrador/infotech/tabla"><i class="bi bi-exclamation-circle-fill"></i> Infotech</a></li>
    </ul>
    <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      Cerrar sesión
    </button>
  </div>

  <!-- Menú desplegable para el usuario -->
  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // Event listener para abrir/cerrar el sidebar cuando se hace clic en el botón
      $("#sidebar-toggle").click(function() {
        $("#sidebar").toggleClass("show");
      });
    });
  </script>

  <style>
    /* Asegura que el sidebar esté siempre visible en pantallas más grandes */
    @media screen and (min-width: 769px) {
      .sidebar {
        left: 0; /* Muestra el sidebar */
      }
    }
  </style>
</body>
</html>
