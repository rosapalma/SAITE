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
        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('users')->truncate();
        //DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('users')->insert(///fijo
        [
            'personal_id'=>1,
            'cedula'=>17708149,
            'password' => Hash::make('17708149'),
            'privilege' => 1], 
        );
    }
}
