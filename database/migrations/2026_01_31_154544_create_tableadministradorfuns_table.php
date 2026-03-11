<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tableadministradorfuns', function (Blueprint $table) {
            $table->id();

            /* ==============================
               CONTENIDO PRINCIPAL
            ============================== */
            $table->string('titulo_pagina')->nullable();   // Decano
            $table->string('nombre')->nullable();          // Dr. Teodulo J. Santos Cruz
            $table->string('imagen')->nullable();          // foto (public/imagenes)
            /* ==============================
               FUNCIONES (LISTA)
            ============================== */
            $table->json('funciones')->nullable();

            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tableadministradorfuns');
    }
};
