<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tablepois', function (Blueprint $table) {
            $table->id();

            /* ==========================
               MENÚ LATERAL
            ========================== */
            $table->json('menu')->nullable();
            /*
                Ejemplo:
                [
                    "Web Design",
                    "Software Development",
                    "Product Management",
                    "Graphic Design",
                    "Marketing"
                ]
            */

            /* ==========================
               COLUMNA IZQUIERDA
            ========================== */
            $table->string('subtitulo')->nullable();
            $table->text('descripcion_corta')->nullable();

            /* ==========================
               COLUMNA DERECHA
            ========================== */
            $table->string('imagen')->nullable(); // public/imagenes
            $table->string('titulo_principal')->nullable();

            $table->text('parrafo_1')->nullable();
            $table->json('lista')->nullable();
            /*
                Ejemplo:
                [
                    "Aut eum totam accusantium voluptatem.",
                    "Assumenda et porro nisi nihil nesciunt voluptatibus.",
                    "Ullamco laboris nisi ut aliquip ex ea"
                ]
            */

            $table->text('parrafo_2')->nullable();
            $table->text('parrafo_3')->nullable();

            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tablepois');
    }
};
