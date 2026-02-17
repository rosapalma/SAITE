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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('responsables')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            

        DB::table('responsables')->insert(
            ['cedula'=>17708149,
            'full_name' => 'ROSA VIRGINIA PALMA BRAVO',
            'email'=> 'virginia.palma.ipm@upel.edu.ve',
            'departamento_id' => 1,
            'ubicacion_id'=>1], 
            );


    }
}
