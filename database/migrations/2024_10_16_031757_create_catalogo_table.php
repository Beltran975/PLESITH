<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogoTable extends Migration
{
    public function up()
    {
        Schema::create('catalogo', function (Blueprint $table) {
            $table->id(); // Auto-incremental
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nombrepro'); // Nombre del prototipo
            $table->string('descripcion'); // Descripción del prototipo
            $table->string('imagen'); // Almacenar la ruta de la imagen
            $table->string('categoria'); // Campo para la categoría
            $table->timestamps(); // Created_at y Updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('catalogo');
    }
}

