<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // En la migración (database/migrations)

public function up()
{
    Schema::create('articulos', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('produccion_id')->nullable();
        $table->string('revista')->nullable();
        $table->string('volumen')->nullable();
        $table->string('paginas')->nullable();
        $table->string('issn')->nullable();
        $table->text('descripcion')->nullable();
        $table->string('estado')->nullable();
        $table->string('direccion_articulo')->nullable(); 

        $table->timestamps();

        // Llave foránea para relacionar con la tabla producciones
        $table->foreign('produccion_id')->references('id_pro')->on('produccion')->onDelete('cascade');
    });
}

    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};
