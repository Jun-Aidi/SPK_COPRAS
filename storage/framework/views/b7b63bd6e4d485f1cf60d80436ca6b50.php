<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar — SPK COPRAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo e(asset('css/montserrat.css')); ?>">
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

        .register-wrapper {
            width: 100%;
            max-width: 520px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .register-header {
            background: linear-gradient(135deg, #071E3D, #1F4287);
            padding: 32px 40px;
            text-align: center;
        }
        .register-header-icon {
            width: 52px; height: 52px;
            border-radius: 14px;
            background: rgba(33,230,193,0.2);
            border: 2px solid rgba(33,230,193,0.35);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 14px;
        }
        .register-header-icon i { font-size: 1.3rem; color: #21E6C1; }
        .register-header h1 { font-size: 1.3rem; font-weight: 900; color: #fff; }
        .register-header p { font-size: 0.78rem; color: rgba(255,255,255,0.5); margin-top: 6px; }

        .register-body { padding: 32px 40px 36px; }

        .form-group { margin-bottom: 16px; }
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

        .btn-register {
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
        }
        .btn-register:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(39,142,165,0.35);
        }

        .register-footer {
            text-align: center;
            margin-top: 18px;
            font-size: 0.8rem;
            color: #64748B;
        }
        .register-footer a {
            color: #278EA5;
            font-weight: 700;
            text-decoration: none;
        }
        .register-footer a:hover { color: #21E6C1; }

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
    <div class="register-wrapper">
        <div class="register-header">
            <div class="register-header-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <h1>Buat Akun Baru</h1>
            <p>Isi form di bawah untuk mendaftar ke SPK COPRAS</p>
        </div>

        <div class="register-body">
            <?php if($errors->any()): ?>
            <div class="alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <?php echo e($errors->first()); ?>

            </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                    <div class="input-wrapper">
                        <i class="fas fa-id-card input-icon"></i>
                        <input id="nama_lengkap" type="text" name="nama_lengkap"
                               value="<?php echo e(old('nama_lengkap')); ?>"
                               class="form-input <?php echo e($errors->has('nama_lengkap') ? 'is-invalid' : ''); ?>"
                               placeholder="Masukkan nama lengkap" autofocus required>
                    </div>
                    <?php $__errorArgs = ['nama_lengkap'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="error-text"><i class="fas fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label class="form-label" for="username">Username</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user input-icon"></i>
                        <input id="username" type="text" name="username"
                               value="<?php echo e(old('username')); ?>"
                               class="form-input <?php echo e($errors->has('username') ? 'is-invalid' : ''); ?>"
                               placeholder="Masukkan username" required>
                    </div>
                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="error-text"><i class="fas fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input id="email" type="email" name="email"
                               value="<?php echo e(old('email')); ?>"
                               class="form-input <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>"
                               placeholder="Masukkan email" required>
                    </div>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="error-text"><i class="fas fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input id="password" type="password" name="password"
                               class="form-input <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>"
                               placeholder="Minimal 8 karakter" required>
                        <button type="button" class="toggle-password" onclick="togglePassword('password', this)">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="error-text"><i class="fas fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                               class="form-input"
                               placeholder="Ulangi password" required>
                        <button type="button" class="toggle-password" onclick="togglePassword('password_confirmation', this)">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-register">
                    <i class="fas fa-user-plus mr-2"></i> Daftar Sekarang
                </button>
            </form>

            <div class="register-footer">
                Sudah punya akun? <a href="<?php echo e(route('login')); ?>">Masuk di sini</a>
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
</html><?php /**PATH C:\laragon\www\SPK_COPRAS\resources\views/auth/register.blade.php ENDPATH**/ ?>