<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('produccion_id');
            $table->text('alcance_objetivo');
            $table->string('empresa_beneficiaria', 255);
            $table->string('estado', 50);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('produccion_id')
                  ->references('id_pro')
                  ->on('produccion')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultorias');
    }
}

