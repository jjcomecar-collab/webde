<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tableconsejofacultads', function (Blueprint $table) {
            $table->id();

            /* ==================================================
               SECCIÓN 1 : ABOUT / CONSEJO FACULTAD
            ================================================== */
            $table->string('about_titulo')->nullable();
            $table->string('about_subtitulo')->nullable();
            $table->string('about_anio')->nullable();
            $table->text('about_descripcion')->nullable();
            $table->json('about_lista')->nullable();
            $table->string('about_video')->nullable();
            $table->string('about_imagen')->nullable();

            /* ==================================================
               SECCIÓN 2 : SERVICIOS / CARDS
            ================================================== */
            $table->json('servicios')->nullable();
            /*
                Ejemplo:
                [
                  {
                    "titulo": "Nesciunt Mete",
                    "descripcion": "Provident nihil minus...",
                    "icono": "bi-activity",
                    "color": "item-cyan"
                  }
                ]
            */

            /* ==================================================
               SECCIÓN 3 : DETALLE DE SERVICIOS
            ================================================== */
            $table->json('detalle_menu')->nullable();
            $table->string('detalle_titulo')->nullable();
            $table->text('detalle_descripcion')->nullable();
            $table->json('detalle_lista')->nullable();
            $table->string('detalle_imagen')->nullable();


            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tableconsejofacultads');
    }
};
