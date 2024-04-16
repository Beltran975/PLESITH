<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/home-user.css') }}">    
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-rbs5oRmyz9BDjzS9nEIEUnzM1qDe5ICorxF9uF8g5SeFOByuB+8Z3Gk5Sck/GJvI" crossorigin="anonymous">
    <title>Registro | PLESITH</title>
    <script> //funcion para mayusculas
    function mayus(e) {
      e.value = e.value.toUpperCase();
    }

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    </script>
  </head>
  <body>
    @include('layouts/headregob')
    @include('layouts/header')
    <main class="main">
      <div class="content-registro form-group">
        <div class="row ml-5">
          <h3>{{ __('Registro de usuario') }}</h3>
        </div>
        <hr class="hr-gob" >
        <div class="card">
          <div class="card-header" data-bs-toggle="tooltip" data-bs-placement="right" title="Tooltip on right">
            <h3>Datos generales</h3>
          </div>
          <div class="card-body">
            <form action="{{ route('auth.store') }}" method="post" enctype="multipart/form-data">
              @csrf  
              <div class="row justify-content-center">
                <!-- Nombre completo -->
                <div class="col-md-4">
                  <label class="control-label" for="name" >{{ __('Nombre completo *') }}</label>
                  <div class="tooltipUNO">
                    <div class="iconUNO">?</div>
                    <div class="tooltiptextUNO">Ingresa el nombre completo, empezando por Nombre(s)</div>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>{{ $message }}</strong>
                    </div>
                  </span>
                  @enderror
                </div>
                <!-- Institución ligada -->
                <div class="col-md-4">
                  <label class="form-label" for="institucion">{{ __('Institución a la que pertenece * ')}}</label>
                  <div class="tooltipUNO">
                    <div class="iconUNO">?</div>
                    <div class="tooltiptextUNO">Selecciona el nombre de la institución a la  que perteneces</div>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <input class="form-control" type="text" name="institucion" id="institucion_ligada" required>
                </div>
                <!-- Programa educativo -->
                <div class="col-md-4">
                  <label class="control-label" for="programa" class="">{{ __('Programa educativo *')}}</label>
                  <div class="tooltipUNO">
                    <div class="iconUNO">?</div>
                    <div class="tooltiptextUNO">Ingresa el nombre completo de tu programa educativo ¡No escribas siglas!</div>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <input class="form-control" id="programa" type="text"  name="programa" required>
                </div>
                <!-- CURP -->
                <div class="col-md-4">
                  <label class="control-label" for="curp">{{ __('CURP *')}}</label>
                  <div class="tooltipUNO">
                    <div class="iconUNO">?</div>
                    <div class="tooltiptextUNO">Asegúrate de ingresar correctamente los 18 caracteres que coincidan con el archivo.</div>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <input id="curp" type="text" onkeyup="mayus(this);" class="form-control @error('curp') is-invalid @enderror" name="curp" required maxlength="18">
                  @error('curp')
                  <span class="invalid-feedback" role="alert">
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>{{ $message }}</strong>
                    </div>
                  </span>
                  @enderror
                </div>
                <!-- Documentación CURP -->
                <div class="col-md-4">
                  <label class="control-label" for="curp" class="">{{ __('Documentación CURP *')}}</label>
                  <div class="tooltipUNO">
                    <div class="iconUNO">?</div>
                    <div class="tooltiptextUNO">Asegurate de adjuntar el archivo correcto, no se podrá editar.</div>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <input class="form-control" id="archivoCurp" type="file" accept="application/pdf"  name="archivoCurp" required>
                </div>
                <!-- Fotografía de perfil -->
                <div class="col-md-4">
                  <label for="foto" class="control-label">{{ __('Fotografía de perfil *')}}</label>
                  <div class="tooltipUNO">
                    <div class="iconUNO">?</div>
                    <div class="tooltiptextUNO">Adjunta foto profecional ¡No se podrá editar!</div>
                  </div>
                </div>  
                <div class="col-md-6 mb-3">
                  <input class="form-control" id="image" type="file"  name="image" accept="image/jpeg, image/png, image/gif" required>
                </div>
                <!-- Correo electrónico -->
                <div class="col-md-4">
                  <label class="control-label" for="email" class="">{{ __('Correo electrónico *') }}</label>
                  <div class="tooltipUNO">
                    <div class="iconUNO">?</div>
                    <div class="tooltiptextUNO">Ingresa un correo existente</div>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>{{ $message }}</strong>
                    </div>
                  </span>
                  @enderror
                </div>
                <!-- Contraseña -->
                <div class="col-md-4">
                  <label class="control-label" for="password" >{{ __('Contraseña *') }}</label>
                  <div class="tooltipUNO">
                    <div class="iconUNO">?</div>
                    <div class="tooltiptextUNO">Escribe minimo 8 caracteres ¡No podrás recuperar tu contraseña! ¡Que no se te olvide!</div>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="new-password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>{{ $message }}</strong>
                    </div>
                  </span>
                  @enderror
                </div>
                <!-- Confirmar contraseña -->
                <div class="col-md-4">
                  <label class="control-label" for="password-confirm">{{ __('Confirmar contraseña *') }}</label>
                </div>
                <div class="col-md-6 mb-3">
                  <input class="form-control" id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password">
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" onclick="history.back()" name="volver atrás">Cancelar</button>
                <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
              </div>  
            </form>
          </div>
        </div>
      </div> 
    </main>
    @include('layouts/footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8N+1lUE3+XjwIXqityaM2UwEJrHjeZX/nezF8+Ad5A0tjFkA5Vx7Js1KrI95" crossorigin="anonymous"></script>
    <script>
      function check(e)
      {
        tecla = (document.all) ? e.keyCode : e.which;
        
        //Tecla de retroceso para borrar, siempre la permite
        if (tecla == 8) {
          return true;
        }
        
        // Patrón de entrada, en este caso solo acepta numeros y letras
        patron = /[A-Za-z]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
      }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.get('/instituciones', function(data) {
              var opciones = '';
              data.forEach(function(institucion){
                opciones += '<option value="' + institucion + '">';
              });
              $('#institucion_ligada').attr('list', 'nombre');
              $('#institucion_ligada').after('<datalist id="nombre">' + opciones + '</datalist>');
            });
        });
    </script>
  </body>
</html>