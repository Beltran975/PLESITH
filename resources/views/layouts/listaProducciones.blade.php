<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producciones</title>
</head>
<body>
    <div id="tab1" class="tabs-producciones active">
        <table class="table contenido produccion">
            <tbody>
                @foreach ($datos as $d)
                <tr>
                    <th class="rotated-header">Tipo:</th>
                    <td class="contenido-produccion">{{ $d->tipo}}</td>
                </tr>
                <tr>
                    <th class="rotated-header">Evidencia:</th>
                    <td class="contenido-produccion"><a href="/produccion/{{ $d->evidencia}}" target="blanck_">Evidencia PDF</a></td>
                </tr>
                <tr>
                    <th class="rotated-header">Autor(es):</th>
                    <td class="contenido-produccion">{{ $d->autores}}</td>
                </tr>
                <tr>
                    <th class="rotated-header">Título:</th>
                    <td class="contenido-produccion">{{ $d->titulo}}</td>
                </tr>
                <tr>
                    <th class="rotated-header">Descripción:</th>
                    <td class="contenido-produccion">{{ $d->descripcion}}</td>
                </tr>
                <tr>
                    <th class="rotated-header">País:</th>
                    <td class="contenido-produccion">{{ $d->pais}}</td>
                </tr>                
                <tr>
                    <th class="rotated-header">Año:</th>
                    <td class="contenido-produccion">{{ $d->year}}</td>
                </tr>
                <tr>
                    <th class="rotated-header">Propósito:</th>
                    <td class="contenido-produccion">{{ $d->proposito}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>