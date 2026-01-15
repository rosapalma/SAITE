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
            
        DB::table('equipos')->insert(///fijo
        [
            'marca'=>'HP',
            'modelo' => 'COMPUTADOLA',
            'bienes' => 000123], 
        );
    }
}
