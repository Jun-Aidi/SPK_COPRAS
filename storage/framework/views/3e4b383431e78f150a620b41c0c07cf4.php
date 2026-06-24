<?php $__env->startSection('content'); ?>
<div class="space-y-5">
    <div>
        <h1 class="page-title"><i class="fas fa-pen-to-square mr-2" style="color:#21E6C1;"></i>Data Penilaian</h1>
        <p class="page-subtitle">Input penilaian untuk setiap alternatif</p>
    </div>

    <?php if($totalAlternatifs == 0): ?>
    <div class="flex items-center gap-3 px-5 py-4 rounded-xl" style="background:rgba(251,207,109,0.1); border:1px solid rgba(251,207,109,0.25);">
        <i class="fas fa-exclamation-triangle" style="color:#fbbf24;"></i>
        <p class="text-sm font-semibold" style="color:rgba(255,255,255,0.7);">Data Alternatif masih kosong. Silahkan tambahkan data alternatif terlebih dahulu.</p>
    </div>
    <?php else: ?>
    <div class="content-card overflow-hidden">
        <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid rgba(33,230,193,0.1);">
            <i class="fas fa-table" style="color:#21E6C1;"></i>
            <h2 class="font-bold" style="color:rgba(255,255,255,0.8);">Daftar Data Penilaian</h2>
        </div>
        <div class="px-6 py-4 space-y-4">
            <div class="flex items-center justify-between gap-4">
                <form action="<?php echo e(route('penilaian.index')); ?>" method="GET" class="flex items-center gap-2">
                    <span class="text-xs font-semibold" style="color:rgba(255,255,255,0.4);">Show</span>
                    <select name="entries" onchange="this.form.submit()" class="form-input" style="width:70px; padding:6px 10px;">
                        <?php $__currentLoopData = [5, 10, 15, 20]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value); ?>" <?php echo e(request('entries', 5) == $value ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <span class="text-xs font-semibold" style="color:rgba(255,255,255,0.4);">entries</span>
                </form>
                <form action="<?php echo e(route('penilaian.index')); ?>" method="GET" class="flex items-center gap-2">
                    <span class="text-xs font-semibold" style="color:rgba(255,255,255,0.4);">Search:</span>
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>" class="form-input" style="width:200px;">
                    <button type="submit" class="btn-primary" style="padding:8px 12px;"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <div style="overflow-x:auto;">
                <table class="tbl text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Alternatif</th>
                            <th>Nama Alternatif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $alternatifs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $alternatif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($index + $alternatifs->firstItem()); ?></td>
                            <td><?php echo e($alternatif->kode_alternatif); ?></td>
                            <td><?php echo e($alternatif->nama_alternatif); ?></td>
                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    <?php if($alternatif->has_nilai): ?>
                                    <a href="<?php echo e(route('penilaian.edit', ['id' => $alternatif->id_alternatif])); ?>" class="btn-secondary" style="padding:6px 16px;">
                                        <i class="fas fa-pen-to-square"></i> Edit
                                    </a>
                                    <button class="btn-danger" style="padding:6px 16px;" onclick="confirmDelete('<?php echo e($alternatif->id_alternatif); ?>', '<?php echo e($alternatif->nama_alternatif); ?>')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                    <form id="delete-form-<?php echo e($alternatif->id_alternatif); ?>" action="<?php echo e(route('penilaian.destroy', $alternatif->id_alternatif)); ?>" method="POST" class="hidden">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    </form>
                                    <?php else: ?>
                                    <a href="<?php echo e(route('penilaian.create', ['id' => $alternatif->id_alternatif])); ?>" class="btn-primary" style="padding:6px 16px;">
                                        <i class="fas fa-plus"></i> Input
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" style="color:rgba(255,255,255,0.35); font-style:italic; padding:24px;">
                                <?php if(request('search')): ?>
                                Tidak ada data yang cocok dengan "<?php echo e(request('search')); ?>"
                                <?php else: ?>
                                Belum ada data
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="flex items-center justify-between">
                <p class="text-xs font-semibold" style="color:rgba(255,255,255,0.4);">
                    Showing <?php echo e($alternatifs->firstItem() ?? 0); ?> to <?php echo e($alternatifs->lastItem() ?? 0); ?> of <?php echo e($alternatifs->total()); ?> entries
                </p>
                <div><?php echo e($alternatifs->appends(request()->query())->links('pagination.custom')); ?></div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<div id="deleteModal" class="fixed inset-0 hidden items-center justify-center z-50" style="background:rgba(7,30,61,0.75); backdrop-filter:blur(6px);">
    <div class="max-w-md w-full mx-4" style="background:rgba(7,30,61,0.95); border:1px solid rgba(33,230,193,0.2); border-radius:16px; overflow:hidden;">
        <div class="px-6 py-5" style="border-bottom:1px solid rgba(33,230,193,0.1);">
            <h2 class="font-black text-lg" style="color:#fff;">Konfirmasi Penghapusan</h2>
        </div>
        <div class="px-6 py-5">
            <p class="text-sm font-semibold" style="color:rgba(255,255,255,0.6);">Apakah Anda yakin ingin menghapus penilaian untuk <span id="deleteItemName" class="font-black" style="color:#21E6C1;"></span>?</p>
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\SPK_COPRAS\resources\views/penilaian/index.blade.php ENDPATH**/ ?>