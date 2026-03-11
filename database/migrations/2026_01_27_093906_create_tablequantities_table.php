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
        Schema::create('tablequantities', function (Blueprint $table) {
            $table->id();

            $table->string('titulo'); // Docentes, Alumnos, etc.
            $table->integer('cantidad'); // 50, 900, etc.
            $table->string('icono'); // fa-user-tie, fa-users
            $table->integer('duracion')->default(7); // purecounter-duration
            
            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tablequantities');
    }
};
