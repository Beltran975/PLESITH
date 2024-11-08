<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLaboratoriosTable extends Migration
{
    public function up()
    {
        Schema::create('laboratorios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->string('imagen', 255)->nullable();
            $table->timestamps();
        });

        // Inserta los registros de laboratorios aquí
        DB::table('laboratorios')->insert([
            [
                'nombre' => 'Sistemas Operativos',
                'descripcion' => '.....................',
                'imagen' => '\"\"',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nombre' => 'Base de Datos',
                'descripcion' => '..............................',
                'imagen' => '\"\"',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nombre' => 'Modelado de Desarrollo de Software',
                'descripcion' => '.........................',
                'imagen' => '\"\"',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nombre' => 'Diseño y Desarrollo Movil',
                'descripcion' => '.............................',
                'imagen' => '\"\"',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nombre' => 'Redes WAN',
                'descripcion' => '....................',
                'imagen' => '\"\"',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nombre' => 'Diseño y Desarrollo WEB',
                'descripcion' => '........................',
                'imagen' => '\"\"',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'nombre' => 'Programacion Orientada a Objetos',
                'descripcion' => '.................',
                'imagen' => '\"\"',
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);

        // Ajusta el valor del AUTO_INCREMENT
        DB::statement("ALTER TABLE laboratorios AUTO_INCREMENT = 11;");
    }

    public function down()
    {
        Schema::dropIfExists('laboratorios');
    }
}
