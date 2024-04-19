<!-- Modal -->
<div class="modal fade" id="modal-delete-{{$nodo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('nodo.destroy', $nodo->id)}}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar nodo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseas eliminar información de el nodo con tema de investigación: {{$nodo->tema_inv}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-danger bi bi-trash3-fill" value="Eliminar">
                </div>
            </div>
        </form>
    </div>
</div>