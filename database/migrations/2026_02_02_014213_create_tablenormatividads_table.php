<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tablenormatividads', function (Blueprint $table) {
            $table->id();

            // Control
            $table->string('section'); // about | feature
            $table->string('tipo');    // texto | lista | archivo

            // Contenido
            $table->string('titulo')->nullable();
            $table->string('subtitulo')->nullable();
            $table->text('descripcion')->nullable();

            // Para lista
            $table->json('items')->nullable();

            // Para archivos
            $table->string('url')->nullable();
            $table->string('icono')->nullable();
            $table->string('color')->nullable();

            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tablenormatividads');
    }
};
