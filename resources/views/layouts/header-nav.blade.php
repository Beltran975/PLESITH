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
        <a href="/">
            <h3>PLATAFORMA ESTATAL DE INVESTIGADORES Y TECNÓLOGOS DE HIDALGO</h3>
        </a>
        <div class="nav-header">
            <ul>
                <li>
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Perfil
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('datos.edit', Auth::user()->id)}}" class="dropdown-item">Editar perfil</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="">Editar información PLESITH</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <ul class="hidden">
                                    <div class="container text-center">
                                        <div aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar sesión') }}
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
                <li>
                    <a href="NodosComunidad">Nodos de colaboración</a>
                </li>
            </ul>
        </div>
    </header>
    <!-- Contenido de la página aquí -->
</body>
</html>
