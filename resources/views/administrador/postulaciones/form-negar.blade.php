<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('asset/home-admin.css') }}">
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png" />
        <title>Postulación negada | PLESITH</title>
    </head>
    <body class="body">
        @include('layouts/datos-gob')
        @include('layouts.nav-admin')
        <main class="main">
            <img src="https://lajornadahidalgo.com/wp-content/uploads/2022/08/CITNOVA-SINCROTON.jpg" alt="img">
            <div class="row">
                <div class="col invisible"></div>
                <div class="col obscuro">
                    <div class="titulo row d-flex  mb-3">
                        <h1>{{ __('Formulario de Negación') }}</h1>
                    </div>
                    <hr class="hr-gob">
                    <!-- formulario negación -->
                    <div class="form-group modal-body">
                        <form action="{{ route('generarPDFnegado.post', $pos->id)}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <blockquote>
                                    <p>Para aprobar al usuario favor de llenar el siguiente formulario:</p>
                                </blockquote>
                            </div>
                            <div class="md-3">
                                <label for="dictamenAprobar" class="form-label">Descripción general</label>
                                <textarea class="form-control" id="decripcion-negada" name="decripcion-negada" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="razon-negada" class="form-label">Razón de la negación:</label>
                                <select class="form-control" id="razon-negada" name="razon-negada" onchange="mostrarTextAreaNegada()">
                                    <option name="razon" value="" disabled selected>Seleccionar</option>
                                    <option value="Calificación insuficiente">Calificación insuficiente</option>
                                    <option value="Falta de requisitos">Falta de requisitos</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </div>
                            <div id="otraRazonNegada" style="display: none;">
                                <div class="mb-3">
                                    <label for="razonTextArea-negada" class="form-label">Ingrese la razón:</label>
                                    <textarea class="form-control" id="reazon-nega-Text" name="reazon-nega-Text" rows="3"></textarea>
                                </div>
                            </div>
                            <button class="btn btn-secondary" type="button" onclick="history.back()" name="volver atrás">Cancelar</button>
                            <button class="btn btn-primary" type="submit">Enviar</button>
                        </form>
                    </div>
                </div>
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