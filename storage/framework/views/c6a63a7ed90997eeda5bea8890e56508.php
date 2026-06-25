
<?php $__env->startSection('content'); ?>
<div class="space-y-5">
    <div>
        <h1 class="page-title"><i class="fas fa-cubes mr-2" style="color:#278EA5;"></i>Data Sub Kriteria</h1>
        <p class="page-subtitle">Kelola data sub kriteria untuk setiap kriteria</p>
    </div>

    <?php if($kriterias->isEmpty()): ?>
    <div class="flex items-center gap-3 px-5 py-4 rounded-xl" style="background:rgba(251,207,109,0.1); border:1px solid rgba(251,207,109,0.25);">
        <i class="fas fa-exclamation-triangle" style="color:#fbbf24;"></i>
        <p class="text-sm font-semibold" style="color:#374151;">Data Kriteria masih kosong. Silahkan tambahkan data kriteria terlebih dahulu.</p>
    </div>
    <?php else: ?>
    <div class="space-y-5">
        <?php $__currentLoopData = $kriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center justify-between" style="border-bottom:1px solid #E2E8F0;">
                <div class="flex items-center gap-2">
                    <i class="fas fa-table" style="color:#278EA5;"></i>
                    <h2 class="font-bold" style="color:#1E293B;"><?php echo e($kriteria->nama); ?> <span style="color:#64748B;">(<?php echo e($kriteria->kode); ?>)</span></h2>
                </div>
                <a href="<?php echo e(route('subkriteria.create', ['kriteria_id' => $kriteria->id_kriteria])); ?>" class="btn-primary">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
            </div>
            <div class="px-6 py-4" style="overflow-x:auto;">
                <table class="tbl text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Sub Kriteria</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $kriteria->subkriterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $subkriteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($subkriteria->nama_subkriteria); ?></td>
                            <td><?php echo e($subkriteria->nilai); ?></td>
                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    <a href="<?php echo e(route('subkriteria.edit', $subkriteria->id_subkriteria)); ?>" class="btn-secondary" style="padding:6px 12px;">
                                        <i class="fas fa-pen-to-square"></i>
                                    </a>
                                    <button class="btn-danger" style="padding:6px 12px;" onclick="confirmDelete('<?php echo e($subkriteria->id_subkriteria); ?>', '<?php echo e($subkriteria->nama_subkriteria); ?>')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <form id="delete-form-<?php echo e($subkriteria->id_subkriteria); ?>" action="<?php echo e(route('subkriteria.destroy', $subkriteria->id_subkriteria)); ?>" method="POST" class="hidden">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" style="color:#94A3B8; font-style:italic; padding:24px;">Belum ada data sub kriteria untuk kriteria ini</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="fixed inset-0 hidden items-center justify-center z-50" style="background:rgba(0,0,0,0.35); backdrop-filter:blur(4px);">
    <div class="max-w-md w-full mx-4" style="background:#fff; border:1px solid #E2E8F0; border-radius:16px; overflow:hidden; box-shadow:0 20px 60px rgba(0,0,0,0.15);">
        <div class="px-6 py-5" style="border-bottom:1px solid #E2E8F0;">
            <h2 class="font-black text-lg" style="color:#071E3D;">Konfirmasi Penghapusan</h2>
        </div>
        <div class="px-6 py-5">
            <p class="text-sm font-semibold" style="color:#475569;">Apakah Anda yakin ingin menghapus sub kriteria <span id="deleteItemName" class="font-black" style="color:#278EA5;"></span>?</p>
        </div>
        <div class="px-6 pb-5 flex justify-end gap-3">
            <button type="button" onclick="closeDeleteModal()" class="btn-secondary"><i class="fas fa-xmark"></i> Batal</button>
            <button type="button" onclick="submitDelete()" class="btn-danger"><i class="fas fa-trash"></i> Hapus</button>
        </div>
    </div>
</div>

<script>
    let currentDeleteId = null;
    function confirmDelete(id, name) {
        currentDeleteId = id;
        document.getElementById('deleteItemName').textContent = name;
        const m = document.getElementById('deleteModal');
        m.classList.remove('hidden'); m.classList.add('flex');
    }
    function closeDeleteModal() {
        const m = document.getElementById('deleteModal');
        m.classList.add('hidden'); m.classList.remove('flex');
        currentDeleteId = null;
    }
    function submitDelete() {
        if (currentDeleteId) document.getElementById('delete-form-' + currentDeleteId).submit();
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\SPK_COPRAS\resources\views/subkriteria/index.blade.php ENDPATH**/ ?>