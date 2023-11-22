<html>
    <head>
        <style>
        .footer
        {
            background-color: #691B32;
            padding: 10px;
            text-align: center;
        }
        .footer img
        {
            width: 100px;
            height: auto;
        }
        .footer p
        {
            color:#fff;
            margin: 0;
        }
        .footer .contacto
        {
            font-size: 12px;
            color: #fff;
        }
        /* Nuevas reglas CSS */
        .footer .row
        {
            display: flex;
            justify-content: space-between;
        }
        .footer ul
        {
            display: inline-block;
            list-style-type: none;
            padding: 0;
        }
        .footer li
        {
            margin: 5px 0;
        }
        .footer a
        {
            text-decoration: none;
            color: #fff;
        }
        .footer a:hover {
            color: #fff;
        }
        </style>
        <!--FONT AWESOME-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--GOOGLE FONTS-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <footer>
            <div class="footer">
                <div class="row">
                    <img src="https://cdn.hidalgo.gob.mx/gobierno/images/logos/logo_gob.png" alt="Logo de la empresa">
                    <div class="row">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-whatsapp"></i></a>
                    </div>
                    <div class="list-container">
                        <ul>
                            <li><a href="#">Aviso de privasidad</a></li>
                            <li><p>Contacto: citnova@hidalgo.gob.mx</p></li>
                            <li><p>Teléfono: 771 657 5103 y 771 657 5104</p></li>
                            <li><p>Boulevard Circuito la Concepción #3</p></li>
                            <li><p>San Agustin Tlaxiaca, Hidalgo, México</p></li>
                            <li><a href="#">Aviso de privacidad CITNOVA</a></li>
                        </ul>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <p>Copyright © <?php echo date("Y");?> Todos los derechos reservados por Hidalgo de la Transformación</p>
                </div>
            </div>
        </footer>
    </body>
</html>
