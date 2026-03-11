<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tabletramitecostos', function (Blueprint $table) {
            $table->id();

            $table->string('section');       // 'pagos', 'servicios', etc.
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('icon')->nullable();
            $table->string('link')->nullable();
            $table->text('description')->nullable();
            $table->string('color')->nullable();
            $table->integer('order')->default(0);

            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tabletramitecostos');
    }
};
