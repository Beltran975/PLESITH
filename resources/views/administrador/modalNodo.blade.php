<!-- Modal -->
<div class="modal fade" id="modal-lista-{{$i->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{$i->tema_inv}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table>
            <tbody>
                <tr>
                    <th>Tema de investigación:</th>
                    <td>{{$i->tema_inv}}</td>
                </tr>
                <tr>
                    <th>Categoría:</th>
                    <td>{{$i->categoria}}</td>
                </tr>
                <tr>
                    <th>Líder:</th>
                    <td>{{$i->lider}}</td>
                </tr>
                <tr>
                    <th>Colaboradores:</th>
                    <td>{{$i->colaboradores}}</td>
                </tr>
                <tr>
                    <th>Área de conocimiento:</th>
                    <td>{{$i->linea_inv}}</td>
                </tr>
                <tr>
                    <th>Institución ligada:</th>
                    <td>{{$i->institucion_ligada}}</td>
                </tr>
                <tr>
                    <th>Descripción:</th>
                    <td>{{$i->descripcion}}</td>
                </tr>
                <tr>
                    <th>Documentación:</th>
                    <td>{{$i->documento}}</td>
                </tr>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>