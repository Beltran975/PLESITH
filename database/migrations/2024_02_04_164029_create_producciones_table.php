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
        Schema::create('produccion', function (Blueprint $table) {
            $table->id('id_pro');
            $table->string('tipo');
            $table->string('evidencia');
            $table->string('autores');
            $table->string('titulo');
            $table->longText('descripcion');
            $table->string('pais');
            $table->string('year');
            $table->string('proposito');

            //$table->foreign('id_user')->references('id')->on('users');
            $table->foreignId('id_user')
                ->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()
                ->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producciones');
    }
};
