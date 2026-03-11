<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tableresponsocials', function (Blueprint $table) {
            $table->id();

            // Page title
            $table->string('page_title');

            // Imagen
            $table->string('image')->nullable();

            // Contenido principal
            $table->string('inner_title');
            $table->string('year')->nullable();
            $table->string('story_title');

            $table->text('description');
            $table->json('list_items')->nullable();
            $table->text('final_text')->nullable();

            // Video
            $table->string('video_url')->nullable();


            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tableresponsocials');
    }
};
