<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/documentosinfo.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Nodos | PLESITH</title>
</head>
<body class="body">
    @include('layouts/datos-gob')
    <main class="main">
        <img src="https://lajornadahidalgo.com/wp-content/uploads/2022/08/CITNOVA-SINCROTON.jpg" alt="img">
        @include('layouts.nav-admin')
        <div class="title">
            <h1>Nodos de toda la comunidad</h1>
            <div class="p-10">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 space-y-5 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <br>
                            <form action="">
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="col-span-3 sm:col-span-3">
                                        <input type="text" name="categoria" placeholder="Categoria...." value="" autocomplete="off" class="bg-white h-10 px-5 pr-10 rounded text-sm focus:outline-none w-full">
                                    </div>
                                    <div class="col-span-3 sm:col-span-3">
                                        <input type="text" name="linea_inv" placeholder="Área de conocimiento...." value="" autocomplete="off"class="bg-white h-10 px-5 pr-10 rounded text-sm focus:outline-none w-full ml-5">
                                    </div>
                                </div>
                            </form>
                            
                            <div class="container">
                                <div class="row">
                                    @foreach ($info as $i)
                                        <div class="col-md-4 mb-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">{{$i->tema_inv}}</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text"><strong>Categoría:</strong> {{$i->categoria}}</p>
                                                    <p class="card-text"><strong>Líder:</strong> {{$i->lider}}</p>
                                                    <p class="card-text"><strong>Colaboradores:</strong> {{$i->colaboradores}}</p>
                                                    <p class="card-text"><strong>Área de conocimiento:</strong> {{$i->linea_inv}}</p>
                                                    <p class="card-text"><strong>Institución ligada:</strong> {{$i->institucion_ligada}}</p>
                                                    <p class="card-text"><strong>Descripción:</strong> {{$i->descripcion}}</p>
                                                    <p class="card-text"><strong>Documentación:</strong> {{$i->documento}}</p>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Leer mas...
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
