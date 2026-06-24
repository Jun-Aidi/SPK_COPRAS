<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     */
    public function register(RegisterRequest $request)
    {
        // Get validated data
        $validatedData = $request->validated();

        // Create user with Active status directly (no email verification)
        User::create([
            'nama_lengkap' => $validatedData['nama_lengkap'],
            'username'     => $validatedData['username'],
            'email'        => $validatedData['email'],
            'password'     => Hash::make($validatedData['password']),
            'role'         => 'user',
            'status'       => 'Active',
        ]);

        Log::info('New user registered', [
            'email'     => $validatedData['email'],
            'username'  => $validatedData['username'],
            'timestamp' => now(),
        ]);

        return redirect()->route('login')
            ->with('success', 'Pendaftaran berhasil! Silakan login dengan akun Anda.');
    }
}

