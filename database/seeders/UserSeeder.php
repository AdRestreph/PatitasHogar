<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    public function run(): void
    {

        User::create([
            'name'=>'Administrador',
            'email'=>'admin@test.com',
            'password'=>Hash::make('123456'),
            'role'=>'admin'
        ]);


        User::create([
            'name'=>'Voluntario',
            'email'=>'volunteer@test.com',
            'password'=>Hash::make('123456'),
            'role'=>'volunteer'
        ]);


        User::create([
            'name'=>'Adoptante',
            'email'=>'adopter@test.com',
            'password'=>Hash::make('123456'),
            'role'=>'adopter'
        ]);

    }
}