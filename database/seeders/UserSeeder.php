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
        DB::table('users')->updateOrInsert(
            ['email' => 'ilham@gmail.com'],
            [
                'nama_lengkap'            => 'Ilham Fahrezi',
                'username'                => 'rezi',
                'password'                => Hash::make('ilhamCop'),
                'role'                    => 'admin',
                'status'                  => 'Active',
                'reset_pass_token'        => null,
                'reset_pass_token_expiry' => null,
                'created_at'              => now(),
                'updated_at'              => now(),
            ]
        );

        DB::table('users')->updateOrInsert(
            ['email' => 'rayner@gmail.com'],
            [
                'nama_lengkap'            => 'Rayner Aditya',
                'username'                => 'rayner',
                'password'                => Hash::make('raynerCop'),
                'role'                    => 'admin',
                'status'                  => 'Active',
                'reset_pass_token'        => null,
                'reset_pass_token_expiry' => null,
                'created_at'              => now(),
                'updated_at'              => now(),
            ]
        );

        DB::table('users')->updateOrInsert(
            ['email' => 'anjuan@gmail.com'],
            [
                'nama_lengkap'            => 'Anjuan Kaisar',
                'username'                => 'anjuan',
                'password'                => Hash::make('anjuanCop'),
                'role'                    => 'admin',
                'status'                  => 'Active',
                'reset_pass_token'        => null,
                'reset_pass_token_expiry' => null,
                'created_at'              => now(),
                'updated_at'              => now(),
            ]
        );

        // Membuat user biasa
        DB::table('users')->updateOrInsert(
            ['email' => 'user@gmail.com'],
            [
                'nama_lengkap'            => 'Pengguna Biasa',
                'username'                => 'user',
                'password'                => Hash::make('password'),
                'role'                    => 'user',
                'status'                  => 'Active',
                'reset_pass_token'        => null,
                'reset_pass_token_expiry' => null,
                'created_at'              => now(),
                'updated_at'              => now(),
            ]
        );
    }
}
