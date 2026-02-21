<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('tipos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            

        DB::table('tipos')->insert(///fijo
            ['name' => 'PC'], 
        );
        DB::table('tipos')->insert(///fijo
            ['name' => 'MONITOR'], 
        );
        DB::table('tipos')->insert(///fijo
            ['name' => 'REGULADOR'], 
        );
    }
}
