<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/login.css') }}">        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-rbs5oRmyz9BDjzS9nEIEUnzM1qDe5ICorxF9uF8g5SeFOByuB+8Z3Gk5Sck/GJvI" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8N+1lUE3+XjwIXqityaM2UwEJrHjeZX/nezF8+Ad5A0tjFkA5Vx7Js1KrI95" crossorigin="anonymous"></script>
    <title>Inicio de sesión | PLESITH</title>
  </head>
  <body>
    @include('layouts/headregob')
    @include('layouts/header')
    <main class="main">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="row ml-5">
            <h1>{{ __('Iniciar sesión') }}</h1>
          </div>
          <hr class="hr-gob">
          <div class="card-body">
            <form method="POST" action="{{ route('login') }}" onsubmit="return validateRecaptcha()">
              @csrf
              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end"><h5>{{ __('Correo electrónico') }}</h5></label>
                <div class="col-md-5">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>        
              <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end"><h5>{{ __('Contraseña') }}</h5></label>
                <div class="col-md-5">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-5 offset-md-4">
                  <div id="example1"></div>
                </div>
              </div>
              <div class="row mb-0">
                <div class="col-md-5 offset-md-4">
                  <a href="/register" class="btn btn-secondary">Regístrate aquí</a>
                  <button type="submit" class="btn btn-primary">{{ __('Ingresar') }}</button>
                </div>
              </div>
              <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
            </form>
          </div>
        </div>
      </div>
    </main>
    @include('layouts/footer')
  </body>
  <script type="text/javascript">
    var verifyCallback = function(response)
    {
      alert(response);
    };
    var widgetId1;
    var onloadCallback = function()
    {
      // Representa el elemento HTML con id como un widget reCAPTCHA.
      // La identificación del widget reCAPTCHA se asigna a su id
      widgetId1 = grecaptcha.render('example1', {
        'sitekey' : '6LcU_JcoAAAAAMwrNBsFob_Ocf7DHZJnKBF8ls37',
        'theme' : 'light'
      });
    };
  </script>
  <script>
  function validateRecaptcha()
  {
    var response = grecaptcha.getResponse(widgetId1);
    if (response.length === 0)
    {
      // reCAPTCHA no se ha completado
      alert('Por favor, completa el reCAPTCHA antes de enviar el formulario.');
      return false;
    } else {
      // reCAPTCHA válido, establece el valor del campo oculto
      document.getElementById('g-recaptcha-response').value = response;
      return true;
    }
  }
  </script>
</html>
