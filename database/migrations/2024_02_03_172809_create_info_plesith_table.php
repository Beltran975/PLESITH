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
        Schema::create('info_plesith', function (Blueprint $table) {
            $table->id('id_inf');
            $table->string('lineaInv');
            $table->string('grado');
            $table->string('evidenciaGrado');
            $table->string('pertenece');
            $table->string('evidenciaSni')->nullable();

            //table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('info_plesith');
    }
};
