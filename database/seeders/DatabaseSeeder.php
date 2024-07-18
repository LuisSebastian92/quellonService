<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        \App\Models\User::factory()->create([
           'name' => 'Ricardo',
            'email' => 'hola@gmail.com',
            'password' => Hash::make('Hola123'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Luis Vera',
             'email' => 'sebastian.vera.moll@gmail.com',
             'password' => Hash::make('Enemyofgod1230'),
         ]);
    }
}
