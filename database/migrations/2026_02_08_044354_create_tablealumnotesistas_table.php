<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tablealumnotesistas', function (Blueprint $table) {
            $table->id();

            // Para identificar que es DERECHO
            $table->string('modulo')->default('derecho');

            // Columnas del HTML
            $table->string('nombre');        // NOMBRES
            $table->string('foto')->nullable(); // FOTO
            $table->string('titulo');        // TITULO
            $table->date('fecha')->nullable();    // FECHA (AHORA NULLABLE)

            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tablealumnotesistas');
    }
};
