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
        if (!Schema::hasTable('historial_recetas')) {
            Schema::create('historial_recetas', function (Blueprint $table) {
                $table->id();
                $table->integer('realizado')->default(0);
                $table->integer('cantidad')->default(1); //mejora futura
                $table->foreignId('receta_id');
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
        Schema::dropIfExists('historial_recetas');
    }
};
