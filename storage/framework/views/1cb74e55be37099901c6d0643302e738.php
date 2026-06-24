<?php $__env->startSection('content'); ?>
<div class="space-y-5">
    <div>
        <h1 class="page-title"><i class="fas fa-chart-line mr-2" style="color:#21E6C1;"></i>Data Hasil Akhir</h1>
        <p class="page-subtitle">Hasil perangkingan metode COPRAS</p>
    </div>

    <?php if($kriterias->isEmpty() || $alternatifs->isEmpty()): ?>
    <div class="flex items-center gap-3 px-5 py-4 rounded-xl" style="background:rgba(251,207,109,0.1); border:1px solid rgba(251,207,109,0.25);">
        <i class="fas fa-exclamation-triangle" style="color:#fbbf24;"></i>
        <p class="text-sm font-semibold" style="color:rgba(255,255,255,0.7);">Data Kriteria atau Alternatif masih kosong. Silahkan tambahkan data terlebih dahulu.</p>
    </div>
    <?php else: ?>
    <div class="content-card overflow-hidden">
        <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid rgba(33,230,193,0.1);">
            <i class="fas fa-trophy" style="color:#21E6C1;"></i>
            <h2 class="font-bold" style="color:rgba(255,255,255,0.8);">Hasil Akhir Perangkingan</h2>
        </div>
        <div class="px-6 py-4" style="overflow-x:auto;">
            <table class="tbl text-center">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th style="text-align:left;">Nama Alternatif</th>
                        <th>Nilai Utilitas (%)</th>
                        <th>Peringkat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $finalRanking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($row['kode_alternatif']); ?></td>
                        <td style="text-align:left;"><?php echo e($row['nama_alternatif']); ?></td>
                        <td>
                            <div class="flex items-center justify-center gap-3">
                                <div class="flex-1 rounded-full overflow-hidden" style="background:rgba(255,255,255,0.05); height:6px; max-width:120px;">
                                    <div style="width:<?php echo e($row['nilai_u']); ?>%; height:100%; background:linear-gradient(90deg,#278EA5,#21E6C1); border-radius:999px;"></div>
                                </div>
                                <span class="font-bold text-sm" style="color:#21E6C1; min-width:50px;"><?php echo e($row['nilai_u']); ?>%</span>
                            </div>
                        </td>
                        <td>
                            <?php if($row['rank'] == 1): ?>
                            <span class="badge-active" style="background:rgba(255,215,0,0.15); color:#ffd700; border-color:rgba(255,215,0,0.3);">
                                <i class="fas fa-crown mr-1"></i>#<?php echo e($row['rank']); ?>

                            </span>
                            <?php elseif($row['rank'] <= 3): ?>
                            <span class="badge-active">#<?php echo e($row['rank']); ?></span>
                            <?php else: ?>
                            <span class="badge-admin">#<?php echo e($row['rank']); ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\SPK_COPRAS\resources\views/hasilakhir/index.blade.php ENDPATH**/ ?>