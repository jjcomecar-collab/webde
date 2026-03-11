<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tablereprederechos', function (Blueprint $table) {
            $table->id();

            // Page title
            $table->string('titulo_pagina');

            // Imagen
            $table->string('imagen')->nullable();

            // Contenido principal
            $table->string('inner_title');
            $table->string('anio')->nullable();
            $table->string('subtitulo')->nullable();

            $table->text('descripcion');

            // Lista (se guardará como JSON)
            $table->json('lista')->nullable();

            $table->text('descripcion_final')->nullable();

            // Video
            $table->string('video_url')->nullable();


            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tablereprederechos');
    }
};
