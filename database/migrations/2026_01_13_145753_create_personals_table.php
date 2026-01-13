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
        Schema::create('personals', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->integer('cedula')->unique();
            $table->string('full_name')->nullable();
           // $table->string('email')->nullable();          
            $table->unsignedBigInteger('departamento_id')->nullable(); //dpto
            //$table->unsignedBigInteger('sede_id')->nullable();
            $table->timestamps();

            $table->foreign('departamento_id')->references('id')->on('departamentos');
           // $table->foreign('sede_id')->references('id')->on('sedes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};
