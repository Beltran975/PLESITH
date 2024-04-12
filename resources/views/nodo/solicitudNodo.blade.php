<!-- Modal -->
<div class="modal fade" id="Modal-colaborar-{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{$d->tema_inv}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('enviarCorreo', ['nodoId' => $d->id]) }}" method="POST">
          @csrf
          <label for="correoColaborador" class="form-label">Correo de colaboración</label>
          <input class="form-control" id="correoColaborador" name="correo" type="text">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Enviar Correo</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>


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
