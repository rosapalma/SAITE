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
            'marca'=>'COMPUTADORA HP',
            'serial'=>'111111',
            'serial_BN' => '000111', 
            'estado'=>'ASIG'], // asignada
        );
        DB::table('equipos')->insert(
        [
            'marca'=>'MOUSE GENIU',
            'serial'=>'111112',
            'serial_BN' => '000122', 
            'estado'=>'STOP'], //stop
        );
        DB::table('equipos')->insert(
        [
            'marca'=>'IMPRESORA EPSON',
            'serial'=>'111113',
            'serial_BN' => '000133', 
            'estado'=>'DESIN'], //desincorporado
        );
    }
}
