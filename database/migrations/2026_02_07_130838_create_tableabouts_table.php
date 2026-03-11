<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tableabouts', function (Blueprint $table) {
            $table->id();

            $table->string('modulo'); // cepejup, estandares, normatividad

            $table->string('imagen')->nullable();
            $table->string('titulo')->nullable();
            $table->smallInteger('year')->nullable();
            $table->string('subtitulo')->nullable();

            $table->text('descripcion')->nullable();
            $table->json('items')->nullable();
            $table->text('descripcion_final')->nullable();

            $table->string('video_url', 500)->nullable();

            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tableabouts');
    }
};
