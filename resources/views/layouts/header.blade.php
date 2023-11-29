<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       

        /* Estilos para pantallas grandes */
        header {
            margin-top: -2%;
            position: fixed; /* Fija el encabezado en la parte superior */
            width: 100%; /* Ocupa el ancho completo de la ventana */
            background-color: #691b32;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #ffffff;
            justify-content: space-between;
            z-index: 5; /* Asegura que el encabezado esté sobre otros elementos */
        }

        header ul {
            list-style-type: none;
            padding: 0;
            margin: 10px;
            display: flex;
        }

        header li a {
            text-decoration: none;
            padding: 8px 16px;
        }

        header h3 {
            font-size: medium;
            color: #ffffff;
            text-decoration: none;
        }

        header li a:hover {
            background-color: #691b32;
        }

        /* Estilos para pantallas más pequeñas (responsivos) */
        @media only screen and (max-width: 768px) {
            header {
                margin-top: -9%;
                flex-direction: column;
                text-align: center;
                
            }

            header ul {
                flex-direction: column;
            }

            header li {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <header>
        <a href="/">
            <h3>PLATAFORMA ESTATAL DE INVESTIGADORES Y TECNOLOGOS DE HIDALGO</h3>
        </a>
        <div>
            <!-- <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Nodos de Colaboración</a></li>
            </ul> -->
        </div>
    </header>

    <!-- Contenido de la página aquí -->
</body>
</html>
