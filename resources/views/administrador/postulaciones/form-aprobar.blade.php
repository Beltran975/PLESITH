<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador | PLESITH</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('asset/tabla.css') }}">
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png" />
        <title>Administrador | PLESITH</title>
    </head>

    <body class="body">
        @include('layouts/datos-gob')

        <main class="main">
            <img src="https://lajornadahidalgo.com/wp-content/uploads/2022/08/CITNOVA-SINCROTON.jpg" alt="img">
            @include('layouts.nav-admin')
            <div class="title">
                <div class="row ml-5">
                    <h3>{{ __('Formulario de aprobación') }}</h3>
                </div>
                <hr class="hr-gob">

                <div class="form-group">
                    <form action="{{ route('generarPDFaprobado.post') }}" method="post">
                    @csrf
                        <input type="hidden" name="postulacion_id" value="">
                        <div class="modal-body">
                            <div class="mb-3">
                                <blockquote>
                                    <p>Para aprobar al usuario <span style=" background-color: #691b32;"></span> favor de llenar el siguiente formulario</p>
                                </blockquote>

                            </div>
                            <div class="md-3">
                                <label for="dictamenAprobar" class="form-label">Descripción general</label>
                                <textarea class="form-control" id="descripcion-apro" name="descripcion-apro" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="razonAprobacion" class="form-label">Razón de la aprobación:</label>
                                <select class="form-control" id="razonAprobacion" name="razonAprobacion" onchange="mostrarTextArea()">
                                    <option name="razon" value="" disabled selected>Seleccionar</option>
                                    <option value="Calificación Excelente">Calificación Excelente</option>
                                    <option value="Cumplimiento de requisitos">Cumplimiento de requisitos</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </div>
                            <div id="otraRazon" style="display: none;">
                                <div class="mb-3">
                                    <label for="razonTextArea" class="form-label">Ingrese la razón:</label>
                                    <textarea class="form-control" id="razonTextArea" name="razonTextArea" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <button class="btn btn-primary" type="submit">Enviar</button>
                        </div>
                    </form>
                </div>

        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <!-- Script para manejar modales con jQuery -->
        <script>
            function mostrarTextArea() {
                var select = document.getElementById("razonAprobacion");
                var otroRazonDiv = document.getElementById("otraRazon");
                var selectedOption = select.options[select.selectedIndex].value;

                if (selectedOption === "Otros") {
                    otroRazonDiv.style.display = "block";
                } else {
                    otroRazonDiv.style.display = "none";
                }
            }

            function mostrarTextAreaNegada() {
                var select = document.getElementById("razon-negada");
                var otroRazonDiv = document.getElementById("otraRazonNegada");
                var selectedOption = select.options[select.selectedIndex].value;

                if (selectedOption === "Otros") {
                    otroRazonDiv.style.display = "block";
                } else {
                    otroRazonDiv.style.display = "none";
                }
            }
        </script>




    </body>

    </html>
</body>

</html>