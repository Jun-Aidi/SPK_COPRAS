<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Page Header -->
    <div>
        <h1 class="page-title"><i class="fas fa-house-chimney mr-2"></i>Dashboard</h1>
        <p class="page-subtitle">Selamat datang kembali, <span style="color:#21E6C1;font-weight:700;"><?php echo e(auth()->user()->username); ?></span>!</p>
    </div>

    <!-- Welcome Banner -->
    <div id="welcomeAlert" class="flex justify-between items-center px-5 py-4 rounded-xl"
         style="background:rgba(33,230,193,0.08); border:1px solid rgba(33,230,193,0.2);">
        <div class="flex items-center gap-3">
            <i class="fas fa-circle-info" style="color:#21E6C1;"></i>
            <p class="text-sm font-semibold" style="color:rgba(255,255,255,0.7);">
                Silakan gunakan menu di sidebar untuk mengakses fitur yang tersedia.
            </p>
        </div>
        <i class="fas fa-xmark cursor-pointer" style="color:rgba(255,255,255,0.35);"
           onclick="document.getElementById('welcomeAlert').remove()"
           onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.35)'"></i>
    </div>

    <!-- Menu Cards -->
    <?php if(auth()->user()->isAdmin()): ?>
    <!-- Admin cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="<?php echo e(route('kriteria.index')); ?>" class="group content-card p-6 flex items-center justify-between transition-all duration-200 hover:border-cyan-400"
           style="border-left: 3px solid #21E6C1; text-decoration:none;">
            <div>
                <p class="text-xs font-bold mb-1" style="color:rgba(255,255,255,0.4); letter-spacing:0.05em;">MASTER DATA</p>
                <h2 class="text-base font-black" style="color:#fff;">Data Kriteria</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(33,230,193,0.1);">
                <i class="fas fa-cube text-xl" style="color:#21E6C1;"></i>
            </div>
        </a>
        <a href="<?php echo e(route('subkriteria.index')); ?>" class="group content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left: 3px solid #278EA5; text-decoration:none;">
            <div>
                <p class="text-xs font-bold mb-1" style="color:rgba(255,255,255,0.4); letter-spacing:0.05em;">MASTER DATA</p>
                <h2 class="text-base font-black" style="color:#fff;">Data Sub Kriteria</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(39,142,165,0.1);">
                <i class="fas fa-cubes text-xl" style="color:#278EA5;"></i>
            </div>
        </a>
        <a href="<?php echo e(route('alternatif.index')); ?>" class="group content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left: 3px solid #1F4287; text-decoration:none;">
            <div>
                <p class="text-xs font-bold mb-1" style="color:rgba(255,255,255,0.4); letter-spacing:0.05em;">MASTER DATA</p>
                <h2 class="text-base font-black" style="color:#fff;">Data Alternatif</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(31,66,135,0.2);">
                <i class="fas fa-users text-xl" style="color:#7aa7f5;"></i>
            </div>
        </a>
        <a href="<?php echo e(route('penilaian.index')); ?>" class="group content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left: 3px solid #278EA5; text-decoration:none;">
            <div>
                <p class="text-xs font-bold mb-1" style="color:rgba(255,255,255,0.4); letter-spacing:0.05em;">MASTER DATA</p>
                <h2 class="text-base font-black" style="color:#fff;">Data Penilaian</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(39,142,165,0.1);">
                <i class="fas fa-pen-to-square text-xl" style="color:#278EA5;"></i>
            </div>
        </a>
        <a href="<?php echo e(route('perhitungan.index')); ?>" class="group content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left: 3px solid #21E6C1; text-decoration:none;">
            <div>
                <p class="text-xs font-bold mb-1" style="color:rgba(255,255,255,0.4); letter-spacing:0.05em;">PROSES</p>
                <h2 class="text-base font-black" style="color:#fff;">Data Perhitungan</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(33,230,193,0.1);">
                <i class="fas fa-calculator text-xl" style="color:#21E6C1;"></i>
            </div>
        </a>
        <a href="<?php echo e(route('hasilakhir.index')); ?>" class="group content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left: 3px solid #21E6C1; text-decoration:none;">
            <div>
                <p class="text-xs font-bold mb-1" style="color:rgba(255,255,255,0.4); letter-spacing:0.05em;">OUTPUT</p>
                <h2 class="text-base font-black" style="color:#fff;">Data Hasil Akhir</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(33,230,193,0.1);">
                <i class="fas fa-chart-line text-xl" style="color:#21E6C1;"></i>
            </div>
        </a>
    </div>
    <?php else: ?>
    <!-- User cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="<?php echo e(route('hasilakhir.index')); ?>" class="content-card p-6 flex items-center justify-between"
           style="border-left:3px solid #21E6C1; text-decoration:none;">
            <div>
                <p class="text-xs font-bold mb-1" style="color:rgba(255,255,255,0.4);">OUTPUT</p>
                <h2 class="text-base font-black" style="color:#fff;">Data Hasil Akhir</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(33,230,193,0.1);">
                <i class="fas fa-chart-line text-xl" style="color:#21E6C1;"></i>
            </div>
        </a>
        <a href="<?php echo e(route('profile.index')); ?>" class="content-card p-6 flex items-center justify-between"
           style="border-left:3px solid #278EA5; text-decoration:none;">
            <div>
                <p class="text-xs font-bold mb-1" style="color:rgba(255,255,255,0.4);">AKUN</p>
                <h2 class="text-base font-black" style="color:#fff;">Data Profile</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(39,142,165,0.1);">
                <i class="fas fa-user text-xl" style="color:#278EA5;"></i>
            </div>
        </a>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\SPK_COPRAS\resources\views/dashboard/index.blade.php ENDPATH**/ ?>