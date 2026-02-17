<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UbicacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('ubicacions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            

        DB::table('ubicacions')->insert(///fijo
            ['name' => 'Informatica','abrev' => 'INF'], 
        );
        DB::table('ubicacions')->insert(///fijo
            ['name' => 'Tesoreria','abrev' => 'MAT'], 
        );
        DB::table('ubicacions')->insert(///fijo
            ['name' => 'Administracion','abrev' => ''], 
        );
        DB::table('ubicacions')->insert(///fijo
            ['name' => 'Contro de Estudio','abrev' => ''], 
        );
        DB::table('ubicacions')->insert(///fijo
            ['name' => 'Almacen','abrev' => ''], 
        );
        DB::table('ubicacions')->insert(///fijo
            ['name' => 'Biologia','abrev' => ''], 
        );
    }
}
