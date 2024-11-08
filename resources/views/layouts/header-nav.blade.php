<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/header.css') }}">
    <title>Document</title>
</head>

<body>
    <header>
       <div class="title">
       <a class="btn btn-xs" href="/">
            <h3>PLATAFORMA ESTATAL DE INVESTIGADORES Y TECNÓLOGOS DE HIDALGO</h3>
        </a>
       </div>
        
        <div class="nav-header">
            <ul>
                <li>
                    <a href="#" onclick="VerAyuda()"><i class="bi bi-question-circle"></i> Ayuda</a>
                </li>
                
                <li>
                    @foreach (Auth::user()->postulaciones as $postulacion)
                    @if($postulacion->estatus == 'No revisado' )
                    <a style="display: none;" href="NodosComunidad"><i class="bi bi-person-fill-check"></i> Nodos de colaboración</a>
                    @else($postulacion->estatus == 'Aprobado')
                    <a href="NodosComunidad"><i class="bi bi-person-fill-check"></i> Nodos de colaboración</a>
                    @endif
                    @endforeach
                </li>
                <li>
                    @foreach (Auth::user()->postulaciones as $postulacion)
                    @if($postulacion->estatus == 'Aprobado')
                    <a href="{{ route('mapa.index') }}"><i class="bi bi-map"></i> Visualizar instituciones</a>
                    @else
                    <a style="display: none;" href="{{ route('mapa.index') }}"><i class="bi bi-map"></i> Visualizar instituciones</a>
                    @endif
                    @endforeach
                </li>

                
                <li>
                    
                      @if(Auth::check() && Auth::user()->informacion) <!-- Verifica si el usuario está autenticado y tiene información -->
                     <a href="{{ route('catalogo.index') }}"><i class="bi bi-images"></i> Catálogo</a>
                      @endif                    
                </li>

                <li>
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> Perfil
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('datos.edit', Auth::user()->id)}}" class="dropdown-item"><i class="bi bi-pencil-square"></i> Editar perfil</a>
                            </li>
                            <li>
                                @foreach(Auth::user()->datos as $info)
                                <a href="{{ route('informacion.edit', $info->id_inf)}}" class="dropdown-item" href=""><i class="bi bi-pencil-square"></i> Editar información PLESITH</a>
                                @endforeach
                            </li>
                            <li>
                                <!-- Button trigger modal -->
                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="bi bi-envelope"></i>
                                    Mensajes
                                </a>
                            </li>
                             <!-- Agregar el botón si el usuario tiene el código 'adm1' -->
                            <!-- El botón con redirección -->
                            @if(Auth::user()->codigo == 'adm1')
                            <li>
                                <a href="{{ route('panel-administrador') }}" class="dropdown-item">
                                    <i class="bi bi-gear"></i> Panel de administrador
                                </a>
                            </li>
                            @endif	
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <ul class="hidden">
                                    <div class="container text-center">
                                        <div aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="bi bi-arrow-left-square"></i> {{ __('Cerrar sesión') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
   
    </header>
    <!-- Contenido de la página aquí -->
    <!-- Modal -->
    
</body>

</html>