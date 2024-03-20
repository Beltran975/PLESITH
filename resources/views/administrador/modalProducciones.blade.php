<div class="modal fade" id="Modal-pruduc-{{ $produccion->id_pro }}">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{$produccion->titulo}}</h4>
                <button type="button" class="btn btn-secondary">Generar reporte <i class="bi bi-download"></i></button>
            </div>
            <div class="modal-body">
                <table class="tabla-modal table table-borderless" >
                    <tbody>
                        <tr>
                            <th class="rotated-header">Tipo: </th>
                            <td class="contenido-produccion">{{$produccion->tipo}}</td>
                        </tr>
                        <tr>
                            <th class="rotated-header">Evidencia: </th>
                            <td class="contenido-produccion"><a href="/produccion/{{$produccion->evidencia}}" target="blanck_">{{$produccion->evidencia}}</a></td>
                        </tr>
                        <tr>
                            <th class="rotated-header">Autor (es) </th>
                            <td class="contenido-produccion">{{$produccion->autores}}</td>
                        </tr>
                        <tr>
                            <th class="rotated-header">Título: </th>
                            <td class="contenido-produccion">{{$produccion->titulo}}</td>
                        </tr>
                        <tr>
                            <th class="rotated-header">Descripción:</th>
                            <td class="contenido-produccion">{{$produccion->descripcion}}</td>
                        </tr>
                        <tr>
                            <th class="rotated-header">País: </th>
                            <td class="contenido-produccion">{{$produccion->pais}}</td>
                        </tr>
                        <tr>
                            <th class="rotated-header">Fecha: </th>
                            <td class="contenido-produccion">{{$produccion->year}}</td>
                        </tr>
                        <tr>
                            <th class="rotated-header">Propósito: </th>
                            <td class="contenido-produccion">{{$produccion->proposito}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>