<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produccions', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('evidencia');
            $table->string('autor_es');
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('pais');
            $table->string('year');
            $table->string('proposito');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produccions');
    }
};
