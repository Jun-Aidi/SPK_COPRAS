<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — SPK COPRAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/montserrat.css') }}">
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">
    <style>
        * { font-family: 'Montserrat', sans-serif; box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            background: #F0F4F8;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-wrapper {
            display: flex;
            width: 100%;
            max-width: 900px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            min-height: 540px;
        }

        /* Left panel */
        .login-panel-left {
            width: 44%;
            background: linear-gradient(160deg, #071E3D 0%, #1F4287 55%, #278EA5 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 48px 36px;
            text-align: center;
        }
        .login-brand-icon {
            width: 60px; height: 60px;
            border-radius: 16px;
            background: rgba(33,230,193,0.2);
            border: 2px solid rgba(33,230,193,0.35);
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 20px;
        }
        .login-brand-icon i { font-size: 1.5rem; color: #21E6C1; }
        .login-brand-title {
            font-size: 1.6rem;
            font-weight: 900;
            color: #fff;
            line-height: 1.2;
        }
        .login-brand-title span { color: #21E6C1; }
        .login-brand-sub {
            margin-top: 10px;
            font-size: 0.8rem;
            color: rgba(255,255,255,0.55);
            font-weight: 500;
            line-height: 1.5;
        }

        /* Right panel */
        .login-panel-right {
            flex: 1;
            padding: 48px 44px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login-heading {
            font-size: 1.4rem;
            font-weight: 900;
            color: #071E3D;
            margin-bottom: 6px;
        }
        .login-subheading {
            font-size: 0.8rem;
            color: #64748B;
            margin-bottom: 28px;
        }

        .form-group { margin-bottom: 18px; }
        .form-label {
            display: block;
            font-size: 0.78rem;
            font-weight: 700;
            color: #1E293B;
            margin-bottom: 6px;
        }
        .input-wrapper { position: relative; }
        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94A3B8;
            font-size: 0.82rem;
            width: 16px;
            text-align: center;
        }
        .form-input {
            width: 100%;
            background: #F8FAFC;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            padding: 11px 14px 11px 40px;
            color: #1E293B;
            font-size: 0.85rem;
            font-family: 'Montserrat', sans-serif;
            transition: all 0.18s;
            outline: none;
        }
        .form-input:focus {
            border-color: #278EA5;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(39,142,165,0.12);
        }
        .form-input.is-invalid { border-color: #EF4444; }
        .form-input::placeholder { color: #94A3B8; }

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
        .toggle-password:hover { color: #278EA5; }

        .error-text {
            font-size: 0.75rem;
            color: #EF4444;
            font-weight: 600;
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            background: linear-gradient(135deg, #278EA5, #21E6C1);
            color: #fff;
            font-weight: 800;
            font-size: 0.88rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 6px;
            letter-spacing: 0.02em;
        }
        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(39,142,165,0.35);
        }

        .login-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.8rem;
            color: #64748B;
        }
        .login-footer a {
            color: #278EA5;
            font-weight: 700;
            text-decoration: none;
        }
        .login-footer a:hover { color: #21E6C1; }

        .alert-error {
            background: #FFF5F5;
            border: 1px solid #FECACA;
            color: #EF4444;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <!-- Left Brand Panel -->
        <div class="login-panel-left">
            <div class="login-brand-icon">
                <i class="fas fa-database"></i>
            </div>
            <div class="login-brand-title">SPK <span>COPRAS</span></div>
            <p class="login-brand-sub">Sistem Pendukung Keputusan menggunakan metode Complex Proportional Assessment</p>
        </div>

        <!-- Right Form Panel -->
        <div class="login-panel-right">
            <h1 class="login-heading">Selamat Datang</h1>
            <p class="login-subheading">Masuk ke akun Anda untuk melanjutkan</p>

            @if($errors->any())
            <div class="alert-error">
                <i class="fas fa-exclamation-circle"></i>
                {{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="login">Email / Username</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user input-icon"></i>
                        <input id="login" type="text" name="login"
                               value="{{ old('login') }}"
                               class="form-input {{ $errors->has('login') ? 'is-invalid' : '' }}"
                               placeholder="Masukkan email atau username" autofocus required>
                    </div>
                    @error('login')
                    <p class="error-text"><i class="fas fa-circle-exclamation"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input id="password" type="password" name="password"
                               class="form-input {{ $errors->has('password') ? 'is-invalid' : '' }}"
                               placeholder="Masukkan password" required>
                        <button type="button" class="toggle-password" onclick="togglePassword('password', this)">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                    <p class="error-text"><i class="fas fa-circle-exclamation"></i> {{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-right-to-bracket mr-2"></i> Masuk
                </button>
            </form>

            <div class="login-footer">
                Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(id, btn) {
            const input = document.getElementById(id);
            const icon = btn.querySelector('i');
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