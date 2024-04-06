<!-- Modal -->
<div class="modal fade" id="Modal-Colab-{{$nodo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{$nodo->tema_inv}} title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label for="correoColaborador" class="form-label">Correo</label>
        <input class="form-control" id="colaboradores" name="colaboradores" type="text">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerra</button>
        <button type="button" class="btn btn-primary" onclick="enviarCorreo()">Enviar</button>
      </div>
    </div>
  </div>
</div>

<script>
function enviarCorreo() {
    var colaboradores = $('#colaboradores').val();

    // Redirige a la ruta enviar.correo con el parámetro 'correo' en la URL
    window.location.href = "{{ route('enviar.correo') }}?correo=" + encodeURIComponent(colaboradores);
}
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.get('/obtener-correos', function(data) {
                var opciones = '';
                data.forEach(function(correo) {
                    opciones += '<option value="' + correo + '">';
                });
                $('#colaboradores').attr('list', 'correosList');
                $('#colaboradores').after('<datalist id="correosList">' + opciones + '</datalist>');
            });
        });
    </script>
