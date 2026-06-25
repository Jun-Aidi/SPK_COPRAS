<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Seed data tanpa UserSeeder.
     */
    public function run(): void
    {
        $this->call([
            KriteriaSeeder::class,
            SubKriteriaSeeder::class,
            AlternatifSeeder::class,
            NilaiAlternatifSeeder::class,
        ]);
    }
}
