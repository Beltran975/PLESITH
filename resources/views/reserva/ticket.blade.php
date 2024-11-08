<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Reserva</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        .ticket-container {
            border: 2px dashed #333;
            padding: 20px;
            max-width: 400px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            margin-bottom: 14px;
            font-size: 15px;
            color: #333;
        }
        h3 {
            text-align: center;
            font-size: 10px;
            margin-top: 20px;
            margin-bottom: 10px;
            color: #555;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }
        .info-section {
            margin-bottom: 15px;
        }
        .info-section label {
            font-weight: bold;
            display: block;
            color: #444;
            font-size: 9px;
        }
        .info-section span {
            display: block;
            margin-top: 5px;
            color: #666;
            font-size: 8px;
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <h1>Ticket de Reserva</h1>
        <h3>Datos del solicitante</h3>
        <div class="info-section">
            <label>Nombre completo:</label>
            <span>{{ Auth::user()->name }}</span>
        </div>
        <div class="info-section">
            <label>Correo electrónico:</label>
            <span>{{ Auth::user()->email }}</span>
        </div>
        <div class="info-section">
            <label>Número telefónico:</label>
            <span>{{ $reserva->telefono }}</span>
        </div>
        <div class="info-section">
            <label>Departamento o facultad:</label>
            <span>{{ ucwords(strtolower($reserva->departamento)) }}</span>
        </div>

        <h3>Detalles de la reserva</h3>  
        <div class="info-section">
            <label>Institución de laboratorio:</label>
            <span>{{ ucwords(strtolower($reserva->institucion_laboratorio)) }}</span>
        </div>
        <div class="info-section">
            <label>Carrera laboratorio:</label>
            <span>{{ $reserva->carrera_laboratorio }}</span>
        </div>
        <div class="info-section">
            <label>Nombre de laboratorio:</label>
            <span>{{ $reserva->laboratorio }}</span>
        </div>
        <div class="info-section">
            <label>Responsable laboratorio:</label>
            <span>{{ $reserva->responsable }}</span>
        </div>
        <div class="info-section">
            <label>Tipo de equipo o recurso:</label>
            <span>{{ $reserva->tipo_equipo }}</span>
        </div>
        <div class="info-section">
            <label>Software necesario (si aplica):</label>
            <span>{{ $reserva->software_necesario }}</span>
        </div>

        <h3>Horario de reserva</h3>
        <div class="info-section">
            <label>Fecha y hora de inicio:</label>
            <span>{{ \Carbon\Carbon::parse($reserva->fecha_inicio)->format('d/m/Y h:i:s A') }}</span>
        </div>
        <div class="info-section">
            <label>Fecha y hora de conclusión:</label>
            <span>{{ \Carbon\Carbon::parse($reserva->fecha_fin)->format('d/m/Y h:i:s A') }}</span>
        </div>
        <div class="info-section">
            <label>Motivo de reserva:</label>
            <span>{{ $reserva->motivo }}</span>
        </div>

        <h3>Detalles del proyecto o investigación</h3>
        <div class="info-section">
            <label>Título del proyecto:</label>
            <span>{{ $reserva->titulo_proyecto }}</span>
        </div>
        <div class="info-section">
            <label>Descripción:</label>
            <span>{{ $reserva->descripcion_proyecto }}</span>
        </div>
        <div class="info-section">
            <label>Supervisores o asesores (si aplica):</label>
            <span>{{ $reserva->supervisores }}</span>
        </div>
        <div class="info-section">
            <label>Curso o materia relacionada (si aplica):</label>
            <span>{{ $reserva->curso_relacionado }}</span>
        </div>
    </div>
</body>
</html>
