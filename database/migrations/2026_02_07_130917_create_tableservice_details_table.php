<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tableservice_details', function (Blueprint $table) {
            $table->id();

            $table->string('modulo'); // cepejup, estandares, normatividad

            $table->json('menu')->nullable();

            $table->string('titulo')->nullable();
            $table->string('imagen')->nullable();

            $table->text('descripcion')->nullable();
            $table->json('lista')->nullable();

            $table->text('contenido_1')->nullable();
            $table->text('contenido_2')->nullable();

            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tableservice_details');
    }
};
