<table class="tabla-modal table table-borderless">
    <tbody>
        @foreach ($producciones as $produccion)
        <tr>
            <th class="rotated-header">Tipo: </th>
            <td class="contenido-produccion">{{$produccion->tipo}}</td>
        </tr>
        <tr>
            <th class="rotated-header">Evidencia: </th>
            <td class="contenido-produccion"><a href="produccion/{{$produccion->evidencia}}" target="blanck_">{{$produccion->evidencia}}</a></td>
        </tr>
        <tr>
            <th class="rotated-header">Autor(es): </th>
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
        <tr>
            <hr class="hr-gob">
        </tr>
        @endforeach
    </tbody>
</table>