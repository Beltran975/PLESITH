<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produccion_id');
            $table->string('editorial')->nullable();
            $table->string('edicion')->nullable();
            $table->string('paginas')->nullable();
            $table->string('estado')->nullable();
            $table->string('isbn')->nullable();
            $table->timestamps();

            // Llave foránea específica
            $table->foreign('produccion_id')->references('id_pro')->on('produccion')->onDelete('cascade');
        });
    }
};
