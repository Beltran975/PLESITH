<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitucionesCarrerasTable extends Migration
{
    public function up()
    {
        Schema::create('instituciones_carreras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_institucion');
            $table->unsignedBigInteger('id_carrera');
            $table->timestamps();

            $table->foreign('id_institucion')->references('id')->on('instituciones')->onDelete('cascade');
            $table->foreign('id_carrera')->references('id')->on('carreras')->onDelete('cascade');
        });

        // Inserta las relaciones de instituciones y carreras aquí
        $this->insertInstitucionesCarreras();
    }

    public function down()
    {
        Schema::dropIfExists('instituciones_carreras');
    }

    // Método para insertar las relaciones de instituciones y carreras
    private function insertInstitucionesCarreras()
    {
        DB::table('instituciones_carreras')->insert([
            [
                'id_institucion' => 6, // ID de la institución UTVM
                'id_carrera' => 1, // ID de la carrera Administración
            ],
            [
                'id_institucion' => 6, // ID de la institución UTVM
                'id_carrera' => 2, // ID de la carrera Tecnologías de la Información
            ],
            [
                'id_institucion' => 6, // ID de la institución UTVM
                'id_carrera' => 3, // ID de la carrera Turismo
            ],
            [
                'id_institucion' => 6, // ID de la institución UTVM
                'id_carrera' => 4, // ID de la carrera Gastronomía
            ],
            [
                'id_institucion' => 6, // ID de la institución UTVM
                'id_carrera' => 5, // ID de la carrera Energías Renovables
            ],
            [
                'id_institucion' => 6, // ID de la institución UTVM
                'id_carrera' => 6, // ID de la carrera Mecánica
            ],
            [
                'id_institucion' => 6, // ID de la institución UTVM
                'id_carrera' => 7, // ID de la carrera Mecatrónica
            ],
            [
                'id_institucion' => 6, // ID de la institución UTVM
                'id_carrera' => 8, // ID de la carrera Procesos Alimentarios
            ],
        ]);
    }
}
