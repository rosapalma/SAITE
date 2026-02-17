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
            $table->integer('cedula')->unique();
            $table->string('full_name');
            $table->string('email');      
            $table->unsignedBigInteger('departamento_id')->nullable(); //no tiene importancia la relacion
            // DEPENDENCIA 
            $table->unsignedBigInteger('ubicacion_id'); 
            $table->timestamps();

            $table->foreign('ubicacion_id')->references('id')->on('ubicacions');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
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
