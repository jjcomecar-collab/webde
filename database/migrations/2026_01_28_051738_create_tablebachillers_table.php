<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tablebachillers', function (Blueprint $table) {
            $table->id();

            $table->string('titulo');          // Ej: BACHILLER
            $table->string('descripcion');     // Ej: Requisitos para obtener el Bachiller
            $table->string('icono');           // Ej: bi-eye
            $table->string('color');           // Ej: #ffbb2c
            $table->string('url');             // Link Drive

            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tablebachillers');
    }
};
