
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
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="#">Acerca</a></li>
                        <li><a href="#">Contacto</a></li>
                        <li><a href="#">Inicio</a></li>
                    </ul>
                </nav>

                <!--sección de titulo inicial-->
                <div class="inicio">
                    <div class="section-content">
                        <div class="titulo bottom-buffer">
                            <h1 class="display-6">PLESITH</h1>
                            <h2>Plataforma Estatal de Investigadores y Tecnólogos de Hidalgo</h2>
                            <a href="{{ route('register') }}" class="btn btn-primary">Formar parte</a>
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
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Producciones</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis in eius eum explicabo quia nulla deserunt necessitatibus aut neque. Perferendis consequatur beatae cumque necessitatibus possimus, vero officia provident dolore quaerat!</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal de Instituciones Ligadas -->
                        <div class="modal fade" id="ModalInstituciones">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Instituciones Ligadas</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo cumque vitae unde harum. Commodi, eaque distinctio eveniet saepe impedit animi praesentium. Necessitatibus sunt qui tempore, facilis est molestias odio laudantium.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- Modal de Nodos de colaboración-->
                        <div class="modal fade" id="ModalNodos">
                            <div class="modal-dialog modal-dialog-centered ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Nodos de Colaboración</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo cumque vitae unde harum. Commodi, eaque distinctio eveniet saepe impedit animi praesentium. Necessitatibus sunt qui tempore, facilis est molestias odio laudantium.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, aspernatur odio dolores, totam deserunt at iste molestias quos laboriosam animi cupiditate reiciendis, perferendis dolorum vero quidem laborum quasi optio velit.</p>
                                <a href="#" class="btn btn-info">Explorar</a>
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
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, aspernatur odio dolores, totam deserunt at iste molestias quos laboriosam animi cupiditate reiciendis, perferendis dolorum vero quidem laborum quasi optio velit.</p>
                                <a href="#" class="btn btn-info">Explorar</a>
                            </div>
                        </div>
                    </div>
                   
                </div>
                
                <!--sección de descripción PLESITH-->
                <div class="seccion-descrpcion">
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