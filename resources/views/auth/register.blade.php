<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar — SPK COPRAS</title>
    <meta name="description" content="Buat akun baru di SPK COPRAS - Sistem Pendukung Keputusan COPRAS">
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

        body { height: 100vh; overflow: hidden; }

        /* Reuse same form-input / form-label as layouts/app.blade.php */
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

        .image-panel {
            background-image: url('{{ asset("images/auth_bg.png") }}');
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

        /* password strength */
        .pwd-bar { height: 3px; border-radius: 99px; background: var(--border); transition: background 0.3s; }

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
            from { opacity: 0; }
            to   { opacity: 1; }
        }
        .fade-up { animation: fadeUp 0.3s ease both; }
    </style>
</head>
<body class="flex h-screen overflow-hidden">

    <div class="fade-up flex w-full h-full bg-white">

        {{-- ── Left: Form Panel ── --}}
        <div class="w-full md:w-[55%] flex flex-col justify-center px-14 py-10 bg-white overflow-y-auto">

            {{-- Brand --}}
            <div class="flex items-center gap-3 mb-6">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0"
                     style="background:linear-gradient(135deg,var(--teal),var(--cyan));">
                    <i class="fas fa-database text-white text-sm"></i>
                </div>
                <span class="font-black text-lg" style="color:var(--navy);">SPK <span style="color:var(--teal);">COPRAS</span></span>
            </div>

            {{-- Heading --}}
            <h1 class="text-2xl font-black mb-1" style="color:var(--navy);">Create Account</h1>
            <p class="text-sm mb-5" style="color:var(--muted);">Fill in the form below to register.</p>

            {{-- ── Kriteria Box ── --}}
            <div class="rounded-xl px-4 py-3 mb-5" style="background:#EFF8FF; border:1px solid rgba(39,142,165,0.25);">
                <p class="text-xs font-extrabold mb-2 flex items-center gap-1.5" style="color:var(--teal); letter-spacing:0.05em;">
                    <i class="fas fa-shield-halved"></i> KETENTUAN PEMBUATAN AKUN
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-1.5">
                    <div class="flex items-start gap-1.5 text-xs" style="color:var(--muted);">
                        <i class="fas fa-circle-check mt-0.5 flex-shrink-0" style="color:var(--teal); font-size:0.62rem;"></i>
                        <span>Nama: hanya huruf & spasi (min. 2 karakter)</span>
                    </div>
                    <div class="flex items-start gap-1.5 text-xs" style="color:var(--muted);">
                        <i class="fas fa-circle-check mt-0.5 flex-shrink-0" style="color:var(--teal); font-size:0.62rem;"></i>
                        <span>Username: huruf, angka, underscore (min. 3 karakter)</span>
                    </div>
                    <div class="flex items-start gap-1.5 text-xs" style="color:var(--muted);">
                        <i class="fas fa-circle-check mt-0.5 flex-shrink-0" style="color:var(--teal); font-size:0.62rem;"></i>
                        <span>Email: harus menggunakan domain @gmail.com</span>
                    </div>
                    <div class="flex items-start gap-1.5 text-xs" style="color:var(--muted);">
                        <i class="fas fa-circle-check mt-0.5 flex-shrink-0" style="color:var(--teal); font-size:0.62rem;"></i>
                        <span>Password: min. 8 karakter, huruf besar, kecil & angka</span>
                    </div>
                </div>
            </div>

            {{-- Error --}}
            @if($errors->any())
            <div class="flex items-center gap-2 rounded-lg px-4 py-3 mb-4 text-sm font-semibold"
                 style="background:#FFF5F5; border:1px solid #FECACA; color:#EF4444;">
                <i class="fas fa-exclamation-circle"></i>
                {{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf

                {{-- Grid 2 col --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-3">

                    {{-- Nama Lengkap --}}
                    <div>
                        <label class="form-label" for="nama_lengkap">NAMA LENGKAP</label>
                        <input id="nama_lengkap" type="text" name="nama_lengkap"
                               value="{{ old('nama_lengkap') }}"
                               class="form-input {{ $errors->has('nama_lengkap') ? 'is-invalid' : '' }}"
                               placeholder="Nama lengkap Anda" autofocus required>
                        @error('nama_lengkap')
                        <p class="mt-1 text-xs font-semibold flex items-center gap-1" style="color:#EF4444;">
                            <i class="fas fa-circle-exclamation"></i> {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Username --}}
                    <div>
                        <label class="form-label" for="username">USERNAME</label>
                        <input id="username" type="text" name="username"
                               value="{{ old('username') }}"
                               class="form-input {{ $errors->has('username') ? 'is-invalid' : '' }}"
                               placeholder="Pilih username unik" required>
                        @error('username')
                        <p class="mt-1 text-xs font-semibold flex items-center gap-1" style="color:#EF4444;">
                            <i class="fas fa-circle-exclamation"></i> {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Email (full width) --}}
                    <div class="md:col-span-2">
                        <label class="form-label" for="email">EMAIL ADDRESS</label>
                        <input id="email" type="email" name="email"
                               value="{{ old('email') }}"
                               class="form-input {{ $errors->has('email') ? 'is-invalid' : '' }}"
                               placeholder="nama@gmail.com" required>
                        @error('email')
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
                                   placeholder="Min. 8 karakter" required
                                   oninput="checkStrength(this.value)">
                            <button type="button" class="toggle-password" onclick="togglePassword('password', this)">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        {{-- Strength bar --}}
                        <div class="flex gap-1 mt-1.5">
                            <div class="pwd-bar flex-1" id="bar1"></div>
                            <div class="pwd-bar flex-1" id="bar2"></div>
                            <div class="pwd-bar flex-1" id="bar3"></div>
                            <div class="pwd-bar flex-1" id="bar4"></div>
                        </div>
                        <p class="text-xs mt-1" id="pwdHint" style="color:#94A3B8;">Masukkan password</p>
                        @error('password')
                        <p class="mt-1 text-xs font-semibold flex items-center gap-1" style="color:#EF4444;">
                            <i class="fas fa-circle-exclamation"></i> {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div>
                        <label class="form-label" for="password_confirmation">KONFIRMASI PASSWORD</label>
                        <div class="relative">
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                   class="form-input"
                                   placeholder="Ulangi password" required
                                   oninput="checkConfirm(this.value)">
                            <button type="button" class="toggle-password" onclick="togglePassword('password_confirmation', this)">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <p class="text-xs mt-1" id="confirmHint"></p>
                    </div>

                </div>{{-- /grid --}}

                {{-- Buttons --}}
                <div class="flex gap-3 mt-5">
                    <button type="submit" id="btn-register" class="btn-primary flex-1">
                        <i class="fas fa-user-plus"></i> Daftar Sekarang
                    </button>
                    <a href="{{ route('login') }}" class="btn-secondary flex-1">
                        Sudah Punya Akun?
                    </a>
                </div>

            </form>
        </div>

        {{-- ── Right: Image Panel ── --}}
        <div class="hidden md:block relative flex-1 image-panel"></div>

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

        function checkStrength(val) {
            const bars   = ['bar1','bar2','bar3','bar4'].map(id => document.getElementById(id));
            const hint   = document.getElementById('pwdHint');
            const colors = ['#EF4444','#F59E0B','#3B82F6','#22C55E'];
            const labels = ['Sangat Lemah','Cukup','Kuat','Sangat Kuat'];
            let score = 0;
            if (val.length >= 8)                         score++;
            if (/[A-Z]/.test(val) && /[a-z]/.test(val)) score++;
            if (/[0-9]/.test(val))                       score++;
            if (/[^A-Za-z0-9]/.test(val))                score++;
            bars.forEach((b, i) => { b.style.background = i < score ? colors[score - 1] : '#E2E8F0'; });
            if (!val.length) { hint.textContent = 'Masukkan password'; hint.style.color = '#94A3B8'; }
            else { hint.textContent = labels[score - 1] || 'Sangat Lemah'; hint.style.color = colors[score - 1] || colors[0]; }
        }

        function checkConfirm(val) {
            const pwd  = document.getElementById('password').value;
            const hint = document.getElementById('confirmHint');
            if (!val) { hint.textContent = ''; return; }
            if (val === pwd) { hint.textContent = '✓ Password cocok'; hint.style.color = '#22C55E'; }
            else             { hint.textContent = '✗ Password tidak cocok'; hint.style.color = '#EF4444'; }
        }
    </script>
</body>
</html>