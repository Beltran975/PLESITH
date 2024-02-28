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
            $table->string('colaboradores');
            $table->string('linea_inv');
            $table->string('institucion_ligada');
            $table->string('descripcion');
            $table->string('documento');

            //$table->foreign('id_user')->references('id')->on('users');
            $table->foreignId('id_user')
                ->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()
                ->nullOnDelete();

                $table->foreignId('id_institucion')
                ->nullable()
                ->constrained('instituciones')
                ->cascadeOnUpdate()
                ->nullOnDelete();
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
