<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResponsableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('responsables')->truncate();
        //DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            

        DB::table('responsables')->insert(
            ['personal_id' => 1,'equipo_id' => 1,'fecha_asig'=>'2014-05-05'],
        );
        DB::table('responsables')->insert(
            ['personal_id' => 1,'equipo_id' => 2,'fecha_asig'=>'2014-05-06'],
        );


    }
}
