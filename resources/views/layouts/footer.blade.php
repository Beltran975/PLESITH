<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <title>Document</title>
  </head>
  <style>
  @import "https://cdn.hidalgo.gob.mx/transicion/colors.css";
  .fa-brands{
    font-family: "Font Awesome 5 Brands" !important;
  }
  .main-footer{
    background-color:var(--wine);
    min-height:56px;
    color:white;
    padding:20px 0 20px;
    text-align:left;
    position: relative;
    bottom: 0;
    left: 0;
    right: 0;
  }
  .main-footer .first-row-footer{  }
  .main-footer .footer-logo-tels{
    display: flex;
    justify-content: space-between;
  }
  .main-footer .footer-logo{
    margin-left: 50px;
    display: flex;
  }
  .main-footer .footer-logo img{
    width: 100px;
    height: auto;
    align-self: center;
  }
  .tels-footer{
    display: flex;
  }
  .tels-footer p{
    color: #fff;;
  }
  .tels-footer div{
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px 20px;
  }
  .contacto h6:first-child{
    margin-bottom: 20px;
  }
  .contacto h6:nth-child(2){
    margin-bottom: 20px;
  }
  .main-footer hr{
    border-top: 1px solid var(--gold);
  }
  .main-footer .second-row-footer p{
    padding-top: 10px;
    color: #fff;
  }
  .main-footer .social-media{
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .main-footer .social-media a{
    color: #fff;
    text-decoration: none !important;
  }
  .main-footer .social-media i{
    font-size: 30px;
    margin: 0 20px;
  }
  @media (max-width: 992px){
    .main-footer .footer-logo{
      margin-left: 0px;
    }
  }
  @media(max-width: 768px){
    .main-footer .footer-logo-tels{
      flex-direction: column;
      align-items: center;
    }
    .main-footer .tels-footer div{
      text-align: center;
      margin-top: 50px;
    }
  }
  @media (max-width:  576px){
    .card-landing{
      margin-top: 50px;
    }
    .cont-noticias-cards{
      min-height: 500px;
    }
    .bann-programas-bienestar{
      margin-top: 100px;
    }
    .bann-desk{
      display: none;
    }
    .bann-mob{
      display: block;
    }
    .cont-noticias-cards{
      margin-top: 50px;
    }
    .main-footer .footer-logo-tels{
      flex-direction: column;
    }
    .main-footer .tels-footer{
      flex-direction: column;
    }
    .main-footer .tels-footer div{
      margin-top: 10px;
    }
    }
    </style>
    <body>
      <div class="main-footer"> 
        <div class="container-fluid">
          <div class="row first-row-footer">
            <div class="col-md-9 col-12">
              <div class="footer-logo-tels">
                <div class="footer-logo">
                  <img alt="logotipo gob.mx" src="https://cdn.hidalgo.gob.mx/transicion/logo_hgo_2019.png" />
                </div>
                <div class="col-sm-3 col-12">
                  <div class="social-media">
                    <a href="https://www.facebook.com/gobhidalgo" target="_blanc">
                      <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/gobiernohidalgo" target="_blanc">
                      <i class="fa-brands fa-twitter"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-12">
              <div class="contacto">
                <h6><a href="https://gobierno.hidalgo.gob.mx/AvisoPrivacidad">Aviso de privacidad</a></h6>
                <h6>Contacto: citnova@hidalgo.gob.mx</h6>
                <h6>Teléfonos: 771 657 5103 y 771 657 5104</h6>
                <p>Boulevard Circuito la Concepción #3</p>
                <p>San Agustín Tlaxiaca, Hidalgo, México</p>
                <h6>
                  <a href="https://drive.google.com/file/d/1vOWKk9IierD6XnpzIBiv-lQnhbbv9o1z/view?usp=sharing" target="_blank">Aviso de privacidad CITNOVA</a>
                </h6>
              </div>
            </div>
          </div>
          <hr/>
          <div class="row second-row-footer">
            <div class="col-sm-9 col-12">
              <p>Copyrights © 
                <script type = "text/javascript">
                let date =  new Date().getFullYear();
                document.write( date ); 
                </script> 
                Todos los derechos reservados por Hidalgo de la Transformación
              </p>
            </div>
          </div>
        </div>
      </div>
    </body>
</html>