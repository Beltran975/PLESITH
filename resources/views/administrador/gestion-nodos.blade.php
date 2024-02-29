<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/documentosinfo.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
    <title>Nodos | PLESITH</title>
</head>
<body class="body">
        @include('layouts/datos-gob')
        
        <main class="main">
            <img src="https://lajornadahidalgo.com/wp-content/uploads/2022/08/CITNOVA-SINCROTON.jpg" alt="img">
            @include('layouts.nav-admin')
            <div class="title">
                <div class="row ml-5">
                    <h3>{{ __('Gestión de datos PLESITH | Nodos de colaboración') }}</h3>
                </div>
                <hr class="hr-gob">
               
            </div>
          

    </main>
   
</body>
</html>