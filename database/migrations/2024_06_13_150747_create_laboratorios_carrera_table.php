<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLaboratoriosCarreraTable extends Migration
{
    public function up()
    {
        Schema::create('laboratorios_carrera', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_carrera');
            $table->unsignedBigInteger('id_lab');
            $table->unsignedBigInteger('id_institucion');
            $table->timestamps();
        });

        // Inserta los datos específicos en laboratorios_carrera
        $this->insertLaboratoriosCarrera();
    }

    public function down()
    {
        Schema::dropIfExists('laboratorios_carrera');
    }

    private function insertLaboratoriosCarrera()
    {
        DB::table('laboratorios_carrera')->insert([
            [
                'id_carrera' => 2,
                'id_lab' => 1,
                'id_institucion' => 6,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id_carrera' => 2,
                'id_lab' => 2,
                'id_institucion' => 6,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id_carrera' => 2,
                'id_lab' => 3,
                'id_institucion' => 6,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id_carrera' => 2,
                'id_lab' => 4,
                'id_institucion' => 6,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id_carrera' => 2,
                'id_lab' => 5,
                'id_institucion' => 6,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id_carrera' => 2,
                'id_lab' => 6,
                'id_institucion' => 6,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id_carrera' => 2,
                'id_lab' => 7,
                'id_institucion' => 6,
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);
    }
}

