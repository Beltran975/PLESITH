<table class="tabla-modal table table-borderless">
    <tbody>
        @foreach ($producciones as $produccion)
        <tr>
            <th class="rotated-header">Tema de investigación: </th>
            <td class="contenido-produccion">{{$produccion->tema_inv}}</td>
        </tr>
        <tr>
            <th class="rotated-header">Categoría: </th>
            <td class="contenido-produccion">{{$produccion->categoria}}</td>
        </tr>
        <tr>
            <th class="rotated-header">Líder:</th>
            <td class="contenido-produccion">{{$produccion->lider}}</td>
            </tr>
        <tr>
            <th class="rotated-header">Colaboradores: </th>
            <td class="contenido-produccion">{{$produccion->colaboradores}}</td>
        </tr>
        <tr>
            <th class="rotated-header">Área de conocimiento:</th>
            <td class="contenido-produccion">{{$produccion->linea_inv}}</td>
        </tr>
        <tr>
            <th class="rotated-header">Institución ligada:: </th>
            <td class="contenido-produccion">{{$produccion->institucion_ligada}}</td>
        </tr>
        <tr>
            <th class="rotated-header">Descripción: </th>
            <td class="contenido-produccion">{{$produccion->descripcion}}</td>
        </tr>
        <tr>
            <th class="rotated-header">Documentación: </th>
            <td class="contenido-produccion"><a href="/nodos/{{$produccion->documento}}" target="blanck_">{{$produccion->documento}}</a></td>
        </tr>
        <tr>
          <th><hr class="hr-gob"></th>
          <td><hr class="hr-gob"></td>
        </tr>
        @endforeach
    </tbody>
</table>