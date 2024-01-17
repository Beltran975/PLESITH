
<!doctype html>
<html lang="es-MX">
    <head><meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <meta name="theme-color" content="#000000"/>
        <meta name="description" content="Web site created using create-react-app"/>
        <link rel="stylesheet" href="https://cdn.hidalgo.gob.mx/transicion/headergob/headergob-1.0.0.css"/>
        <link rel="stylesheet" href="{{ asset('asset/main.css') }}">        
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
        <title>PLESITH</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    </head>
  
    <body>
        @include('layouts/headregob')
        @include('layouts/header')

        <main class="page">
            <br>    
        <div class="content">
            <div class="head-dos">
                <!--Barra de navegación unica-->
                <nav class="nav-plesith">
                    <button class="nav-toggle">&#9776;</button>
                    <ul>
                        <li>
                            <button class="btn btn-primary" type="button">
                                <i class="bi bi-search"></i>
                                Buscar
                            </button>
                        </li>
                        <li>
                            <input type="search" class="form-control rounded" aria-label="Search" aria-describedby="search-addon" />
                        </li>
                        <li><a href="{{ route('login') }}">Inicio de sesión</a></li>
                        <li><a href="#seccion-descrpcion">Acerca</a></li>
                        <li><a href="#footer">Contacto</a></li>
                        <li><a href="#">Inicio</a></li>
                    </ul>
                </nav>

                <!--sección de titulo inicial-->
                <div class="inicio">
                    <div class="section-content">
                        <div class="titulo bottom-buffer">
                            <h1>PLESITH</h1>
                            <h2>Plataforma Estatal de Investigadores y Tecnólogos de Hidalgo</h2>
                            <a href="{{ route('register') }}" class="btn btn-primary">
                                Formar parte
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                        </div>
                        <br>
                        <br>
                </div> 
            </div>
            <!--Tarjetas de modulos plesith-->
            <div class="section-cards">
                <div class="contenedor-tarjetas">

                    <!-- Tarjeta de producciones -->
                    <div class="tarjeta">
                        <div class="tarjeta-content">
                            <div class="tarjera-image">
                                <a href="#producciones" id="BtnModalProducciones">
                                    <i class="bi bi-book-half"></i>                                 
                                </a>
                            </div>
                        </div>
                        <h3 class="card-title">Producciones</h3>
                        </div>

                        
                        <!-- Tarjeta de Instituciones Ligadas -->
                        <div class="tarjeta">
                            <div class="tarjeta-content">
                                <div class="tarjera-image">
                                    <a href="#instituciones" id="BtnModalInstituciones">
                                        <i class="bi bi-buildings-fill"></i>                                  
                                    </a>
                                </div>
                            </div>
                            <h3 class="card-title">Instituciones Ligadas</h3>
                        </div>
                        
                        <!-- Tarjeta de Nodos de Colaboración -->
                        <div class="tarjeta">
                            <div class="tarjeta-content">
                                <div class="tarjera-image">
                                    <a href="#nodos" id="BtnModalNodos">
                                        <i class="bi bi-people-fill"></i>                                    
                                    </a>
                                </div>
                            </div>
                        
                            <h3 class="card-title">Nodos de Colaboración</h3>
                        </div>
                       
                        
                    </div>
                </div>

                <!-- Modales de modulos PLESITH -->

                <!-- Modal de producciones -->
                <div class="modal fade" id="ModalProducciones">
                    <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content">
                            <div class="modal-img">
                                <div>
                                    <img src="https://images.pexels.com/photos/1181307/pexels-photo-1181307.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="imagen de producción">
                                    <div class="modal-des">
                                        <h1>Producciones</h1>
                                        <p>En esta sección los investigadores comparten sus descubrimientos más recientes, investigaciones destacadas y patentes revolucionarias. </p>
                                        <a href="/register" class="btn btn-primary">
                                            Formar parte
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal de Instituciones Ligadas -->
                <div class="modal fade" id="ModalInstituciones">
                    <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content">
                            <div class="modal-img">
                                <div>
                                    <img src="https://lajornadahidalgo.com/wp-content/uploads/2022/08/CITNOVA-SINCROTON.jpg" alt="imagen de instituciones">
                                    <div class="modal-des">
                                        <h1>Instituciones Ligadas</h1>
                                        <p>Cada institución en esta sección representa un pilar fundamental en la construcción de un entorno de investigación colaborativo y enriquecedor. </p>
                                        <a href="/register" class="btn btn-primary">
                                            Formar parte
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                        <!-- Modal de Nodos de colaboración-->
                        <div class="modal fade" id="ModalNodos">
                        <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content">
                            <div class="modal-img">
                                <div>
                                    <img src="https://images.pexels.com/photos/3182792/pexels-photo-3182792.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="imagen de nodos">
                                    <div class="modal-des">
                                        <h1>Nodos de colaboración</h1>
                                        <p>En esta sección los investigadores se unen para abordar desafíos complejos y desarrollar soluciones innovadoras. Cada nodo representa un punto de encuentro donde las ideas convergen y florecen, generando investigaciones y creaciones únicas que trascienden los límites individuales.</p>
                                        <a href="register" class="btn btn-primary">
                                            Formar parte
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                <br>
                <br>
                <div class="seccion-image">
                    <div class="title-seccionImage">
                        <h1>Plataforma Estatal de Investigadores y Tecnólogos de Hidalgo</h1>
                    </div>
                </div>
                <!--sección de infotech y bibliotech-->
                <div class="seccion-info">
                    <div class="tarjeta-info">
                        <div>
                            <i class="bi bi-journal-bookmark-fill"></i>                        
                        </div>
                        <div class="tarjeta-info-content">
                            <div class="tarjeta-info-title">
                                <h1>Bibliotech</h1>
                            </div>
                            <div class="tarjeta-info-des">
                                <p>Esta biblioteca digital proporciona acceso a investigaciones publicadas en revistas especializadas, contribuyendo al avance del conocimiento en múltiples áreas. </p>
                                <a href="/bibliotech" class="btn btn-info">Explorar</a>
                            </div>
                        </div>
                    </div>
                    <div class="tarjeta-info">
                        <div>
                            <i class="bi bi-info-circle"></i>                       
                        </div>
                        <div class="tarjeta-info-content">
                            <div class="tarjeta-info-title">
                                <h1>Infotech</h1>
                            </div>
                            <div class="tarjeta-info-des">
                                <p>Infotech se presenta como un faro informativo, brindando a los investigadores un acceso centralizado a convocatorias de becas, programas de financiamiento, oportunidades de colaboración y eventos científicos relevantes.</p>
                                <a href="/infotech" class="btn btn-info">Explorar</a>
                            </div>
                        </div>
                    </div>
                   
                </div>
                
                <!--sección de descripción PLESITH-->
                <div class="seccion-descrpcion" id="seccion-descrpcion">
                    <div class="img-descrpcion">
                        <div class="img-descrpcion-1">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS27izVvvw5idm_jAHGR5Z8ucjADd8O8gMZiw&usqp=CAU" alt="">
                        </div>
                        
                        <div class="img-descrpcion-2">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1hnqohlYlvqYJDF_meiBGQzu0kjXigjkg9A&usqp=CAU" alt="">
                        </div>

                    </div>
                    <div class="descripcion-ple">
                        <h1>¿Qué es PLESITH?</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil nesciunt placeat quo vitae vel? Voluptates eveniet expedita repudiandae tempore, corporis velit commodi temporibus consectetur animi provident inventore. Enim, repudiandae necessitatibus.</p>
                    </div>
                </div>
                
            </div>
            
        </main>
        @include('layouts/footer')

        <!--SCRIPT para barra de navagación -->
        <script>
          document.addEventListener('DOMContentLoaded', function () {
            const navToggle = document.querySelector('.nav-toggle');
            const navList = document.querySelector('.nav-plesith ul');
            navToggle.addEventListener('click', function () {
                navList.classList.toggle('show');
            });
            });

            //modales 

            //Modal producciones
            $(document).ready(function(){
                $("#BtnModalProducciones").click(function(){
                    $("#ModalProducciones").modal();
                });
            });

            //Modal Instituciones
            $(document).ready(function(){
                $("#BtnModalInstituciones").click(function(){
                    $("#ModalInstituciones").modal();
                });
            });

            //Modal Nodos de colaboración
            $(document).ready(function(){
                $("#BtnModalNodos").click(function(){
                    $("#ModalNodos").modal();
                });
            });
        </script>
    </body>
    </html>