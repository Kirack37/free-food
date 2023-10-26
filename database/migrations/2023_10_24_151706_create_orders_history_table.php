<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('orders_history')) {
            Schema::create('orders_history', function (Blueprint $table) {
                $table->id();
                $table->integer('finished')->default(0);
                $table->integer('quantity')->default(1); //mejora futura
                $table->foreignId('recipe_id');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_recipes');
    }
};
