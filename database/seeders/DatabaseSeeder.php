<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'destaw',
            'email' => 'destaw@gmail.com',
            'password' => bcrypt('destaw'),
            'role' => 'admin',
       ]);

       User::create([
        'name' => 'petugas',
        'email' => 'petugas@gmail.com',
        'password' => bcrypt('petugas'),
        'role' => 'petugas',
   ]);
    }
}
