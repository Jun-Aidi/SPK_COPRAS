<?php $__env->startSection('content'); ?>
<div class="space-y-5">
    <div>
        <h1 class="page-title"><i class="fas fa-calculator mr-2" style="color:#21E6C1;"></i>Data Perhitungan</h1>
        <p class="page-subtitle">Langkah-langkah perhitungan metode COPRAS</p>
    </div>

    <?php if($kriterias->isEmpty() || $alternatifs->isEmpty()): ?>
    <div class="flex items-center gap-3 px-5 py-4 rounded-xl" style="background:rgba(251,207,109,0.1); border:1px solid rgba(251,207,109,0.25);">
        <i class="fas fa-exclamation-triangle" style="color:#fbbf24;"></i>
        <p class="text-sm font-semibold" style="color:rgba(255,255,255,0.7);">Data Kriteria atau Alternatif masih kosong. Silahkan tambahkan data terlebih dahulu.</p>
    </div>
    <?php else: ?>
    <div class="space-y-5">

        
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid rgba(33,230,193,0.1);">
                <i class="fas fa-table" style="color:#21E6C1;"></i>
                <h2 class="font-bold" style="color:rgba(255,255,255,0.8);">Matriks Keputusan</h2>
            </div>
            <div class="px-6 py-4" style="overflow-x:auto;">
                <table class="tbl text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="text-align:left;">Alternatif</th>
                            <?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><th><?php echo e($k->kode); ?></th><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $matriksKeputusan['matriks']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $alt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i + 1); ?></td>
                            <td style="text-align:left;"><?php echo e($alt['nama_alternatif']); ?></td>
                            <?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><td><?php echo e($alt['nilai'][$k->id_kriteria]); ?></td><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr style="background:rgba(33,230,193,0.06);">
                            <td colspan="2" class="font-bold" style="color:#21E6C1;">Total</td>
                            <?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><td class="font-bold" style="color:#21E6C1;"><?php echo e($matriksKeputusan['total'][$k->id_kriteria]); ?></td><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid rgba(33,230,193,0.1);">
                <i class="fas fa-table" style="color:#21E6C1;"></i>
                <h2 class="font-bold" style="color:rgba(255,255,255,0.8);">Normalisasi Matriks</h2>
            </div>
            <div class="px-6 py-4" style="overflow-x:auto;">
                <table class="tbl text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="text-align:left;">Alternatif</th>
                            <?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><th><?php echo e($k->kode); ?></th><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $normalisasiMatriks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $alt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i + 1); ?></td>
                            <td style="text-align:left;"><?php echo e($alt['nama_alternatif']); ?></td>
                            <?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><td><?php echo e($alt['nilai'][$k->id_kriteria]); ?></td><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

        
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid rgba(33,230,193,0.1);">
                <i class="fas fa-table" style="color:#21E6C1;"></i>
                <h2 class="font-bold" style="color:rgba(255,255,255,0.8);">Bobot Kriteria</h2>
            </div>
            <div class="px-6 py-4" style="overflow-x:auto;">
                <table class="tbl text-center">
                    <thead>
                        <tr>
                            <?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><th><?php echo e($k->kode); ?></th><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><td><?php echo e($bobotKriteria[$k->id_kriteria]); ?></td><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid rgba(33,230,193,0.1);">
                <i class="fas fa-table" style="color:#21E6C1;"></i>
                <h2 class="font-bold" style="color:rgba(255,255,255,0.8);">Matriks Ternormalisasi Terbobot</h2>
            </div>
            <div class="px-6 py-4" style="overflow-x:auto;">
                <table class="tbl text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="text-align:left;">Alternatif</th>
                            <?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><th><?php echo e($k->kode); ?></th><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $matriksTernormalisasiTerbobot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $alt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i + 1); ?></td>
                            <td style="text-align:left;"><?php echo e($alt['nama_alternatif']); ?></td>
                            <?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><td><?php echo e($alt['nilai'][$k->id_kriteria]); ?></td><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr style="background:rgba(33,230,193,0.06);">
                            <td colspan="2" class="font-bold" style="color:#21E6C1;">Jenis</td>
                            <?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><td class="font-bold" style="color:<?php echo e(strtolower($k->jenis)=='benefit'?'#21E6C1':'#fca5a5'); ?>;"><?php echo e(strtolower($k->jenis) == 'benefit' ? 'MAX' : 'MIN'); ?></td><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid rgba(33,230,193,0.1);">
                <i class="fas fa-table" style="color:#21E6C1;"></i>
                <h2 class="font-bold" style="color:rgba(255,255,255,0.8);">Nilai S+ (MAX)</h2>
            </div>
            <div class="px-6 py-4" style="overflow-x:auto;">
                <table class="tbl text-center">
                    <thead><tr><th>No</th><th style="text-align:left;">Alternatif</th><th>Nilai S+</th></tr></thead>
                    <tbody>
                        <?php $__currentLoopData = $sPlus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i + 1); ?></td>
                            <td style="text-align:left;"><?php echo e($row['nama_alternatif']); ?></td>
                            <td><?php echo e($row['nilai']); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

        
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid rgba(33,230,193,0.1);">
                <i class="fas fa-table" style="color:#21E6C1;"></i>
                <h2 class="font-bold" style="color:rgba(255,255,255,0.8);">Nilai S- (MIN)</h2>
            </div>
            <div class="px-6 py-4" style="overflow-x:auto;">
                <table class="tbl text-center">
                    <thead><tr><th>No</th><th style="text-align:left;">Alternatif</th><th>Nilai S-</th></tr></thead>
                    <tbody>
                        <?php $__currentLoopData = $sMinusData['sMinus']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i + 1); ?></td>
                            <td style="text-align:left;"><?php echo e($row['nama_alternatif']); ?></td>
                            <td><?php echo e($row['nilai']); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr style="background:rgba(33,230,193,0.06);">
                            <td colspan="2" class="font-bold" style="color:#21E6C1;">Total</td>
                            <td class="font-bold" style="color:#21E6C1;"><?php echo e($sMinusData['total']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid rgba(33,230,193,0.1);">
                <i class="fas fa-table" style="color:#21E6C1;"></i>
                <h2 class="font-bold" style="color:rgba(255,255,255,0.8);">Bobot Relatif Tiap Kriteria</h2>
            </div>
            <div class="px-6 py-4" style="overflow-x:auto;">
                <table class="tbl text-center">
                    <thead><tr><th>No</th><th style="text-align:left;">Alternatif</th><th>1/S-</th><th>S- × Total 1/S-</th></tr></thead>
                    <tbody>
                        <?php $__currentLoopData = $relativeWeightData['weights']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i + 1); ?></td>
                            <td style="text-align:left;"><?php echo e($row['nama_alternatif']); ?></td>
                            <td><?php echo e($row['inverse']); ?></td>
                            <td><?php echo round($sMinusData['sMinus'][$i]['nilai'] * $relativeWeightData['sumInverse'], 4); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr style="background:rgba(33,230,193,0.06);">
                            <td colspan="2" class="font-bold" style="color:#21E6C1;">Total</td>
                            <td class="font-bold" style="color:#21E6C1;"><?php echo e($relativeWeightData['sumInverse']); ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid rgba(33,230,193,0.1);">
                <i class="fas fa-table" style="color:#21E6C1;"></i>
                <h2 class="font-bold" style="color:rgba(255,255,255,0.8);">Nilai Signifikasi Prioritas Relatif (Qi)</h2>
            </div>
            <div class="px-6 py-4 space-y-4" style="overflow-x:auto;">
                <table class="tbl text-center">
                    <thead><tr><th>No</th><th style="text-align:left;">Alternatif</th><th>Nilai Qi</th></tr></thead>
                    <tbody>
                        <?php $__currentLoopData = $relativeWeightData['weights']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i + 1); ?></td>
                            <td style="text-align:left;"><?php echo e($row['nama_alternatif']); ?></td>
                            <td><?php echo e($row['nilai']); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="flex items-center gap-3 px-5 py-3 rounded-xl" style="background:rgba(33,230,193,0.08); border:1px solid rgba(33,230,193,0.2);">
                    <i class="fas fa-info-circle" style="color:#21E6C1;"></i>
                    <p class="text-sm font-bold" style="color:#21E6C1;">Nilai Max Qi = <?php echo e($utilityDegreeData['maxQ']); ?></p>
                </div>
            </div>
        </div>

        
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid rgba(33,230,193,0.1);">
                <i class="fas fa-table" style="color:#21E6C1;"></i>
                <h2 class="font-bold" style="color:rgba(255,255,255,0.8);">Nilai Utilitas Kuantitatif (Ui)</h2>
            </div>
            <div class="px-6 py-4" style="overflow-x:auto;">
                <?php
                $utilityDegreesUnsorted = [];
                foreach($utilityDegreeData['utility'] as $item) {
                    $utilityDegreesUnsorted[] = $item;
                }
                usort($utilityDegreesUnsorted, function ($a, $b) {
                    return $a['id_alternatif'] <=> $b['id_alternatif'];
                });
                ?>
                <table class="tbl text-center">
                    <thead><tr><th>No</th><th style="text-align:left;">Alternatif</th><th>Nilai Ui (%)</th></tr></thead>
                    <tbody>
                        <?php $__currentLoopData = $utilityDegreesUnsorted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i + 1); ?></td>
                            <td style="text-align:left;"><?php echo e($row['nama_alternatif']); ?></td>
                            <td class="font-bold" style="color:#21E6C1;"><?php echo e($row['nilai_u']); ?>%</td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\SPK_COPRAS\resources\views/perhitungan/index.blade.php ENDPATH**/ ?>