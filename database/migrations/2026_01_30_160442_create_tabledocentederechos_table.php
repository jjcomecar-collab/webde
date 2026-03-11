<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tabledocentederechos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('tipo'); // DOCENTES NOMBRADOS | DOCENTES CONTRATADOS
            $table->string('escuela')->default('Escuela Derecho');
            $table->string('imagen')->nullable();
            $table->integer('orden')->default(0);

            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tabledocentederechos');
    }
};
