<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('equipos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            
        DB::table('equipos')->insert(
        [
            'marca'=>'HP',
            'modelo' => 'COMPUTADOLA',
            'serial'=>'111111',
            'serial_bienes' => '000111', 
            'tipo'=>1], // equipo
        );
        DB::table('equipos')->insert(
        [
            'marca'=>'GENIU',
            'modelo' => 'MOUSE',
            'serial'=>'111112',
            'serial_bienes' => '000122', 
            'tipo'=>2], //periferico
        );
        DB::table('equipos')->insert(
        [
            'marca'=>'EPSON',
            'modelo' => 'IMPRESORA',
            'serial'=>'111113',
            'serial_bienes' => '000133', 
            'tipo'=>3], //COMPONENTE
        );
    }
}
