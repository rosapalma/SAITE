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
            'tipo_id'=>1,
            'marca'=>'HP',
            'modelo'=>'HORIZONTAL',
            'serial'=>'111111',
            'serial_BN' => '000111',
            'responsable_id'=>1, // asignada
            'ubicacion_id'=>1,
            'fecha_adq'=>'2014-05-05',
            'fecha_asig'=>'2026-01-01',
            'estado'=>'MANT'], //fecha ultima de adsignacion
        
            
        );
        DB::table('equipos')->insert(
        [
            'tipo_id'=>3,
            'marca'=>'FORZA',
            'modelo'=>'REGULADOR',
            'ubicacion_id'=>1,
            'fecha_adq'=>'2014-05-05',
            'serial'=>'111112',
            'serial_BN' => '000122',
            'estado'=>'OPR'], //stop
        );
        DB::table('equipos')->insert(
        [
            'tipo_id'=>1,
            'marca'=>'lenovo',
            'modelo'=>'PC',
            'fecha_adq'=>'2014-05-05',
            'ubicacion_id'=>5,
            'serial'=>'111113',
            'serial_BN' => '000133', 
            'estado'=>'DESIN',],
        );
    }
}
