<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        // database/migrations/xxxx_xx_xx_create_welcomes_table.php
        Schema::create('tablewelcomes', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description');
            
            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tablewelcomes');
    }
};
