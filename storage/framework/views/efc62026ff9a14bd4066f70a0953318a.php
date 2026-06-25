<?php $__env->startSection('content'); ?>
<div class="space-y-6">

    
    <?php if(session('success')): ?>
    <div id="flashSuccess" class="flex justify-between items-center px-5 py-4 rounded-xl"
         style="background:#ECFDF5; border:1px solid rgba(16,185,129,0.3);">
        <div class="flex items-center gap-3">
            <i class="fas fa-circle-check" style="color:#10B981;"></i>
            <p class="text-sm font-semibold" style="color:#065F46;"><?php echo e(session('success')); ?></p>
        </div>
        <i class="fas fa-xmark cursor-pointer" style="color:#94A3B8;"
           onclick="document.getElementById('flashSuccess').remove()"
           onmouseover="this.style.color='#065F46'" onmouseout="this.style.color='#94A3B8'"></i>
    </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
    <div id="flashError" class="flex justify-between items-center px-5 py-4 rounded-xl"
         style="background:#FEF2F2; border:1px solid rgba(239,68,68,0.3);">
        <div class="flex items-center gap-3">
            <i class="fas fa-circle-xmark" style="color:#EF4444;"></i>
            <p class="text-sm font-semibold" style="color:#991B1B;"><?php echo e(session('error')); ?></p>
        </div>
        <i class="fas fa-xmark cursor-pointer" style="color:#94A3B8;"
           onclick="document.getElementById('flashError').remove()"
           onmouseover="this.style.color='#991B1B'" onmouseout="this.style.color='#94A3B8'"></i>
    </div>
    <?php endif; ?>
    <!-- Page Header -->
    <div>
        <h1 class="page-title"><i class="fas fa-house-chimney mr-2" style="color:#278EA5;"></i>Dashboard</h1>
        <p class="page-subtitle">Selamat datang kembali, <span style="color:#278EA5; font-weight:700;"><?php echo e(auth()->user()->username); ?></span>!</p>
    </div>

    <!-- Welcome Banner -->
    <div id="welcomeAlert" class="flex justify-between items-center px-5 py-4 rounded-xl"
         style="background:#EFF8FF; border:1px solid rgba(39,142,165,0.25);">
        <div class="flex items-center gap-3">
            <i class="fas fa-circle-info" style="color:#278EA5;"></i>
            <p class="text-sm font-semibold" style="color:#1E293B;">
                Silakan gunakan menu di sidebar untuk mengakses fitur yang tersedia.
            </p>
        </div>
        <i class="fas fa-xmark cursor-pointer" style="color:#94A3B8;"
           onclick="document.getElementById('welcomeAlert').remove()"
           onmouseover="this.style.color='#1E293B'" onmouseout="this.style.color='#94A3B8'"></i>
    </div>

    <!-- Menu Cards -->
    <?php if(auth()->user()->isAdmin()): ?>
    <!-- Admin cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="<?php echo e(route('kriteria.index')); ?>" class="content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left:3px solid #21E6C1; text-decoration:none;"
           onmouseover="this.style.boxShadow='0 4px 20px rgba(39,142,165,0.15)'; this.style.transform='translateY(-2px)';"
           onmouseout="this.style.boxShadow=''; this.style.transform='';">
            <div>
                <p class="text-xs font-bold mb-1" style="color:#94A3B8; letter-spacing:0.06em;">MASTER DATA</p>
                <h2 class="text-base font-black" style="color:#071E3D;">Data Kriteria</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(33,230,193,0.1);">
                <i class="fas fa-cube text-xl" style="color:#278EA5;"></i>
            </div>
        </a>
        <a href="<?php echo e(route('subkriteria.index')); ?>" class="content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left:3px solid #278EA5; text-decoration:none;"
           onmouseover="this.style.boxShadow='0 4px 20px rgba(39,142,165,0.15)'; this.style.transform='translateY(-2px)';"
           onmouseout="this.style.boxShadow=''; this.style.transform='';">
            <div>
                <p class="text-xs font-bold mb-1" style="color:#94A3B8; letter-spacing:0.06em;">MASTER DATA</p>
                <h2 class="text-base font-black" style="color:#071E3D;">Data Sub Kriteria</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(39,142,165,0.1);">
                <i class="fas fa-cubes text-xl" style="color:#278EA5;"></i>
            </div>
        </a>
        <a href="<?php echo e(route('alternatif.index')); ?>" class="content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left:3px solid #1F4287; text-decoration:none;"
           onmouseover="this.style.boxShadow='0 4px 20px rgba(31,66,135,0.12)'; this.style.transform='translateY(-2px)';"
           onmouseout="this.style.boxShadow=''; this.style.transform='';">
            <div>
                <p class="text-xs font-bold mb-1" style="color:#94A3B8; letter-spacing:0.06em;">MASTER DATA</p>
                <h2 class="text-base font-black" style="color:#071E3D;">Data Alternatif</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(31,66,135,0.08);">
                <i class="fas fa-users text-xl" style="color:#1F4287;"></i>
            </div>
        </a>
        <a href="<?php echo e(route('penilaian.index')); ?>" class="content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left:3px solid #278EA5; text-decoration:none;"
           onmouseover="this.style.boxShadow='0 4px 20px rgba(39,142,165,0.15)'; this.style.transform='translateY(-2px)';"
           onmouseout="this.style.boxShadow=''; this.style.transform='';">
            <div>
                <p class="text-xs font-bold mb-1" style="color:#94A3B8; letter-spacing:0.06em;">MASTER DATA</p>
                <h2 class="text-base font-black" style="color:#071E3D;">Data Penilaian</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(39,142,165,0.1);">
                <i class="fas fa-pen-to-square text-xl" style="color:#278EA5;"></i>
            </div>
        </a>
        <a href="<?php echo e(route('perhitungan.index')); ?>" class="content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left:3px solid #21E6C1; text-decoration:none;"
           onmouseover="this.style.boxShadow='0 4px 20px rgba(33,230,193,0.15)'; this.style.transform='translateY(-2px)';"
           onmouseout="this.style.boxShadow=''; this.style.transform='';">
            <div>
                <p class="text-xs font-bold mb-1" style="color:#94A3B8; letter-spacing:0.06em;">PROSES</p>
                <h2 class="text-base font-black" style="color:#071E3D;">Data Perhitungan</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(33,230,193,0.1);">
                <i class="fas fa-calculator text-xl" style="color:#278EA5;"></i>
            </div>
        </a>
        <a href="<?php echo e(route('hasilakhir.index')); ?>" class="content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left:3px solid #21E6C1; text-decoration:none;"
           onmouseover="this.style.boxShadow='0 4px 20px rgba(33,230,193,0.15)'; this.style.transform='translateY(-2px)';"
           onmouseout="this.style.boxShadow=''; this.style.transform='';">
            <div>
                <p class="text-xs font-bold mb-1" style="color:#94A3B8; letter-spacing:0.06em;">OUTPUT</p>
                <h2 class="text-base font-black" style="color:#071E3D;">Data Hasil Akhir</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(33,230,193,0.1);">
                <i class="fas fa-chart-line text-xl" style="color:#278EA5;"></i>
            </div>
        </a>
    </div>

    
    <div class="content-card p-6" style="border-top:3px solid #F59E0B;">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(245,158,11,0.1);">
                    <i class="fas fa-database text-xl" style="color:#F59E0B;"></i>
                </div>
                <div>
                    <p class="text-xs font-bold mb-0.5" style="color:#94A3B8; letter-spacing:0.06em;">UTILITAS DATABASE</p>
                    <h2 class="text-base font-black" style="color:#071E3D;">Jalankan Semua Seeder</h2>
                    <p class="text-xs mt-0.5" style="color:#64748B;">Memasukkan seluruh data awal (User, Kriteria, Sub Kriteria, Alternatif, Nilai) ke database.</p>
                </div>
            </div>
            <button type="button" id="openSeederModal"
                style="background:linear-gradient(135deg,#F59E0B,#D97706); color:#fff; border:none; padding:10px 22px; border-radius:10px; font-size:0.85rem; font-weight:700; cursor:pointer; display:flex; align-items:center; gap:8px; transition:all 0.2s;"
                onmouseover="this.style.opacity='0.88'; this.style.transform='translateY(-1px)';"
                onmouseout="this.style.opacity='1'; this.style.transform='';">
                <i class="fas fa-play-circle"></i> Jalankan Seeder
            </button>
        </div>
    </div>

    <?php else: ?>
    <!-- User cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="<?php echo e(route('hasilakhir.index')); ?>" class="content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left:3px solid #21E6C1; text-decoration:none;"
           onmouseover="this.style.boxShadow='0 4px 20px rgba(33,230,193,0.15)'; this.style.transform='translateY(-2px)';"
           onmouseout="this.style.boxShadow=''; this.style.transform='';">
            <div>
                <p class="text-xs font-bold mb-1" style="color:#94A3B8; letter-spacing:0.06em;">OUTPUT</p>
                <h2 class="text-base font-black" style="color:#071E3D;">Data Hasil Akhir</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(33,230,193,0.1);">
                <i class="fas fa-chart-line text-xl" style="color:#278EA5;"></i>
            </div>
        </a>
        <a href="<?php echo e(route('profile.index')); ?>" class="content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left:3px solid #278EA5; text-decoration:none;"
           onmouseover="this.style.boxShadow='0 4px 20px rgba(39,142,165,0.15)'; this.style.transform='translateY(-2px)';"
           onmouseout="this.style.boxShadow=''; this.style.transform='';">
            <div>
                <p class="text-xs font-bold mb-1" style="color:#94A3B8; letter-spacing:0.06em;">AKUN</p>
                <h2 class="text-base font-black" style="color:#071E3D;">Data Profile</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(39,142,165,0.1);">
                <i class="fas fa-user text-xl" style="color:#278EA5;"></i>
            </div>
        </a>
    </div>
    <?php endif; ?>
</div>


<?php if(auth()->user()->isAdmin()): ?>
<div id="seederModal" style="display:none; position:fixed; inset:0; z-index:9999; background:rgba(0,0,0,0.45); backdrop-filter:blur(4px); align-items:center; justify-content:center;">
    <div class="content-card" style="width:100%; max-width:430px; padding:2rem; position:relative; animation: fadeInUp 0.25s ease;">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(245,158,11,0.12); flex-shrink:0;">
                <i class="fas fa-triangle-exclamation text-xl" style="color:#F59E0B;"></i>
            </div>
            <div>
                <h3 class="font-black text-base" style="color:#071E3D;">Konfirmasi Jalankan Seeder</h3>
                <p class="text-xs" style="color:#64748B;">Tindakan ini akan menambah/mengganti data di database.</p>
            </div>
        </div>
        <p class="text-sm mb-5" style="color:#475569; line-height:1.6;">
            Seeder yang akan dijalankan:
            <ul class="mt-2 space-y-1" style="padding-left:1.25rem; list-style:disc;">
                <li>UserSeeder</li>
                <li>KriteriaSeeder</li>
                <li>SubKriteriaSeeder</li>
                <li>AlternatifSeeder</li>
                <li>NilaiAlternatifSeeder</li>
            </ul>
        </p>
        <div class="flex gap-3 justify-end">
            <button type="button" id="closeSeederModal"
                style="background:#F1F5F9; color:#475569; border:none; padding:9px 20px; border-radius:8px; font-size:0.85rem; font-weight:600; cursor:pointer;"
                onmouseover="this.style.background='#E2E8F0';" onmouseout="this.style.background='#F1F5F9';">
                Batal
            </button>
            <form action="<?php echo e(route('seeder.run')); ?>" method="POST" style="margin:0;">
                <?php echo csrf_field(); ?>
                <button type="submit" id="confirmSeederBtn"
                    style="background:linear-gradient(135deg,#F59E0B,#D97706); color:#fff; border:none; padding:9px 22px; border-radius:8px; font-size:0.85rem; font-weight:700; cursor:pointer; display:flex; align-items:center; gap:7px;"
                    onmouseover="this.style.opacity='0.88';" onmouseout="this.style.opacity='1';">
                    <i class="fas fa-play-circle"></i> Ya, Jalankan
                </button>
            </form>
        </div>
    </div>
</div>

<style>
@keyframes fadeInUp {
    from { opacity:0; transform:translateY(16px); }
    to   { opacity:1; transform:translateY(0); }
}
</style>

<script>
(function() {
    var modal   = document.getElementById('seederModal');
    var openBtn = document.getElementById('openSeederModal');
    var closeBtn= document.getElementById('closeSeederModal');

    if (openBtn) {
        openBtn.addEventListener('click', function() {
            modal.style.display = 'flex';
        });
    }
    if (closeBtn) {
        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });
    }
    // Close on backdrop click
    modal.addEventListener('click', function(e) {
        if (e.target === modal) modal.style.display = 'none';
    });
})();
</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\SPK_COPRAS\resources\views/dashboard/index.blade.php ENDPATH**/ ?>