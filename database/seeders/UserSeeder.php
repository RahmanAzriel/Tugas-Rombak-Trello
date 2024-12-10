<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'kepsek',
            'email' => 'kepsek@gmail.com',
            'password' => bcrypt('kepsek'),
            'role' => 'kepsek',
            'nip' => 1234567890,
            'jabatan' => 'kepsek',
            'mapel' => 'PROD'
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'nip' => 1234567891,
            'jabatan' => 'admin',
            'mapel' => 'PROD'
        ]);
    }
}
