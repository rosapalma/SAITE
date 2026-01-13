<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('departamentos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            

        DB::table('departamentos')->insert(///fijo
            ['name' => 'Informatica','abrev' => 'INF'], 
        );
        DB::table('departamentos')->insert(///fijo
            ['name' => 'Matematica','abrev' => 'MAT'], 
        );
    }
}
