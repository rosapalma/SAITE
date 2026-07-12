<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Str, Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('users')->insert(///fijo
        [
            'responsable_id'=>1, //adminis
            'email'=>'virginia.palma.ipm@upel.edu.ve',
            'password' => Hash::make('17708149'),
            'privilege' => 1], 
        );
    //     DB::table('users')->insert(///fijo
    //     [
    //         'responsable_id'=>2, //gestor
    //         'email'=>'carlo@ca',
    //         'password' => Hash::make('17708149'),
    //         'privilege' => 2], 
    //     );
    //     DB::table('users')->insert(///fijo
    //     [
    //         'responsable_id'=>3, //tecnico
    //         'email'=>'belkis@be',
    //         'password' => Hash::make('17708149'),
    //         'privilege' => 3], 
    //     );
    //        DB::table('users')->insert(///fijo
    //     [
    //         'responsable_id'=>4,
    //         'email'=>'uri@ur',
    //         'password' => Hash::make('17708149'),
    //         'privilege' => 4], 
    //     );
    }
}
