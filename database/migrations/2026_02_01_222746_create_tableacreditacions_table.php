<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tableacreditacions', function (Blueprint $table) {
            $table->id();

            // ABOUT
            $table->string('about_titulo');
            $table->string('about_subtitulo')->nullable();
            $table->text('about_descripcion')->nullable();
            $table->string('about_imagen')->nullable();
            $table->string('video_url')->nullable();

            // SERVICES (cards)
            $table->json('services')->nullable();

            // SERVICE DETAILS
            $table->json('service_menu')->nullable();
            $table->string('detail_titulo')->nullable();
            $table->text('detail_descripcion')->nullable();
            $table->string('detail_imagen')->nullable();

            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tableacreditacions');
    }
};
