<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


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
            
        // DB::table('equipos')->insert(
        //     [
        //     'serial_BN' =>123,
        //     'serial'=>1111,
        //     'marca' => 'LENOVO',
        //     'modelo'=> 'HORIZONTAL',
        //     'ubicacion_id'=> 1,
        //     'tipo_id'=>1,
        //     'estado'=>'OPERATIVO',
        //     'fecha_adq'=>now(),   
        //     ],
        //     );
        // DB::table('equipos')->insert(
        //     [
        //     'serial_BN' =>1234,
        //     'serial'=>2222,
        //     'marca' => 'HP',
        //     'modelo'=> 'PLANO',
        //     'ubicacion_id'=> 1,
        //     'tipo_id'=>2,
        //     'estado'=>'OPERATIVO',
        //     'fecha_adq'=>now(),   
        //     ],
        //     );
    }
}
