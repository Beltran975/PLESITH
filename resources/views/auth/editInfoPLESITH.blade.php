<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('asset/register.css') }}">    
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-rbs5oRmyz9BDjzS9nEIEUnzM1qDe5ICorxF9uF8g5SeFOByuB+8Z3Gk5Sck/GJvI" crossorigin="anonymous">
        <title>Actualización | PLESITH</title>
    </head>
    <body>
        @include('layouts/headregob')
        @include('layouts/header')
        <main class="main">
            <div class="content-registro form-group">
                <div class="row ml-5">
                    <h3>{{ __('Actualizacion información PLESTIH') }}</h3>
                </div>
                <hr class="hr-gob" >
                <div class="card">
                    <div class="card-header">
                        <h3>Información PLESITH</h3>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('informacion.edit', $dato->id_inf)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row form-outline md-4">
                                <div class="col-md-4">
                                    <label class="form-label" for="lineaInv">Área de conocimiento</label>
                                </div>
                                <br>
                                <br>
                                <div class="col-md-8">
                                    <select class="form-control" name="lineaInv" required>
                                        <option name="lineaInv" value="" disabled selected>{{$dato->lineaInv}}</option>
                                        <option name="lineaInv" value="ÁREA I. Físico-Matemáticas y Ciencias de la Tierra">ÁREA I. Físico-Matemáticas y Ciencias de la Tierra</option>
                                        <option name="lineaInv" value="ÁREA II. Biología y Química">ÁREA II. Biología y Química</option>
                                        <option name="lineaInv" value="ÁREA III. Medicina y Ciencias de la Salud">ÁREA III. Medicina y Ciencias de la Salud </option>
                                        <option name="lineaInv" value="ÁREA IV. Ciencias de la Conducta y la Educación">ÁREA IV. Ciencias de la Conducta y la Educación</option>
                                        <option name="lineaInv" value="ÁREA V. Humanidades">ÁREA V. Humanidades</option>
                                        <option name="lineaInv" value="ÁREA VI. Ciencias Sociales">ÁREA VI. Ciencias Sociales</option>
                                        <option name="lineaInv" value="ÁREA VII. Ciencias de la Agricultura, Agropecuarias, Forestales y de Ecosistemas">ÁREA VII. Ciencias de la Agricultura, Agropecuarias, Forestales y de Ecosistemas</option>
                                        <option name="lineaInv" value="ÁREA VIII. Ingenierías y Desarrollo Tecnológico">ÁREA VIII. Ingenierías y Desarrollo Tecnológico</option>
                                        <option name="lineaInv" value="ÁREA IX. Multidisciplinaria">ÁREA IX. Multidisciplinaria</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Grado Academico -->
                            <div class="row form-outline mb-4">
                                <div class="col-md-4">
                                    <label class="form-label" for="grado">Grado académico</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="grado" class="form-control" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios" required value="{{$dato->grado}}" />
                                </div>
                            </div>
                            
                            <!-- Pertenece al SNI -->
                            <div class="row form-outline mb-4">
                                <div class="col-md-4">
                                    <label class="form-label" for="pertenece">¿Pertenece al SNI?</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="radio" name="pertenece" autocomplete="off" value="si" value="{{$dato->pertenece}}" required>
                                    <label class="btn" for="pertenece">Sí</label>
                                    <input type="radio" name="pertenece" autocomplete="off" value="no" value="{{$dato->pertenece}}" required>
                                    <label class="btn" for="pertenece">No</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" onclick="history.back()" name="volver atrás">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </main>
        @include('layouts/footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8N+1lUE3+XjwIXqityaM2UwEJrHjeZX/nezF8+Ad5A0tjFkA5Vx7Js1KrI95" crossorigin="anonymous"></script>
    </body>
</html>