<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tableestandares', function (Blueprint $table) {
            $table->id();

            // ================= ABOUT =================
            $table->string('about_titulo')->nullable();
            $table->string('about_subtitulo')->nullable();
            $table->string('about_anio')->nullable();
            $table->text('about_descripcion')->nullable();
            $table->json('about_lista')->nullable(); // check list
            $table->string('about_video_url')->nullable();
            $table->string('about_imagen')->nullable();

            // ================= SERVICES =================
            $table->json('services')->nullable();
            /*
              [
                {
                  "icon": "bi-activity",
                  "titulo": "Nesciunt Mete",
                  "descripcion": "Texto...",
                  "color": "item-cyan"
                }
              ]
            */

            // ================= SERVICE DETAILS =================
            $table->json('service_menu')->nullable();
            $table->string('service_detalle_titulo')->nullable();
            $table->text('service_detalle_descripcion')->nullable();
            $table->string('service_detalle_imagen')->nullable();
            $table->json('service_detalle_lista')->nullable();

            // ================= FEATURES =================
            $table->string('features_titulo')->nullable();
            $table->string('features_subtitulo')->nullable();
            $table->json('features_items')->nullable();
            /*
              [
                {
                  "titulo": "DERECHO",
                  "icon": "bi-download",
                  "color": "#532cffff",
                  "url": "https://..."
                }
              ]
            */

            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tableestandares');
    }
};
