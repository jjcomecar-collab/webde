<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tablercus', function (Blueprint $table) {
            $table->id();

            $table->string('title');            // Título principal
            $table->text('description');        // Texto descriptivo
            $table->string('download_link');    // Link Google Drive u otro
            $table->string('icon')->default('bi bi-download'); // Icono Bootstrap
            
            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tablercus');
    }
};
