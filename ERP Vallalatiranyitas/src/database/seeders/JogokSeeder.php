<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Jogok;

class JogokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role::factory()->times(10)->create();

        DB::table('jogoks')->insert([
            'name' => 'Admin'
        ]);
        DB::table('jogoks')->insert([
            'name' => 'Vezető'
        ]);
        DB::table('jogoks')->insert([
            'name' => 'Projekt Manager'
        ]);
        DB::table('jogoks')->insert([
            'name' => 'Ügyvitel'
        ]);
        DB::table('jogoks')->insert([
            'name' => 'Művezető'
        ]);
        DB::table('jogoks')->insert([
            'name' => 'Munkás'
        ]);
        DB::table('jogoks')->insert([
            'name' => 'Alvállalkozók'
        ]);
    }
}
