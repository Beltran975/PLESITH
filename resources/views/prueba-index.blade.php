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

    <!-- Contenido -->
    <main class="page">
      <div class="content">
        <div class="po">
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
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Acerca</a></li>
                        <li><a href="#">Contacto</a></li>
                        <li><a href="#">Login</a></li>
                        <li>
                            <input type="search" class="form-control rounded" aria-label="Search" aria-describedby="search-addon" />
                        </li>
                        <li>
                            <button class="btn btn-primary" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                                Buscar
                            </button>
                        </li>
                    </ul>
                  </div>
                </div>
              </nav>
        </div>
        <!-- nav -->
        <br>
        <br>
        <div class="inicio">
            <div class="section-content">
                <div class="bread-content">
                <ol class="breadcrumb">
                    <li><a href="#"><i class="icon icon-home"></i></a></li>
                    <li><a href="#">Inicio</a></li>
                    <li class="active">Archivo</li>
                </ol>
                </div>
                <div class="titulo bottom-buffer ">
                    <h1 class="display-6">PLESITH</h1>
                  
                    <h2>Plataforma Estatal De Investigadores Y Tecnólogos de Hidalgo</h2>
                    <a href="#" class="btn btn-primary">Formar parte</a>
                </div>
                </div>
        </div>

        <div class="section-cards">
            <div class="contenedor-tarjetas">
                <div class="tarjeta">
                    <div class="tarjeta-content">
                        <div class="image">
                            <a href="#">
                                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>                            
                            </a>
                        </div>
                    </div>
                    <h3 class="card-title">Produciones</h3>
                </div>

                <div class="tarjeta">
                    <div class="tarjeta-content">
                        <div class="image">
                            <a href="#">
                                <span class="glyphicon glyphicon-tower" aria-hidden="true"></span>                            
                            </a>
                        </div>
                    </div>
                    <h3 class="card-title">Instituciones Ligadas</h3>
                </div>

                <div class="tarjeta">
                    <div class="tarjeta-content">
                        <div class="image">
                            <a href="#">
                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>                            
                            </a>
                        </div>
                    </div>
                    <h3 class="card-title">Nodos de Colaboracion</h3>
                </div>
               
            </div>
        </div>


      </div>

      

    </main>

    <!-- JS -->
    <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

  </body>
</html>