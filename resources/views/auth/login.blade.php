<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SPK COPRAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/montserrat.css') }}">
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <style>
        body { font-family: 'Montserrat', sans-serif; }

        /* Animated background particles */
        .particle {
            position: absolute;
            border-radius: 50%;
            animation: drift linear infinite;
            pointer-events: none;
        }
        @keyframes drift {
            0%   { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10%  { opacity: 1; }
            90%  { opacity: 1; }
            100% { transform: translateY(-100px) rotate(720deg); opacity: 0; }
        }

        /* Floating animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50%       { transform: translateY(-18px); }
        }
        .floating  { animation: float 6s ease-in-out infinite; }
        .floating2 { animation: float 8s ease-in-out 2s infinite; }
        .floating3 { animation: float 7s ease-in-out 4s infinite; }

        /* Glow pulse */
        @keyframes glowPulse {
            0%, 100% { box-shadow: 0 0 20px rgba(33, 230, 193, 0.3); }
            50%       { box-shadow: 0 0 40px rgba(33, 230, 193, 0.7); }
        }

        /* Input underline style */
        .input-field {
            background: rgba(255,255,255,0.05);
            border: none;
            border-bottom: 2px solid rgba(39, 142, 165, 0.5);
            border-radius: 0;
            color: #fff;
            transition: all 0.3s ease;
            outline: none;
        }
        .input-field:focus {
            border-bottom-color: #21E6C1;
            background: rgba(33, 230, 193, 0.05);
        }
        .input-field::placeholder { color: rgba(255,255,255,0.35); font-weight: 500; }

        /* Input icon color */
        .input-icon { color: #278EA5; }
        .input-field:focus + .focus-line { width: 100%; }

        /* Card glassmorphism */
        .glass-card {
            background: rgba(31, 66, 135, 0.25);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(33, 230, 193, 0.15);
            border-radius: 24px;
        }

        /* Tab active */
        .tab-active {
            color: #21E6C1;
            border-bottom: 3px solid #21E6C1;
        }
        .tab-inactive {
            color: rgba(255,255,255,0.35);
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
        }
        .tab-inactive:hover { color: rgba(255,255,255,0.6); border-bottom-color: rgba(39,142,165,0.5); }

        /* Submit button */
        .btn-primary {
            background: linear-gradient(135deg, #278EA5, #21E6C1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #21E6C1, #278EA5);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .btn-primary:hover::before { opacity: 1; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(33,230,193,0.4); }
        .btn-primary span, .btn-primary i { position: relative; z-index: 1; }

        /* Alert */
        .alert-success {
            background: rgba(33,230,193,0.1);
            border: 1px solid rgba(33,230,193,0.4);
            color: #21E6C1;
            border-radius: 10px;
        }
        .alert-error {
            background: rgba(239,68,68,0.1);
            border: 1px solid rgba(239,68,68,0.4);
            color: #fca5a5;
            border-radius: 10px;
        }

        /* Navbar */
        .navbar {
            background: rgba(7, 30, 61, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(33,230,193,0.15);
        }

        /* Right side decorative ring */
        .deco-ring {
            border: 2px solid;
            border-radius: 50%;
            animation: spin linear infinite;
            opacity: 0.15;
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to   { transform: rotate(360deg); }
        }

        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #21E6C1, #278EA5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Shadow for inputs */
        .shadow-teal { box-shadow: 0 4px 8px -4px rgba(33,230,193,0.3); }
    </style>
</head>

<body class="min-h-screen" style="background: linear-gradient(135deg, #071E3D 0%, #1F4287 60%, #278EA5 100%); position: relative; overflow-x: hidden;">

    <!-- Animated background particles -->
    <div id="particles" aria-hidden="true"></div>

    <!-- Decorative blobs -->
    <div style="position:fixed; top:-100px; right:-100px; width:400px; height:400px; background:radial-gradient(circle, rgba(33,230,193,0.12), transparent 70%); pointer-events:none;"></div>
    <div style="position:fixed; bottom:-100px; left:-100px; width:350px; height:350px; background:radial-gradient(circle, rgba(39,142,165,0.12), transparent 70%); pointer-events:none;"></div>

    <!-- Navbar -->
    <div class="navbar w-full h-18 px-8 md:px-16 flex flex-row justify-between items-center py-4">
        <div class="flex items-center space-x-3">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center" style="background:linear-gradient(135deg,#278EA5,#21E6C1);">
                <i class="fas fa-database text-sm" style="color:#071E3D;"></i>
            </div>
            <span class="font-bold text-lg" style="color:#fff;">SPK <span class="gradient-text">COPRAS</span></span>
        </div>
        <a href="{{ route('register') }}"
           class="px-6 py-2 rounded-full font-bold text-sm transition-all duration-300"
           style="border: 1.5px solid #21E6C1; color:#21E6C1;"
           onmouseover="this.style.background='rgba(33,230,193,0.15)'"
           onmouseout="this.style.background='transparent'">
            Daftar
        </a>
    </div>

    <!-- Main Content -->
    <div class="w-full min-h-[calc(100vh-4.5rem)] flex items-center px-4 md:px-16 lg:px-32 py-12">
        <div class="w-full flex flex-col md:flex-row items-center gap-16">

            <!-- LEFT: Login Form -->
            <div class="w-full md:w-5/12 glass-card p-8 md:p-12" style="animation: glowPulse 4s ease-in-out infinite;">

                <!-- Tabs -->
                <div class="flex items-center gap-8 mb-8">
                    <button class="tab-active text-2xl font-black pb-2 transition-all">Sign In</button>
                    <a href="{{ route('register') }}" class="tab-inactive text-2xl font-black pb-2">Sign Up</a>
                </div>

                <!-- Alerts -->
                @if(session('success'))
                <div class="alert-success px-4 py-3 mb-6 flex items-center gap-2">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
                @endif

                @if(session('error'))
                <div class="alert-error px-4 py-3 mb-6 flex items-center gap-2">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="space-y-6">

                        <!-- Login Field -->
                        <div>
                            <div class="relative flex items-center">
                                <div class="absolute left-2 bottom-3 input-icon">
                                    <i class="fas fa-circle-user text-xl"></i>
                                </div>
                                <input type="text" name="login" id="loginField"
                                    placeholder="Email atau Username"
                                    class="input-field w-full pl-10 pr-4 py-3 text-white text-sm"
                                    value="{{ old('login') }}" />
                            </div>
                            @error('login')
                            <p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{!! $message !!}</p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div>
                            <div class="relative flex items-center">
                                <div class="absolute left-2 bottom-3 input-icon">
                                    <i class="fas fa-lock text-xl"></i>
                                </div>
                                <input type="password" name="password" id="passwordInput"
                                    placeholder="Password"
                                    class="input-field w-full pl-10 pr-12 py-3 text-white text-sm" />
                                <div class="absolute right-3 bottom-3 cursor-pointer" onclick="togglePassword()">
                                    <i id="eyeIcon" class="fas fa-eye" style="color:rgba(255,255,255,0.35);"></i>
                                </div>
                            </div>
                            @error('password')
                            <p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div class="flex justify-end items-center pt-2">
                            <button type="submit" id="loginBtn"
                                class="btn-primary px-8 py-2.5 rounded-full font-bold text-sm flex items-center gap-2"
                                style="color:#071E3D;">
                                <i class="fas fa-sign-in-alt"></i>
                                <span>Masuk</span>
                            </button>
                        </div>

                    </div>
                </form>

                <!-- Divider & Register link -->
                <div class="mt-8 text-center">
                    <p class="text-sm" style="color:rgba(255,255,255,0.4);">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="font-bold transition-colors duration-300"
                           style="color:#21E6C1;"
                           onmouseover="this.style.color='#278EA5'"
                           onmouseout="this.style.color='#21E6C1'">Daftar sekarang</a>
                    </p>
                </div>
            </div>

            <!-- RIGHT: Info Section -->
            <div class="w-full md:w-7/12 relative flex flex-col justify-center space-y-8">

                <!-- Decorative floating shapes -->
                <div class="absolute -top-12 -right-8 w-48 h-48 deco-ring floating" style="border-color:#21E6C1; animation-duration:20s;"></div>
                <div class="absolute bottom-0 left-8 w-28 h-28 deco-ring floating2" style="border-color:#278EA5; animation-duration:15s;"></div>
                <div class="absolute top-1/2 right-1/4 w-16 h-16 rounded-full floating3"
                     style="background:rgba(33,230,193,0.08); border:1px solid rgba(33,230,193,0.2);"></div>

                <!-- Floating icons -->
                <div class="absolute top-8 left-1/3 floating" style="color:rgba(33,230,193,0.2);">
                    <i class="fas fa-database text-5xl"></i>
                </div>
                <div class="absolute bottom-16 right-1/4 floating2" style="color:rgba(39,142,165,0.2);">
                    <i class="fas fa-chart-line text-4xl"></i>
                </div>
                <div class="absolute top-1/2 right-4 floating3" style="color:rgba(33,230,193,0.15);">
                    <i class="fas fa-cogs text-3xl"></i>
                </div>

                <!-- Content -->
                <div class="relative z-10">
                    <h1 class="font-black text-3xl md:text-4xl text-white leading-tight mb-2">
                        Sistem Pendukung<br>
                        Keputusan Metode<br>
                        <span class="gradient-text">COPRAS</span>
                    </h1>
                </div>

                <div class="relative z-10 space-y-4">
                    <div class="p-5 rounded-xl text-sm font-medium text-justify leading-relaxed"
                         style="background:rgba(31,66,135,0.3); border:1px solid rgba(33,230,193,0.1); color:rgba(255,255,255,0.8);">
                        <i class="fas fa-info-circle mr-2" style="color:#21E6C1;"></i>
                        Sistem Pendukung Keputusan (SPK) merupakan sistem informasi yang ditujukan
                        untuk membantu manajemen dalam mengambil keputusan yang berkaitan dengan
                        persoalan bersifat semi terstruktur.
                    </div>
                    <div class="p-5 rounded-xl text-sm font-medium text-justify leading-relaxed"
                         style="background:rgba(31,66,135,0.3); border:1px solid rgba(39,142,165,0.15); color:rgba(255,255,255,0.8);">
                        <i class="fas fa-chart-bar mr-2" style="color:#278EA5;"></i>
                        Metode COPRAS mengasumsikan ketergantungan langsung dan proporsional dari
                        tingkat signifikansi dan utilitas alternatif dengan adanya kriteria yang
                        saling bertentangan, menghasilkan keputusan terbaik secara objektif.
                    </div>
                </div>

                <!-- Stats row -->
                <div class="relative z-10 flex gap-6">
                    <div class="flex-1 p-4 rounded-xl text-center" style="background:rgba(33,230,193,0.08); border:1px solid rgba(33,230,193,0.15);">
                        <div class="text-2xl font-black gradient-text">COPRAS</div>
                        <div class="text-xs mt-1" style="color:rgba(255,255,255,0.5);">Metode</div>
                    </div>
                    <div class="flex-1 p-4 rounded-xl text-center" style="background:rgba(39,142,165,0.08); border:1px solid rgba(39,142,165,0.15);">
                        <div class="text-2xl font-black" style="color:#278EA5;">Multi</div>
                        <div class="text-xs mt-1" style="color:rgba(255,255,255,0.5);">Kriteria</div>
                    </div>
                    <div class="flex-1 p-4 rounded-xl text-center" style="background:rgba(31,66,135,0.3); border:1px solid rgba(31,66,135,0.4);">
                        <div class="text-2xl font-black" style="color:#1F4287;">DSS</div>
                        <div class="text-xs mt-1" style="color:rgba(255,255,255,0.5);">Sistem</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword() {
            const input = document.getElementById('passwordInput');
            const icon  = document.getElementById('eyeIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        // Generate animated background particles
        (function() {
            const container = document.getElementById('particles');
            container.style.cssText = 'position:fixed;inset:0;pointer-events:none;overflow:hidden;z-index:0;';
            const colors = ['rgba(33,230,193,0.6)','rgba(39,142,165,0.5)','rgba(31,66,135,0.6)'];
            for (let i = 0; i < 18; i++) {
                const p = document.createElement('div');
                const size = Math.random() * 5 + 2;
                p.className = 'particle';
                p.style.cssText = `
                    width:${size}px; height:${size}px;
                    background:${colors[i%colors.length]};
                    left:${Math.random()*100}%;
                    animation-duration:${Math.random()*15+10}s;
                    animation-delay:${Math.random()*10}s;
                `;
                container.appendChild(p);
            }
        })();
    </script>
</body>
</html>