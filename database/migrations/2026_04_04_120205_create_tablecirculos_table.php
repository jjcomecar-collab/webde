<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tablecirculos', function (Blueprint $table) {
            $table->id();

            // Nombre del círculo (se ordena alfabéticamente)
            $table->string('circulo');

            // Nombre del integrante
            $table->string('nombre');

            // Cargo dentro del círculo
            $table->string('cargo')->nullable();

            // Imagen
            $table->string('imagen')->nullable();

            // Orden manual del integrante dentro del círculo
            $table->integer('orden')->default(0);

            // Estado (eliminación lógica)
            $table->tinyInteger('estado')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tablecirculos');
    }
};
