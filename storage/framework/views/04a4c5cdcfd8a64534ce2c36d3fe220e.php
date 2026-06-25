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
            --bg:      #F0F4F8;
            --surface: #FFFFFF;
            --border:  #E2E8F0;
            --text:    #1E293B;
            --muted:   #64748B;
        }

        * { font-family: 'Montserrat', sans-serif; box-sizing: border-box; }

        body {
            min-height: 100vh;
            background: var(--bg);
        }

        /* ── Sidebar ── */
        .sidebar {
            width: 248px;
            flex-shrink: 0;
            background: var(--surface);
            border-right: 1px solid var(--border);
            box-shadow: 2px 0 12px rgba(0,0,0,0.06);
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow-y: auto;
            position: sticky;
            top: 0;
        }

        .sidebar-logo {
            padding: 22px 20px 18px;
            border-bottom: 1px solid var(--border);
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
            color: var(--navy);
        }
        .sidebar-logo-text span {
            background: linear-gradient(135deg, var(--teal), var(--cyan));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .sidebar-section-label {
            font-size: 0.63rem;
            font-weight: 800;
            letter-spacing: 0.1em;
            color: var(--muted);
            padding: 20px 20px 8px;
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            color: var(--muted);
            font-weight: 600;
            font-size: 0.84rem;
            border-radius: 8px;
            margin: 5px 10px;
            transition: all 0.18s ease;
            text-decoration: none;
        }
        .sidebar-item:hover {
            background: #EEF9F7;
            color: var(--teal);
        }
        .sidebar-item.active {
            background: linear-gradient(135deg, rgba(39,142,165,0.1), rgba(33,230,193,0.1));
            color: var(--teal);
            border-left: 3px solid var(--cyan);
            padding-left: 13px;
            font-weight: 700;
        }
        .sidebar-item.active i { color: var(--teal); }
        .sidebar-item i {
            width: 18px;
            text-align: center;
            font-size: 0.88rem;
            color: #94A3B8;
            transition: color 0.18s;
        }
        .sidebar-item:hover i { color: var(--teal); }

        .sidebar-divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 10px 0;
        }

        .sidebar-logout {
            margin-top: auto;
            padding: 16px 10px;
            border-top: 1px solid var(--border);
        }
        .btn-logout {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            width: 100%;
            border: 1px solid #FECACA;
            background: #FFF5F5;
            color: #EF4444;
            font-weight: 600;
            font-size: 0.84rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.18s;
            text-align: left;
        }
        .btn-logout:hover {
            background: #FEE2E2;
            color: #DC2626;
        }
        .btn-logout i { width: 18px; text-align: center; color: #EF4444; }

        /* ── Topbar ── */
        .topbar {
            height: 60px;
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            box-shadow: 0 1px 4px rgba(0,0,0,0.05);
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
            padding: 5px 12px 5px 5px;
            border-radius: 999px;
            border: 1px solid var(--border);
            transition: all 0.18s;
            background: var(--bg);
        }
        .profile-btn:hover {
            border-color: var(--teal);
            background: #EEF9F7;
        }
        .profile-avatar {
            width: 32px; height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--teal), var(--cyan));
            display: flex; align-items: center; justify-content: center;
        }
        .profile-avatar i { color: #fff; font-size: 0.8rem; }
        .profile-username {
            color: var(--text);
            font-weight: 700;
            font-size: 0.82rem;
        }

        /* Dropdown */
        .profile-dropdown {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            min-width: 180px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            z-index: 100;
            overflow: hidden;
        }
        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 11px 16px;
            color: var(--muted);
            font-size: 0.82rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.15s;
            border: none;
            background: none;
            width: 100%;
            cursor: pointer;
            text-align: left;
        }
        .dropdown-item:hover {
            background: var(--bg);
            color: var(--text);
        }
        .dropdown-item i { width: 16px; text-align: center; color: var(--teal); }
        .dropdown-item.danger:hover { background: #FFF5F5; color: #EF4444; }
        .dropdown-item.danger i { color: #EF4444; }
        .dropdown-divider { border-top: 1px solid var(--border); }

        /* ── Main content area ── */
        .main-content {
            flex: 1;
            overflow-y: auto;
            padding: 28px;
        }

        /* ── Content card (used by pages) ── */
        .content-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 1px 6px rgba(0,0,0,0.05);
        }

        /* ── Table styling ── */
        .tbl { width: 100%; border-collapse: collapse; }
        .tbl th {
            padding: 11px 16px;
            text-align: center;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            color: var(--teal);
            background: #F8FFFE;
            border-bottom: 2px solid rgba(39,142,165,0.15);
        }
        .tbl td {
            padding: 11px 16px;
            font-size: 0.83rem;
            color: var(--text);
            border-bottom: 1px solid var(--border);
        }
        .tbl tr:last-child td { border-bottom: none; }
        .tbl tr:hover td { background: #F8FFFE; }

        /* ── Badges ── */
        .badge-active {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 700;
            background: #ECFDF5;
            color: #059669;
            border: 1px solid #A7F3D0;
        }
        .badge-inactive {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 700;
            background: #FFF5F5;
            color: #EF4444;
            border: 1px solid #FECACA;
        }
        .badge-admin {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 700;
            background: #EFF8FF;
            color: var(--teal);
            border: 1px solid rgba(39,142,165,0.25);
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
            gap: 6px;
            padding: 8px 18px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.82rem;
            background: #fff;
            color: var(--teal);
            border: 1px solid rgba(39,142,165,0.35);
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }
        .btn-secondary:hover {
            background: #EEF9F7;
            border-color: var(--teal);
        }
        .btn-danger {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 18px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.82rem;
            background: #FFF5F5;
            color: #EF4444;
            border: 1px solid #FECACA;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }
        .btn-danger:hover {
            background: #FEE2E2;
            color: #DC2626;
        }

        /* ── Form inputs ── */
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
        .form-input::placeholder { color: #94A3B8; }
        .form-label {
            display: block;
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 6px;
        }

        /* ── Section title ── */
        .page-title {
            font-size: 1.25rem;
            font-weight: 900;
            color: var(--navy);
        }
        .page-subtitle {
            font-size: 0.8rem;
            color: var(--muted);
            margin-top: 2px;
        }
        .gradient-text {
            background: linear-gradient(135deg, var(--teal), var(--cyan));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ── Alert messages ── */
        .alert-success {
            background: #ECFDF5;
            border: 1px solid #A7F3D0;
            color: #059669;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 0.82rem;
            font-weight: 600;
        }
        .alert-error {
            background: #FFF5F5;
            border: 1px solid #FECACA;
            color: #EF4444;
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
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: var(--bg); }
        ::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--teal); }

        /* Select override */
        select.form-input option { background: #fff; color: var(--text); }
    </style>
</head>

<body>
    <div class="flex h-screen overflow-hidden">

        <!-- ═══════════ SIDEBAR ═══════════ -->
        <nav class="sidebar">
            <!-- Logo -->
            <div class="sidebar-logo">
                <div class="sidebar-logo-icon">
                    <i class="fas fa-database text-sm" style="color:#fff;"></i>
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
                        <i class="fas fa-chevron-down" style="color:#94A3B8; font-size:0.7rem;"></i>
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
         style="background:rgba(0,0,0,0.35); backdrop-filter:blur(4px);">
        <div class="mt-20 max-w-md w-full mx-4 transform -translate-y-full opacity-0"
             style="background:#fff; border:1px solid var(--border); border-radius:16px; overflow:hidden; box-shadow:0 20px 60px rgba(0,0,0,0.15);"
             id="logoutPopupBox">
            <div class="px-6 py-5" style="border-bottom:1px solid var(--border);">
                <div class="flex justify-between items-center">
                    <h2 class="font-black text-lg" style="color:var(--navy);">Konfirmasi Logout</h2>
                    <button type="button" id="closeLogoutPopup"
                            style="color:#94A3B8; background:none; border:none; cursor:pointer; font-size:1.1rem; line-height:1;"
                            onmouseover="this.style.color='#1E293B'" onmouseout="this.style.color='#94A3B8'">
                        <i class="fas fa-xmark"></i>
                    </button>
                </div>
            </div>
            <div class="px-6 py-6">
                <p style="color:var(--muted); font-size:0.875rem; font-weight:600;">
                    Apakah Anda yakin ingin keluar dari sistem?
                </p>
            </div>
            <div class="px-6 pb-5 flex justify-end gap-3">
                <button type="button" id="cancelLogout" class="btn-secondary" style="border-radius:8px;">
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