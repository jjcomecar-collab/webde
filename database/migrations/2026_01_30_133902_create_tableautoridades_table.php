<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tableautoridades', function (Blueprint $table) {
            $table->id();

            $table->string('cargo');          // DECANO, DIRECTOR, etc
            $table->string('nombre');
            $table->string('email')->nullable();
            $table->string('imagen')->nullable();
            $table->integer('orden')->default(0); // para controlar el orden

            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tableautoridades');
    }
};
