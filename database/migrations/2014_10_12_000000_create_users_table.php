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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('curp')->unique();
            $table->string('institucion');
            $table->string('programa');
            $table->string('password');
            $table->string('archivoCurp')->nullable();
            $table->string('image_path')->nullable();
            $table->string('verificacion');
            $table->string('codigo')->unique()->nullable();
            $table->enum('fullacces',['yes','no'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
