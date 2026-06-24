<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat user admin
        DB::table('users')->insert([
            'nama_lengkap'          => 'Ilham Fahrezi',
            'username'              => 'rezi',
            'email'                 => 'ilham@gmail.com',
            'password'              => Hash::make('ilhamCop'),
            'role'                  => 'admin',
            'status'                => 'Active',
            'reset_pass_token'      => null,
            'reset_pass_token_expiry' => null,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);

        DB::table('users')->insert([
            'nama_lengkap'          => 'Rayner Aditya',
            'username'              => 'rayner',
            'email'                 => 'rayner@gmail.com',
            'password'              => Hash::make('raynerCop'),
            'role'                  => 'admin',
            'status'                => 'Active',
            'reset_pass_token'      => null,
            'reset_pass_token_expiry' => null,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);

        DB::table('users')->insert([
            'nama_lengkap'          => 'Anjuan Kaisar',
            'username'              => 'anjuan',
            'email'                 => 'anjuan@gmail.com',
            'password'              => Hash::make('anjuanCop'),
            'role'                  => 'admin',
            'status'                => 'Active',
            'reset_pass_token'      => null,
            'reset_pass_token_expiry' => null,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);

        // Membuat user biasa
        DB::table('users')->insert([
            'nama_lengkap'          => 'Pengguna Biasa',
            'username'              => 'user',
            'email'                 => 'user@gmail.com',
            'password'              => Hash::make('password'),
            'role'                  => 'user',
            'status'                => 'Active',
            'reset_pass_token'      => null,
            'reset_pass_token_expiry' => null,
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);
    }
}
