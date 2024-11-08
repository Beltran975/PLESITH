<!-- Modal de Reserva -->
<div class="modal fade" id="reservaModal" tabindex="-1" aria-labelledby="reservaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reservaModalLabel">Formulario de Reserva</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="reservaForm" action="{{ route('reservas.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Datos personales -->
                    <h5>Datos del Solicitante</h5>
                    <br>
                    <div class="mb-3">
                        <label for="nombreCompleto" class="form-label">Nombre Completo:</label>
                        <input type="text" class="form-control" name="nombreCompleto" id="nombreCompleto" value='{{ Auth::user()->name}}' readonly>
                    </div>
                    <div class="mb-3">
                        <label for="correoElectronico" class="form-label">Correo Electrónico:</label>
                        <input type="email" class="form-control" name="correoElectronico" id="correoElectronico" value='{{ Auth::user()->email}}' readonly>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Número Telefónico:</label>
                        <input type="tel" class="form-control" name="telefono" id="telefono" required>
                    </div>
                    <div class="mb-3">
                        <label for="departamento" class="form-label">Departamento o Facultad:</label>
                        <input type="text" class="form-control" name="departamento" id="departamento" value='{{ Auth::user()->institucion}}' readonly>
                    </div>
                    <br>
                    <!-- Detalles de la Reserva -->
                    <h5>Detalles de la Reserva</h5>
                    <br>
                    <div class="mb-3">
                        <label for="institucionLaboratorio" class="form-label">Institucion Laboratorio: </label>
                        <input type="text" class="form-control" name="institucionLaboratorio" id="institucionLaboratorio" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="carreraLaboratorio" class="form-label">Carrera Laboratorio: </label>
                        <input type="text" class="form-control" name="carreraLaboratorio" id="carreraLaboratorio" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="laboratorio" class="form-label">Nombre Laboratorio:</label>
                        <input type="text" class="form-control" name="laboratorio" id="laboratorio" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="responsable" class="form-label">Responsable Laboratorio:</label>
                        <input type="text" class="form-control" name="responsable" id="responsable" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tipoEquipo" class="form-label">Tipo de Equipo o Recurso:</label>
                        <input type="text" class="form-control" name="tipoEquipo" id="tipoEquipo" value="Equipo de Computo" required>
                    </div>
                    <div class="mb-3">
                        <label for="softwareNecesario" class="form-label">Software Necesario (si aplica):</label>
                        <input type="text" class="form-control" name="softwareNecesario" id="softwareNecesario" value="N/A">
                    </div>
                    <div class="mb-3">
                        <label for="fechaInicio" class="form-label">Fecha y Hora de Inicio:</label>
                        <input type="datetime-local" class="form-control" name="fechaInicio" id="fechaInicio" required>
                    </div>
                    <div class="mb-3">
                        <label for="fechaFin" class="form-label">Fecha y Hora de Finalización:</label>
                        <input type="datetime-local" class="form-control" name="fechaFin" id="fechaFin" required>
                    </div>
                    <div class="mb-3">
                        <label for="motivo" class="form-label">Motivo de la Reserva:</label>
                        <input type="text" class="form-control" name="motivo" id="motivo" required>
                    </div>
                    <br>
                    <!-- Detalles del Proyecto o Investigación -->
                    <h5>Detalles del Proyecto o Investigación</h5>
                    <br>
                    <div class="mb-3">
                        <label for="tituloProyecto" class="form-label">Título del Proyecto:</label>
                        <input type="text" class="form-control" name="tituloProyecto" id="tituloProyecto" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcionProyecto" class="form-label">Descripción Breve:</label>
                        <textarea class="form-control" name="descripcionProyecto" id="descripcionProyecto" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="supervisores" class="form-label">Supervisores o Asesores (si aplica):</label>
                        <input type="text" class="form-control" name="supervisores" id="supervisores" value="N/A">
                    </div>
                    <div class="mb-3">
                        <label for="cursoRelacionado" class="form-label">Curso o Materia Relacionada (si aplica):</label>
                        <input type="text" class="form-control" name="cursoRelacionado" id="cursoRelacionado" value="N/A">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="confirmacionPoliticas" required>
                        <label class="form-check-label" for="confirmacionPoliticas">Confirmo haber leído y acepto las <a href="/politicas-de-privacidad" target="_blank">políticas de privacidad</a>.</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Enviar Reserva</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const fechaInicioInput = document.getElementById('fechaInicio');
        const fechaFinInput = document.getElementById('fechaFin');

        const now = new Date();
        const currentDateTime = now.toISOString().slice(0, 16);

        // Set minimum datetime for fechaInicio to current datetime
        fechaInicioInput.setAttribute('min', currentDateTime);

        // Alert if fechaInicio is not after current datetime
        fechaInicioInput.addEventListener('change', function() {
            if (this.value <= currentDateTime) {
                alert('La fecha y hora de inicio debe ser después del momento actual.');
                this.value = '';
            }
            fechaFinInput.setAttribute('min', this.value);
        });

        // Validate fechaFin to be after fechaInicio
        fechaFinInput.addEventListener('change', function() {
            if (this.value <= fechaInicioInput.value) {
                alert('La fecha de finalización debe ser posterior a la fecha de inicio.');
                this.value = '';
            }
        });
    });
</script>

