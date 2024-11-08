<!-- Panel de gestion de encargados -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/home-admin.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.hidalgo.gob.mx/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Enviar Solicitud | PLESITH</title>
    <style>
        /* Estilos personalizados para los correos electrónicos */
        .email-list {
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            padding: 10px;
            margin-top: 5px;
            background-color: #f8f9fa;
            min-height: 40px;
            display: flex;
            flex-wrap: wrap;
        }
        .email-item {
            display: inline-flex;
            align-items: center;
            background-color: #007bff;
            color: white;
            border-radius: 0.25rem;
            padding: 5px 10px;
            margin-right: 5px;
            margin-bottom: 5px;
        }
        .remove-email {
            cursor: pointer;
            margin-left: 5px;
            color: #dc3545;
            font-weight: bold;
        }
    </style>
</head>
<body class="body">
    @include('layouts.datos-gob')
    @include('layouts.nav-admin')

    <main class="main">
        <div class="row">
            <div class="col invisible"></div>
            <div class="col obscuro">
                <div class="titulo row d-flex mb-3">
                    <h1>{{ __('Gestión de encargados de laboratorios') }}</h1>
                </div>
                <hr class="hr-gob">
                
                <div class="card">
                    <div class="card-body">
                        <h2>Enviar Solicitud</h2>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="email-form" action="{{ route('enviar-solicitud-admin.enviar') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="emails" class="form-label">Correos electrónicos (separados por comas):</label>
                                <input type="text" class="form-control" id="email-input" name="emails" required>
                                <small class="form-text text-muted">Ejemplo: correo1@example.com, correo2@example.com</small>
                            </div>
                            <div class="email-list" id="email-list"></div>
                            <button type="submit" class="btn btn-primary mt-3">Enviar Enlace</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        const emailInput = document.getElementById('email-input');
        const emailList = document.getElementById('email-list');

        emailInput.addEventListener('input', function() {
            const emails = emailInput.value.split(',').map(email => email.trim()).filter(email => email);
            emailList.innerHTML = ''; // Limpiar la lista de correos
            emails.forEach(email => {
                if (email) {
                    const emailItem = document.createElement('div');
                    emailItem.className = 'email-item';
                    emailItem.textContent = email;
                    const removeButton = document.createElement('span');
                    removeButton.textContent = '✖';
                    removeButton.className = 'remove-email';
                    removeButton.onclick = () => {
                        emailItem.remove(); // Eliminar el correo de la lista
                        updateEmailInput(); // Actualizar el campo de entrada
                    };
                    emailItem.appendChild(removeButton);
                    emailList.appendChild(emailItem);
                }
            });
        });

        function updateEmailInput() {
            const emailItems = document.querySelectorAll('.email-item');
            const emails = Array.from(emailItems).map(item => item.textContent.slice(0, -1).trim()); // Obtener los correos sin el botón
            emailInput.value = emails.join(', '); // Actualizar el campo de entrada
        }
    </script>

</body>
</html>