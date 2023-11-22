<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLESITH</title>
    <link rel="stylesheet" href="{{ asset('assets/styles.css') }}">
    <style>
        body {
    margin: 0;
    padding: 0;
    background-size: cover;
    background-position: center;
    font-family: Arial, sans-serif; /* Change the font family if needed */
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    background-color: #333; /* Change the background color if needed */
    overflow: hidden;
}

nav ul li {
    float: right;
}

nav ul li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

nav ul li a:hover {
    background-color: #555; /* Change the background color on hover if needed */
}

.top-container {
    text-align: height;
    padding: 180px 16px;
    background-image: url('{{ asset('imagen/Citnova.jpeg') }}'); /* Ruta de la imagen de fondo */
    background-size: cover;
    background-position: center;
    color: black;
    
}

.top-container2 {
    text-align: height;
    padding: 180px 16px;
    background-image: url('{{ asset('imagen/descarga.png') }}'); /* Ruta de la imagen de fondo */
    background-size: cover;
    background-position: center;
    color: black;
    
}
    
.logo {
    float: left;
}

.logo img {
    width: 80px; /* Cambia el tamaño del logo según tus necesidades */
    height: auto; /* Ajusta la altura automáticamente según el ancho */
}

.custom-btn {
    float: left; /* Alinea el botón a la izquierda */
    font-size: 1.2em; /* Ajusta el tamaño del texto del botón */
    margin-right: 10px; /* Añade un poco de espacio a la derecha del botón */
    /* Puedes agregar más estilos según tus preferencias */
}
    </style>
</head>
<body>
<nav>
<div class="d-flex align-items-center">
        <!-- Barra de búsqueda -->
        <ul class="ml-auto">
            <li>
            <div class="input-group">
  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <button type="button" class="btn btn-outline-primary" data-mdb-ripple-init>search</button>
</div>
            </li>
        <!-- Logo -->
            <div class="logo">
            <img src="{{ asset('imagen/descarga.png') }}" alt="Logo">
            </div>
            
            <!-- Resto de los elementos de navegación -->
            <li><a href="{{ route('register') }}">Regístrate</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="#">Contactos</a></li>
            <li><a href="#">Acerca</a></li>
            <li><a href="{{ url('/home') }}">Inicio</a></li>
        </ul>
    </div>
</nav>

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <!-- Add carousel indicators if needed -->
        </div>

        <div class="top-container">
    <div class="titulo">
        <h1 class="display-6">PLESITH</h1>
        <br>
        <h2>Plataforma Estatal De Investigadores Y Tecnólogos de Hidalgo</h2>
        <button onclick="window.location.href = '{{ route('login') }}'" class="btn btn-primary btn-lg custom-btn">Formar Parte</button>
    </div>
</div>

<div class="top-container2">
    <div class="titulo">
        <center>
        <h2>Plataforma Estatal De Investigadores Y Tecnólogos de Hidalgo</h2>
        </center>
</div>




</body>
</html>