<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SeederController extends Controller
{
    /**
     * Run all database seeders.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function run()
    {
        try {
            Artisan::call('db:seed', ['--force' => true]);
            $output = Artisan::output();

            return redirect()->route('dashboard')->with('success', 'Seluruh data seeder berhasil dimasukkan ke database!');
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'Gagal menjalankan seeder: ' . $e->getMessage());
        }
    }
}
