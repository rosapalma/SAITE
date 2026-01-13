<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('personals')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            
        DB::table('personals')->insert(///fijo
        [
            'cedula'=>17708149,
            'full_name' => 'ROSA VIRGINIA PALMA BRAVO',
            'departamento_id' => 1], 
        );
      
    }
}
