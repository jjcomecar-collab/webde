<?php
// database/migrations/xxxx_xx_xx_create_squares_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tablesquares', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('icon')->nullable();        // bi bi-activity
            $table->string('color_class');              // item-cyan, item-orange
            $table->string('url');
            $table->integer('aos_delay')->default(100);

            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tablesquares');
    }
};
