<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — SPK COPRAS</title>
    <meta name="description" content="Masuk ke SPK COPRAS - Sistem Pendukung Keputusan COPRAS">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/montserrat.css') }}">
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">
    <style>
        :root {
            --navy:  #071E3D;
            --teal:  #278EA5;
            --cyan:  #21E6C1;
            --bg:    #F0F4F8;
            --border:#E2E8F0;
            --text:  #1E293B;
            --muted: #64748B;
        }
        * { font-family: 'Montserrat', sans-serif; box-sizing: border-box; margin: 0; padding: 0; }

        body { min-height: 100vh; background: #F5F0E8; }

        /* form-input / form-label reuse the same definition as layouts/app.blade.php */
        .form-input {
            width: 100%;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 10px 14px;
            color: var(--text);
            font-size: 0.85rem;
            font-family: 'Montserrat', sans-serif;
            transition: all 0.18s;
            outline: none;
        }
        .form-input:focus {
            border-color: var(--teal);
            box-shadow: 0 0 0 3px rgba(39,142,165,0.12);
        }
        .form-input.is-invalid { border-color: #EF4444; }
        .form-input::placeholder { color: #94A3B8; }

        .form-label {
            display: block;
            font-size: 0.72rem;
            font-weight: 700;
            color: var(--muted);
            letter-spacing: 0.05em;
            margin-bottom: 6px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 10px 22px;
            border-radius: 8px;
            font-weight: 800;
            font-size: 0.85rem;
            background: linear-gradient(135deg, var(--teal), var(--cyan));
            color: #fff;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(39,142,165,0.35);
        }
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 10px 22px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.85rem;
            background: #fff;
            color: var(--teal);
            border: 1px solid rgba(39,142,165,0.35);
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }
        .btn-secondary:hover { background: #EEF9F7; border-color: var(--teal); }

        /* image panel */
        .image-panel {
            background-image: url('{{ asset("images/auth_bg_forest.png") }}');
            background-size: cover;
            background-position: center;
        }
        .image-panel::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(7,30,61,0.35) 0%, rgba(0,0,0,0.1) 100%);
            border-radius: 0 20px 20px 0;
        }
        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #94A3B8;
            font-size: 0.82rem;
            padding: 4px;
            transition: color 0.15s;
        }
        .toggle-password:hover { color: var(--teal); }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp 0.35s ease both; }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-6">

    <div class="fade-up flex w-full max-w-4xl min-h-[540px] rounded-2xl overflow-hidden shadow-2xl bg-white">

        {{-- ── Left: Form Panel ── --}}
        <div class="w-full md:w-[45%] flex flex-col justify-center px-10 py-12 bg-white">

            {{-- Brand --}}
            <div class="flex items-center gap-3 mb-8">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0"
                     style="background:linear-gradient(135deg,var(--teal),var(--cyan));">
                    <i class="fas fa-database text-white text-sm"></i>
                </div>
                <span class="font-black text-lg" style="color:var(--navy);">SPK <span style="color:var(--teal);">COPRAS</span></span>
            </div>

            {{-- Heading --}}
            <h1 class="text-3xl font-black mb-1" style="color:var(--navy);">Welcome Back!</h1>
            <p class="text-sm mb-7" style="color:var(--muted);">Please log in to your account.</p>

            {{-- Flash Messages --}}
            @if(session('success'))
            <div class="flex items-center gap-2 rounded-lg px-4 py-3 mb-5 text-sm font-semibold"
                 style="background:#ECFDF5; border:1px solid #A7F3D0; color:#059669;">
                <i class="fas fa-circle-check"></i>
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="flex items-center gap-2 rounded-lg px-4 py-3 mb-5 text-sm font-semibold"
                 style="background:#FFF5F5; border:1px solid #FECACA; color:#EF4444;">
                <i class="fas fa-exclamation-circle"></i>
                {{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                {{-- Email / Username --}}
                <div>
                    <label class="form-label" for="login">EMAIL ADDRESS</label>
                    <div class="relative">
                        <input id="login" type="text" name="login"
                               value="{{ old('login') }}"
                               class="form-input {{ $errors->has('login') ? 'is-invalid' : '' }}"
                               placeholder="Masukkan email atau username" autofocus required>
                    </div>
                    @error('login')
                    <p class="mt-1 text-xs font-semibold flex items-center gap-1" style="color:#EF4444;">
                        <i class="fas fa-circle-exclamation"></i> {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label class="form-label" for="password">PASSWORD</label>
                    <div class="relative">
                        <input id="password" type="password" name="password"
                               class="form-input {{ $errors->has('password') ? 'is-invalid' : '' }}"
                               placeholder="Masukkan password" required>
                        <button type="button" class="toggle-password" onclick="togglePassword('password', this)">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                    <p class="mt-1 text-xs font-semibold flex items-center gap-1" style="color:#EF4444;">
                        <i class="fas fa-circle-exclamation"></i> {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- Remember + Forgot --}}
                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2 text-xs cursor-pointer" style="color:var(--muted);">
                        <input type="checkbox" name="remember" class="w-3.5 h-3.5 accent-teal-500">
                        Remember me
                    </label>
                    <a href="#" class="text-xs font-bold" style="color:#EF4444;">Forgot password?</a>
                </div>

                {{-- Buttons --}}
                <div class="flex gap-3 pt-1">
                    <button type="submit" id="btn-login" class="btn-primary flex-1">
                        Login
                    </button>
                    <a href="{{ route('register') }}" class="btn-secondary flex-1">
                        Create account
                    </a>
                </div>
            </form>

            <p class="mt-6 text-xs leading-relaxed" style="color:#B0BEC5;">
                By signing in you agree to our <a href="#" style="color:var(--teal);">terms</a> and that you have read our <a href="#" style="color:var(--teal);">data policy</a>.
            </p>
        </div>

        {{-- ── Right: Image Panel ── --}}
        <div class="hidden md:block relative flex-1 rounded-r-2xl image-panel"></div>

    </div>

    <script>
        function togglePassword(id, btn) {
            const input = document.getElementById(id);
            const icon  = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'fas fa-eye-slash';
            } else {
                input.type = 'password';
                icon.className = 'fas fa-eye';
            }
        }
    </script>
</body>
</html>