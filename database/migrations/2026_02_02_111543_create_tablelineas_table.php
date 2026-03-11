<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tablelineas', function (Blueprint $table) {
            $table->id();

            // ===== ABOUT =====
            $table->string('about_titulo')->nullable();
            $table->string('about_subtitulo')->nullable();
            $table->string('about_anio')->nullable();
            $table->text('about_descripcion')->nullable();
            $table->text('about_descripcion_extra')->nullable();
            $table->string('about_imagen')->nullable();
            $table->string('about_video_url')->nullable();

            // ===== SERVICES (JSON) =====
            $table->json('services')->nullable();
            /*
              Ejemplo JSON:
              [
                {
                  "titulo": "Nesciunt Mete",
                  "descripcion": "Provident nihil minus...",
                  "icono": "bi bi-activity",
                  "color": "item-cyan"
                }
              ]
            */

            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('tablelineas');
    }
};
