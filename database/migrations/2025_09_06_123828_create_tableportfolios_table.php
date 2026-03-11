<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('tableportfolios', function (Blueprint $table) {
            $table->id();

            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('imagen'); // nombre de archivo
            $table->enum('categoria', ['noticia', 'evento', 'onomastico']);
            $table->boolean('estado')->default(1); // 1=activo, 0=inactivo

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tableportfolios');
    }
};
