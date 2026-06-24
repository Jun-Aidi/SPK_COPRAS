<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK COPRAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo e(asset('css/montserrat.css')); ?>">
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">
    <script src="<?php echo e(asset('js/jquery-3.7.1.min.js')); ?>"></script>
    <style>
        :root {
            --navy:    #071E3D;
            --blue:    #1F4287;
            --teal:    #278EA5;
            --cyan:    #21E6C1;
        }

        * { font-family: 'Montserrat', sans-serif; box-sizing: border-box; }

        body {
            min-height: 100vh;
            background: linear-gradient(160deg, var(--navy) 0%, var(--blue) 60%, var(--teal) 100%);
            background-attachment: fixed;
        }

        /* ── Sidebar ── */
        .sidebar {
            width: 240px;
            flex-shrink: 0;
            background: rgba(7, 30, 61, 0.75);
            backdrop-filter: blur(16px);
            border-right: 1px solid rgba(33, 230, 193, 0.12);
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow-y: auto;
            position: sticky;
            top: 0;
        }

        .sidebar-logo {
            padding: 24px 20px 20px;
            border-bottom: 1px solid rgba(33, 230, 193, 0.12);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .sidebar-logo-icon {
            width: 38px; height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--teal), var(--cyan));
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .sidebar-logo-text {
            font-weight: 900;
            font-size: 1rem;
            color: #fff;
        }
        .sidebar-logo-text span {
            background: linear-gradient(135deg, var(--cyan), var(--teal));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .sidebar-section-label {
            font-size: 0.65rem;
            font-weight: 800;
            letter-spacing: 0.1em;
            color: rgba(255,255,255,0.3);
            padding: 20px 20px 8px;
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 20px;
            color: rgba(255,255,255,0.55);
            font-weight: 600;
            font-size: 0.85rem;
            border-radius: 8px;
            margin: 10px 14px;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        .sidebar-item:hover {
            background: rgba(33, 230, 193, 0.08);
            color: #fff;
        }
        .sidebar-item.active {
            background: rgba(33, 230, 193, 0.15);
            color: var(--cyan);
            border-left: 3px solid var(--cyan);
            padding-left: 17px;
        }
        .sidebar-item.active i {
            color: var(--cyan);
        }
        .sidebar-item i {
            width: 18px;
            text-align: center;
            font-size: 0.9rem;
            color: rgba(255,255,255,0.35);
            transition: color 0.2s;
        }
        .sidebar-item:hover i { color: var(--cyan); }

        .sidebar-divider {
            border: none;
            border-top: 1px solid rgba(33, 230, 193, 0.1);
            margin: 12px 0;
        }

        .sidebar-logout {
            margin-top: auto;
            padding: 16px 10px;
            border-top: 1px solid rgba(33, 230, 193, 0.1);
        }
        .btn-logout {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 20px;
            width: 100%;
            border: none;
            background: rgba(239, 68, 68, 0.08);
            color: rgba(255,255,255,0.55);
            font-weight: 600;
            font-size: 0.85rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
            text-align: left;
        }
        .btn-logout:hover {
            background: rgba(239, 68, 68, 0.2);
            color: #fca5a5;
        }
        .btn-logout i { width: 18px; text-align: center; color: rgba(239,68,68,0.5); }
        .btn-logout:hover i { color: #fca5a5; }

        /* ── Topbar ── */
        .topbar {
            height: 64px;
            background: rgba(7, 30, 61, 0.6);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(33, 230, 193, 0.1);
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 28px;
            flex-shrink: 0;
        }

        .profile-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            padding: 6px 12px 6px 6px;
            border-radius: 999px;
            border: 1px solid rgba(33, 230, 193, 0.15);
            transition: all 0.2s;
        }
        .profile-btn:hover {
            background: rgba(33, 230, 193, 0.08);
            border-color: rgba(33, 230, 193, 0.4);
        }
        .profile-avatar {
            width: 34px; height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--teal), var(--cyan));
            display: flex; align-items: center; justify-content: center;
        }
        .profile-avatar i { color: var(--navy); font-size: 0.85rem; }
        .profile-username {
            color: rgba(255,255,255,0.8);
            font-weight: 700;
            font-size: 0.85rem;
        }

        /* Dropdown */
        .profile-dropdown {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            background: rgba(7, 30, 61, 0.95);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(33, 230, 193, 0.2);
            border-radius: 12px;
            min-width: 180px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
            z-index: 100;
            overflow: hidden;
        }
        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            color: rgba(255,255,255,0.7);
            font-size: 0.82rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            border: none;
            background: none;
            width: 100%;
            cursor: pointer;
            text-align: left;
        }
        .dropdown-item:hover {
            background: rgba(33, 230, 193, 0.08);
            color: #fff;
        }
        .dropdown-item i { width: 16px; text-align: center; color: var(--teal); }
        .dropdown-item.danger:hover { background: rgba(239,68,68,0.1); color: #fca5a5; }
        .dropdown-item.danger i { color: rgba(239,68,68,0.6); }
        .dropdown-divider { border-top: 1px solid rgba(33,230,193,0.1); }

        /* ── Main content area ── */
        .main-content {
            flex: 1;
            overflow-y: auto;
            padding: 28px;
        }

        /* ── Content card (used by pages) ── */
        .content-card {
            background: rgba(31, 66, 135, 0.2);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(33, 230, 193, 0.12);
            border-radius: 16px;
        }

        /* ── Table styling ── */
        .tbl { width: 100%; border-collapse: collapse; }
        .tbl th {
            padding: 12px 16px;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            color: var(--cyan);
            background: rgba(33, 230, 193, 0.06);
            border-bottom: 1px solid rgba(33, 230, 193, 0.15);
        }
        .tbl td {
            padding: 12px 16px;
            font-size: 0.82rem;
            color: rgba(255,255,255,0.8);
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        .tbl tr:hover td { background: rgba(33, 230, 193, 0.04); }

        /* ── Badges ── */
        .badge-active {
            display: inline-block;
            padding: 2px 10px;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 700;
            background: rgba(33,230,193,0.15);
            color: var(--cyan);
            border: 1px solid rgba(33,230,193,0.3);
        }
        .badge-inactive {
            display: inline-block;
            padding: 2px 10px;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 700;
            background: rgba(239,68,68,0.12);
            color: #fca5a5;
            border: 1px solid rgba(239,68,68,0.25);
        }
        .badge-admin {
            display: inline-block;
            padding: 2px 10px;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 700;
            background: rgba(39,142,165,0.15);
            color: var(--teal);
            border: 1px solid rgba(39,142,165,0.3);
        }

        /* ── Buttons ── */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 18px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.82rem;
            background: linear-gradient(135deg, var(--teal), var(--cyan));
            color: var(--navy);
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(33,230,193,0.4);
        }
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 18px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.82rem;
            background: rgba(39,142,165,0.15);
            color: var(--teal);
            border: 1px solid rgba(39,142,165,0.3);
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }
        .btn-secondary:hover {
            background: rgba(39,142,165,0.25);
            color: #fff;
        }
        .btn-danger {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 18px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.82rem;
            background: rgba(239,68,68,0.12);
            color: #fca5a5;
            border: 1px solid rgba(239,68,68,0.25);
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }
        .btn-danger:hover {
            background: rgba(239,68,68,0.25);
            color: #fff;
        }

        /* ── Form inputs ── */
        .form-input {
            width: 100%;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(39,142,165,0.3);
            border-radius: 8px;
            padding: 10px 14px;
            color: #fff;
            font-size: 0.85rem;
            font-family: 'Montserrat', sans-serif;
            transition: all 0.2s;
            outline: none;
        }
        .form-input:focus {
            border-color: var(--cyan);
            background: rgba(33,230,193,0.05);
        }
        .form-input::placeholder { color: rgba(255,255,255,0.3); }
        .form-label {
            display: block;
            font-size: 0.78rem;
            font-weight: 700;
            color: rgba(255,255,255,0.6);
            margin-bottom: 6px;
        }

        /* ── Section title ── */
        .page-title {
            font-size: 1.3rem;
            font-weight: 900;
            color: #fff;
        }
        .page-subtitle {
            font-size: 0.8rem;
            color: rgba(255,255,255,0.45);
            margin-top: 2px;
        }
        .gradient-text {
            background: linear-gradient(135deg, var(--cyan), var(--teal));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ── Alert messages ── */
        .alert-success {
            background: rgba(33,230,193,0.1);
            border: 1px solid rgba(33,230,193,0.35);
            color: var(--cyan);
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 0.82rem;
            font-weight: 600;
        }
        .alert-error {
            background: rgba(239,68,68,0.1);
            border: 1px solid rgba(239,68,68,0.35);
            color: #fca5a5;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 0.82rem;
            font-weight: 600;
        }

        /* ── Animations ── */
        @keyframes slideDown {
            from { transform: translateY(-100%); opacity: 0; }
            to   { transform: translateY(0);     opacity: 1; }
        }
        .slide-down { animation: slideDown 0.3s ease-out forwards; }

        @keyframes slideUp {
            from { transform: translateY(0);     opacity: 1; }
            to   { transform: translateY(-100%); opacity: 0; }
        }
        .slide-up { animation: slideUp 0.3s ease-out forwards; }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: rgba(255,255,255,0.03); }
        ::-webkit-scrollbar-thumb { background: rgba(33,230,193,0.2); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(33,230,193,0.4); }

        /* Select override */
        select.form-input option { background: #0d2a5c; color: #fff; }
    </style>
</head>

<body>
    <div class="flex h-screen overflow-hidden">

        <!-- ═══════════ SIDEBAR ═══════════ -->
        <nav class="sidebar">
            <!-- Logo -->
            <div class="sidebar-logo">
                <div class="sidebar-logo-icon">
                    <i class="fas fa-database text-sm" style="color:#071E3D;"></i>
                </div>
                <div class="sidebar-logo-text">SPK <span>COPRAS</span></div>
            </div>

            <!-- Dashboard -->
            <div style="padding: 12px 0;">
                <a href="<?php echo e(route('dashboard')); ?>"
                   class="sidebar-item <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">
                    <i class="fas fa-house-chimney"></i>
                    Dashboard
                </a>
            </div>

            <hr class="sidebar-divider">

            <!-- Master Data -->
            <div class="sidebar-section-label">MASTER DATA</div>
            <div style="padding-bottom: 8px;">
                <?php if(auth()->user()->isAdmin()): ?>
                <a href="<?php echo e(route('kriteria.index')); ?>"
                   class="sidebar-item <?php echo e(request()->routeIs('kriteria.*') ? 'active' : ''); ?>">
                    <i class="fas fa-cube"></i> Data Kriteria
                </a>
                <a href="<?php echo e(route('subkriteria.index')); ?>"
                   class="sidebar-item <?php echo e(request()->routeIs('subkriteria.*') ? 'active' : ''); ?>">
                    <i class="fas fa-cubes"></i> Data Sub Kriteria
                </a>
                <a href="<?php echo e(route('alternatif.index')); ?>"
                   class="sidebar-item <?php echo e(request()->routeIs('alternatif.*') ? 'active' : ''); ?>">
                    <i class="fas fa-users"></i> Data Alternatif
                </a>
                <a href="<?php echo e(route('penilaian.index')); ?>"
                   class="sidebar-item <?php echo e(request()->routeIs('penilaian.*') ? 'active' : ''); ?>">
                    <i class="fas fa-pen-to-square"></i> Data Penilaian
                </a>
                <a href="<?php echo e(route('perhitungan.index')); ?>"
                   class="sidebar-item <?php echo e(request()->routeIs('perhitungan.*') ? 'active' : ''); ?>">
                    <i class="fas fa-calculator"></i> Data Perhitungan
                </a>
                <?php endif; ?>
                <a href="<?php echo e(route('hasilakhir.index')); ?>"
                   class="sidebar-item <?php echo e(request()->routeIs('hasilakhir.*') ? 'active' : ''); ?>">
                    <i class="fas fa-chart-line"></i> Data Hasil Akhir
                </a>
            </div>

            <hr class="sidebar-divider">

            <!-- Master User -->
            <div class="sidebar-section-label">MASTER USER</div>
            <div style="padding-bottom: 8px;">
                <?php if(auth()->user()->isAdmin()): ?>
                <a href="<?php echo e(route('user.index')); ?>"
                   class="sidebar-item <?php echo e(request()->routeIs('user.*') ? 'active' : ''); ?>">
                    <i class="fas fa-users-gear"></i> Data User
                </a>
                <?php endif; ?>
                <a href="<?php echo e(route('profile.index')); ?>"
                   class="sidebar-item <?php echo e(request()->routeIs('profile.*') ? 'active' : ''); ?>">
                    <i class="fas fa-user"></i> Data Profile
                </a>
            </div>

            <!-- Logout -->
            <div class="sidebar-logout">
                <button type="button" id="logoutButton" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </button>
            </div>
        </nav>

        <!-- ═══════════ MAIN AREA ═══════════ -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Topbar -->
            <header class="topbar">
                <div class="relative inline-block" id="profileWrapper">
                    <div class="profile-btn" id="profileDropdown">
                        <div class="profile-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <span class="profile-username"><?php echo e(auth()->user()->username); ?></span>
                        <i class="fas fa-chevron-down" style="color:rgba(255,255,255,0.4); font-size:0.7rem;"></i>
                    </div>
                    <div class="profile-dropdown hidden" id="profileDropdownContent">
                        <a href="<?php echo e(route('profile.index')); ?>" class="dropdown-item">
                            <i class="fas fa-user-circle"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <button type="button" id="dropdownLogoutButton" class="dropdown-item danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="main-content">
                <?php if(session('success')): ?>
                <div class="alert-success mb-5 flex items-center gap-2">
                    <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

                </div>
                <?php endif; ?>
                <?php if(session('error')): ?>
                <div class="alert-error mb-5 flex items-center gap-2">
                    <i class="fas fa-exclamation-circle"></i> <?php echo e(session('error')); ?>

                </div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>

    <!-- ═══════════ LOGOUT MODAL ═══════════ -->
    <div id="logoutConfirmation"
         class="fixed inset-0 hidden items-start justify-center z-50"
         style="background:rgba(7,30,61,0.75); backdrop-filter:blur(6px);">
        <div class="mt-20 max-w-md w-full mx-4 transform -translate-y-full opacity-0"
             style="background:rgba(7,30,61,0.95); border:1px solid rgba(33,230,193,0.2); border-radius:16px; overflow:hidden;"
             id="logoutPopupBox">
            <div class="px-6 py-5" style="border-bottom:1px solid rgba(33,230,193,0.1);">
                <div class="flex justify-between items-center">
                    <h2 class="font-black text-lg" style="color:#fff;">Konfirmasi Logout</h2>
                    <button type="button" id="closeLogoutPopup"
                            style="color:rgba(255,255,255,0.4); background:none; border:none; cursor:pointer; font-size:1.1rem; line-height:1;"
                            onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.4)'">
                        <i class="fas fa-xmark"></i>
                    </button>
                </div>
            </div>
            <div class="px-6 py-6">
                <p style="color:rgba(255,255,255,0.6); font-size:0.875rem; font-weight:600;">
                    Apakah Anda yakin ingin keluar dari sistem?
                </p>
            </div>
            <div class="px-6 pb-5 flex justify-end gap-3">
                <button type="button" id="cancelLogout"
                        class="btn-secondary" style="border-radius:8px;">
                    <i class="fas fa-xmark"></i> Batal
                </button>
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn-danger" style="border-radius:8px;">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Profile dropdown
            const profileDropdown = document.getElementById('profileDropdown');
            const dropdownContent = document.getElementById('profileDropdownContent');

            profileDropdown.addEventListener('click', function () {
                dropdownContent.classList.toggle('hidden');
            });
            window.addEventListener('click', function (e) {
                if (!document.getElementById('profileWrapper').contains(e.target)) {
                    dropdownContent.classList.add('hidden');
                }
            });

            // Logout modal
            const logoutConfirmation = document.getElementById('logoutConfirmation');
            const logoutPopupBox     = document.getElementById('logoutPopupBox');

            function openLogout() {
                logoutConfirmation.classList.remove('hidden');
                logoutConfirmation.classList.add('flex');
                setTimeout(() => logoutPopupBox.classList.add('slide-down'), 10);
            }
            function closeLogout() {
                logoutPopupBox.classList.remove('slide-down');
                logoutPopupBox.classList.add('slide-up');
                setTimeout(() => {
                    logoutConfirmation.classList.add('hidden');
                    logoutConfirmation.classList.remove('flex');
                    logoutPopupBox.classList.remove('slide-up');
                }, 300);
            }

            document.getElementById('logoutButton').addEventListener('click', openLogout);
            document.getElementById('dropdownLogoutButton').addEventListener('click', function () {
                dropdownContent.classList.add('hidden');
                openLogout();
            });
            document.getElementById('closeLogoutPopup').addEventListener('click', closeLogout);
            document.getElementById('cancelLogout').addEventListener('click', closeLogout);
            logoutConfirmation.addEventListener('click', function (e) {
                if (e.target === logoutConfirmation) closeLogout();
            });
        });
    </script>
</body>

</html><?php /**PATH C:\laragon\www\SPK_COPRAS\resources\views/layouts/app.blade.php ENDPATH**/ ?>