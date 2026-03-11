<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tabledepartamentos', function (Blueprint $table) {
            $table->id();

            /* ==========================
               PAGE TITLE
            ========================== */
            $table->string('titulo_pagina')->nullable(); 
            // Ej: Directora de Departamento

            /* ==========================
               DIRECTORA (PERFIL)
            ========================== */
            $table->string('nombre')->nullable();        
            // Ej: Dra. Carmen Neyra Olinda

            $table->string('imagen')->nullable();        
            // public/imagenes

            /* ==========================
               FUNCIONES (LISTA)
            ========================== */
            $table->json('funciones')->nullable();
            /*
              Ejemplo:
              [
                "Itaque quidem optio quia voluptatibus dolorem dolor.",
                "Modi eum sed possimus accusantium.",
                "Itaque quidem optio quia voluptatibus dolorem dolor."
              ]
            */

            /* ==========================
               SECCIÓN PLAN / CURRÍCULO
            ========================== */
            $table->string('plan_titulo')->nullable();
            // Ej: PLAN DE ESTUDIOS Y CURRICULO

            $table->json('planes')->nullable();
            /*
              Ejemplo:
              [
                {
                  "titulo": "MALLA CURRICULAR 2018",
                  "url": "https://drive.google.com/...",
                  "icono": "bi-download",
                  "color": "#532cffff"
                },
                {
                  "titulo": "CURRICULO 2021",
                  "url": "https://drive.google.com/...",
                  "icono": "bi-download",
                  "color": "#e83803ff"
                }
              ]
            */


            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tabledepartamentos');
    }
};
