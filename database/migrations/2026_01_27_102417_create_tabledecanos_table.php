<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tabledecanos', function (Blueprint $table) {
            $table->id();


            $table->string('cargo');        // Decano de la Facultad...
            $table->string('nombre');       // Dr. Teódulo J. Santos Cruz
            $table->string('imagen');       // decano.jpg (ruta o nombre)
            $table->integer('orden')->default(0);      // por si luego hay más autoridades

            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabledecanos');
    }
};
