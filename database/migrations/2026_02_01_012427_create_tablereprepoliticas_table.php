<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tablereprepoliticas', function (Blueprint $table) {
            $table->id();

            $table->string('page_title');
            $table->string('image')->nullable();

            $table->string('inner_title');
            $table->string('year')->nullable();
            $table->string('story_title');

            $table->text('description');
            $table->json('list_items')->nullable();
            $table->text('final_text')->nullable();

            $table->string('video_url')->nullable();

            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tablereprepoliticas');
    }
};
