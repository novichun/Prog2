<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jogok;
use App\Models\User;


class JogokUserSeeder extends Seeder
{
   
    public function run()
    {
        $roles = Jogok::all();

        User::all()->each(function ($user) use ($roles){

            $user->jogoks()->attach(
                $roles->random(1)->pluck('id')
            );
        });
    }
}
