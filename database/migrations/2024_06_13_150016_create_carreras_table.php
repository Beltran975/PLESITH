<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCarrerasTable extends Migration
{
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->string('imagen', 255)->nullable();
            $table->timestamps();
        });

        // Inserta los registros de carreras aquí
        $this->insertCarreras();
    }

    public function down()
    {
        Schema::dropIfExists('carreras');
    }

    // Método para insertar los registros de carreras
    private function insertCarreras()
    {
        DB::table('carreras')->insert([
            [
                'nombre' => 'Administración',
                'descripcion' => 'Descripción de la carrera de Administración en UTVM.',
                'imagen' => 'ruta_a_imagen_administracion.jpg',
            ],
            [
                'nombre' => 'Tecnologías de la Información',
                'descripcion' => 'Descripción de la carrera de Tecnologías de la Información en UTVM.',
                'imagen' => 'ruta_a_imagen_ti.jpg',
            ],
            [
                'nombre' => 'Turismo',
                'descripcion' => 'Descripción de la carrera de Turismo en UTVM.',
                'imagen' => 'ruta_a_imagen_turismo.jpg',
            ],
            [
                'nombre' => 'Gastronomía',
                'descripcion' => 'Descripción de la carrera de Gastronomía en UTVM.',
                'imagen' => 'ruta_a_imagen_gastronomia.jpg',
            ],
            [
                'nombre' => 'Energías Renovables',
                'descripcion' => 'Descripción de la carrera de Energías Renovables en UTVM.',
                'imagen' => 'ruta_a_imagen_energias_renovables.jpg',
            ],
            [
                'nombre' => 'Mecánica',
                'descripcion' => 'Descripción de la carrera de Mecánica en UTVM.',
                'imagen' => 'ruta_a_imagen_mecanica.jpg',
            ],
            [
                'nombre' => 'Mecatrónica',
                'descripcion' => 'Descripción de la carrera de Mecatrónica en UTVM.',
                'imagen' => 'ruta_a_imagen_mecatronica.jpg',
            ],
            [
                'nombre' => 'Procesos Alimentarios',
                'descripcion' => 'Descripción de la carrera de Procesos Alimentarios en UTVM.',
                'imagen' => 'ruta_a_imagen_procesos_alimentarios.jpg',
            ],
        ]);
    }
}
