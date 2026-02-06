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
        Schema::create('responsables', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personal_id');
            $table->unsignedBigInteger('equipo_id')->unique();
            $table->date('fecha_asig')->nullable();
            $table->timestamps();

            $table->foreign('personal_id')->references('id')->on('personals');
            $table->foreign('equipo_id')->references('id')->on('equipos');
      });
    }

    /**
     * Reverse tequipotions.
     */
    public function down(): void
    {
        Schema::dropIfExists('responsables');
    }
};
