<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class SeederController extends Controller
{
    /**
     * Run data seeders (tanpa UserSeeder).
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function run()
    {
        try {
            Artisan::call('db:seed', [
                '--class' => 'DataSeeder',
                '--force' => true,
            ]);

            return redirect()->route('dashboard')->with('success', 'Data seeder berhasil dimasukkan ke database (User tidak diubah)!');
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'Gagal menjalankan seeder: ' . $e->getMessage());
        }
    }

    /**
     * Hapus semua data kecuali tabel users.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clearData()
    {
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('nilai_alternatifs')->truncate();
            DB::table('alternatifs')->truncate();
            DB::table('sub_kriterias')->truncate();
            DB::table('kriterias')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            return redirect()->route('dashboard')->with('success', 'Seluruh data berhasil dihapus (data user tetap aman)!');
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
