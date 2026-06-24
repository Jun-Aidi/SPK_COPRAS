<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Show login page
     * 
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login request
     * 
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        // Additional validation for login format
        $request->validateLogin();

        // Get sanitized credentials
        $credentials = $request->getCredentials();
        $loginField = $request->input('login');
        $password = $request->input('password');

        // Find user based on login type
        $user = null;
        if ($request->isEmail()) {
            $user = User::where('email', $loginField)->first();
        } else {
            $user = User::where('username', $loginField)->first();
        }

        $errors = [];
        $userExists = false;
        $isActive = false;
        $passwordCorrect = false;

        // Check user existence and credentials
        if ($user) {
            $userExists = true;

            // Check if account is active
            if (!$user->isActive()) {
                // Store user email/username in session for resend verification
                $request->session()->put('unverified_user', $loginField);

                // Create error message with resend verification link
                $resendUrl = route('verification.resend');
                $errors['login'] = 'Akun Anda belum diaktivasi. <a href="' . $resendUrl . '" class="text-[#007BFF] hover:text-[#0000EE] underline font-semibold">Kirim ulang email verifikasi</a>';
            } else {
                $isActive = true;

                // Check password
                if (!Hash::check($password, $user->password)) {
                    $errors['login'] = 'Email/username atau password salah.';
                } else {
                    $passwordCorrect = true;
                }
            }
        } else {
            // Generic error for username/email not found
            $errors['login'] = 'Email/username atau password salah.';
        }

        // If there are errors, throw validation exception
        if (!empty($errors)) {
            // Log failed login attempt
            Log::info('Failed login attempt', [
                'ip' => $request->ip(),
                'login_field' => $loginField,
                'user_exists' => $userExists,
                'is_active' => $isActive,
                'password_correct' => $passwordCorrect,
                'user_agent' => $request->userAgent(),
                'timestamp' => now(),
            ]);

            throw ValidationException::withMessages($errors);
        }

        // Attempt login
        if (Auth::attempt($credentials)) {
            // Regenerate session for security
            $request->session()->regenerate();

            // Log successful login
            Log::info('Successful login', [
                'user_id' => Auth::id(),
                'email' => Auth::user()->email,
                'username' => Auth::user()->username,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'timestamp' => now(),
            ]);

            return redirect()->intended('dashboard');
        }

        // Fallback error - this should rarely happen due to our checks above
        Log::error('Unexpected login failure', [
            'ip' => $request->ip(),
            'login_field' => $loginField,
            'user_agent' => $request->userAgent(),
            'timestamp' => now(),
        ]);

        throw ValidationException::withMessages([
            'login' => 'Login gagal, silakan coba lagi',
            'password' => 'Login gagal, silakan coba lagi',
        ]);
    }

    /**
     * Handle logout request
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        $user = Auth::user();

        // Log logout
        if ($user) {
            Log::info('User logout', [
                'user_id' => $user->id_user,
                'email' => $user->email,
                'username' => $user->username,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'timestamp' => now(),
            ]);
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
