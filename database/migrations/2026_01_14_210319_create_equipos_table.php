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
        Schema::create('equipos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('tipo')->nullable();
            $table->string('marca_modelo')->nullable();
            $table->string('serial')->nullable();
            $table->string('serial_BN')->nullable();
            $table->unsignedBigInteger('ubicacion_id')->nullable();
            $table->unsignedBigInteger('responsable_id')->nullable(); 
            $table->string('estado')->nullable(); 
            // ASIG - asignado, STOP disponible - DESIN desincorporado
            $table->date('fecha_asig')->nullable();
            $table->date('fecha_adq')->nullable();
            $table->timestamps();

            $table->foreign('ubicacion_id')->references('id')->on('ubicacions');

            $table->foreign('responsable_id')->references('id')->on('responsables');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
