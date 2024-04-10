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
        Schema::create('nodo', function (Blueprint $table) {
            $table->id();
            $table->string('tema_inv');
            $table->string('categoria');
            $table->string('lider');
            //$table->string('colaboradores')->nullable();
            $table->string('linea_inv');
            $table->string('institucion_ligada');
            $table->longText('descripcion');
            $table->string('documento');
            $table->unsignedBigInteger('colaboradores')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('colaboradores')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nodo');
    }
};
