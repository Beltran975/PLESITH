<!-- Modal -->
<div class="modal fade" id="Modal-baja-{{$postulacion->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <form id="formNoRevisado" action="{{ route('postulacion.no_revisado', ['id' => $postulacion->id]) }}" method="POST" style="display: none;">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Usuario: {{$user->name}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="document.getElementById('formNoRevisado').submit()">Inhabilitar usuario</button>
      </div>
    </div>
  </form>
  </div>
</div>