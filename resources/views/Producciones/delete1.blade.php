<!-- Modal -->
<div class="modal fade" id="modal-delete1-{{$produccion->id_pro}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <form action="{{ route('editProduc.destroy', $produccion->id_pro)}}" method="post">
  @csrf
  @method('DELETE')
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar produccion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Deseas eliminar información de la produccion con tipo que es: {{ $produccion->tipo }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-danger bi bi-trash3-fill" value="Eliminar"> 
      </div>
    </div>
    </form>
  </div>
</div>