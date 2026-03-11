<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tablerunautos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre')->nullable(); // nombre del partner
            $table->string('imagen');             // ruta de la imagen
            $table->integer('orden')->default(0); // orden de aparición
            
            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tablerunautos');
    }
};
