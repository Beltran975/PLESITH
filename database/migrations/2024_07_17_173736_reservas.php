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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('telefono');
            $table->string('departamento');
            $table->string('institucion_laboratorio');
            $table->string('carrera_laboratorio');
            $table->string('laboratorio');
            $table->string('responsable');
            $table->string('tipo_equipo');
            $table->datetime('fecha_inicio');
            $table->datetime('fecha_fin');
            $table->text('motivo');
            $table->string('titulo_proyecto');
            $table->text('descripcion_proyecto');
            $table->string('supervisores')->nullable();
            $table->string('curso_relacionado')->nullable();
            $table->string('software_necesario')->nullable();
            $table->string('estado');
            $table->string('pdfReserva');
            $table->string('ticket');
            $table->unsignedBigInteger('aprobado1');
            $table->unsignedBigInteger('aprobado2');
            $table->timestamps();

            $table->foreign('aprobado1')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('aprobado2')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
