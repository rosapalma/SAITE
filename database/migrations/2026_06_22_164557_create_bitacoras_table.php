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
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('soli_servicios_id');
            $table->unsignedBigInteger('responsable_id');
            $table->string('solucion')->nullable();
            $table->string('diagnostico')->nullable();
            $table->string('recomendacion')->nullable();
            $table->string('prioridad')->nullable();
            $table->date('fecha')->nullable();
            $table->timestamps();

            $table->foreign('soli_servicios_id')->references('id')->on('soli_servicios');
            $table->foreign('responsable_id')->references('id')->on('responsables'); // tecnico 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bitacoras');
    }
};
