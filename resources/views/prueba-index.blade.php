<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('asset/styles-index.css') }}">
    <title>PLESITH</title>


    <!-- CSS -->
    <link href="/favicon.ico" rel="shortcut icon">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">

    <!-- Respond.js soporte de media queries para Internet Explorer 8 -->
    <!-- ie8.js EventTarget para cada nodo en Internet Explorer 8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ie8/0.2.2/ie8.js"></script>
    <![endif]-->

  </head>
  <body>
    <header>
    <div class="nav-ple">
            <nav class="navbar navbar-inverse sub-navbar navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subenlaces">
                            <span class="sr-only">Interruptor de Navegación</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">PLESITH</a>
                    </div>
                    <div class="collapse navbar-collapse" id="subenlaces">
              
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">inicio</a></li>
                            <li><a href="#">Acerca</a></li>
                            <li><a href="#">Contacto</a></li>
                            <li><input type="search" class="form-control " placeholder="Buscar" name="" id=""></li>
                            <li>
                                <button class="btn btn-default " type="button">
                                    <span class="glyphicon glyphicon-search"></span>
                                    Buscar
                                </button>  
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <hr>
    <!-- Contenido -->
    <main class="page">
        <div class="container">
            <section>
            <img src="{{ asset('imagen/descarga.png') }}" alt="Logo">
            </section>
        </div>
    </main>
    <!-- JS -->
    <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
  </body>
</html>