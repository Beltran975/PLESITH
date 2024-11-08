<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MapaController extends Controller
{
    public function index()
    {
        $instituciones = DB::table('instituciones as i')
            ->leftJoin('instituciones_carreras as ic', 'i.id', '=', 'ic.id_institucion')
            ->leftJoin('carreras as c', 'ic.id_carrera', '=', 'c.id')
            ->leftJoin('laboratorios_carrera as lc', 'c.id', '=', 'lc.id_carrera')
            ->leftJoin('laboratorios as l', 'lc.id_lab', '=', 'l.id')
            ->select(
                'i.id as institucion_id',
                'i.institucion',
                'i.latitud',
                'i.longitud',
                'i.imagen as institucion_imagen',
                'c.id as carrera_id',
                'c.nombre as carrera',
                'c.descripcion as descripcion_carrera',
                'c.carrera_imagen',
                'l.id as lab_id',
                'l.nombre as lab_nombre',
                'l.descripcion as lab_descripcion',
                'l.imagen as lab_imagen', // Añadir la columna de imagen del laboratorio
                'l.responsable as lab_responsable'
            )
            ->get();

        $institucionesData = [];
        foreach ($instituciones as $row) {
            $institucion_id = $row->institucion_id;
            $nombre_institucion = str_replace(' ', '_', $row->institucion); // Reemplazar espacios con guiones bajos

            if (!isset($institucionesData[$institucion_id])) {
                // Construir la ruta de la imagen de la institución
                $institucion_imagen_path = 'asset/images/' . $nombre_institucion . '/';
                $institucion_imagen = $row->institucion_imagen ? asset($institucion_imagen_path . $row->institucion_imagen) : null;

                $institucionesData[$institucion_id] = [
                    'name' => $row->institucion,
                    'lat' => $row->latitud,
                    'lon' => $row->longitud,
                    'imagen' => $institucion_imagen,
                    'carreras' => []
                ];
            }

            $carrera_id = $row->carrera_id;
            if ($carrera_id && !isset($institucionesData[$institucion_id]['carreras'][$carrera_id])) {
                // Construir la ruta de la imagen de la carrera (ahora en la misma carpeta que la institución)
                $carrera_imagen_path = $institucion_imagen_path; // Usamos la misma carpeta que la institución
                $carrera_imagen_list = $row->carrera_imagen ? explode(',', $row->carrera_imagen) : [];

                $carrera_images = [];
                foreach ($carrera_imagen_list as $imagen) {
                    $carrera_images[] = $imagen ? asset($carrera_imagen_path . $imagen) : null;
                }

                $institucionesData[$institucion_id]['carreras'][$carrera_id] = [
                    'id' => $carrera_id,
                    'name' => $row->carrera,
                    'descripcion' => $row->descripcion_carrera,
                    'imagenes' => $carrera_images,
                    'laboratorios' => []
                ];
            }

            if ($row->lab_id) {
                // Construir la ruta de la imagen del laboratorio
                $lab_imagen_path = $institucion_imagen_path; // Usamos la misma carpeta que la institución
                $lab_imagen_list = $row->lab_imagen ? explode(',', $row->lab_imagen) : [];

                $lab_images = [];
                foreach ($lab_imagen_list as $imagen) {
                    $lab_images[] = $imagen ? asset($lab_imagen_path . $imagen) : null;
                }

                $institucionesData[$institucion_id]['carreras'][$carrera_id]['laboratorios'][] = [
                    'id' => $row->lab_id,
                    'nombre' => $row->lab_nombre,
                    'descripcion' => $row->lab_descripcion,
                    'responsable' => $row->lab_responsable,
                    'imagenes' => $lab_images
                ];
            }
        }
        

        return view('mapa', ['instituciones' => $institucionesData]);
    }
    
}
