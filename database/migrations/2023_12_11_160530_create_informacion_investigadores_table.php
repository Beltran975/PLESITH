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
        Schema::create('informacion_investigadores', function (Blueprint $table) {
            $table->id();
            $table->string('linea_investigacion');
            $table->string('grado_academico');
            $table->string('pertenece_SNI');
            $table->string('evidencia_SNI');
            $table->string('evidencia_grado_academico');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacion_investigadores');
    }
};
