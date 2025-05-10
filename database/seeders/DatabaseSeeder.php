<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('admin')
        ]);

        User::create([
            'name' => 'petugas',
            'email' => 'petugas@gmail.com',
            'role' => 'petugas',
            'password' => bcrypt('petugas')
        ]);

        User::create([
            'name' => 'mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'role' => 'mahasiswa',
            'password' => bcrypt('mahasiswa')
        ]);
    }
}
