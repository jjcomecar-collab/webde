<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tablefeatures', function (Blueprint $table) {
            $table->id();

            $table->string('modulo');

            $table->string('titulo');
            $table->string('url')->nullable();
            $table->string('icono')->nullable();
            $table->string('color')->nullable();

            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tablefeatures');
    }
};
