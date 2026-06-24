<?php $__env->startSection('content'); ?>
<div class="space-y-5">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="page-title"><i class="fas fa-users-gear mr-2" style="color:#21E6C1;"></i>Data User</h1>
            <p class="page-subtitle">Kelola akun pengguna sistem</p>
        </div>
        <a href="<?php echo e(route('user.create')); ?>" class="btn-primary">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>

    <div class="content-card overflow-hidden">
        <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid rgba(33,230,193,0.1);">
            <i class="fas fa-table" style="color:#21E6C1;"></i>
            <h2 class="font-bold" style="color:rgba(255,255,255,0.8);">Daftar Data User</h2>
        </div>
        <div class="px-6 py-4 space-y-4">
            <div class="flex items-center justify-between gap-4">
                <form action="<?php echo e(route('user.index')); ?>" method="GET" class="flex items-center gap-2">
                    <span class="text-xs font-semibold" style="color:rgba(255,255,255,0.4);">Show</span>
                    <select name="entries" onchange="this.form.submit()" class="form-input" style="width:70px; padding:6px 10px;">
                        <?php $__currentLoopData = [5, 10, 15, 20]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value); ?>" <?php echo e(request('entries', 5) == $value ? 'selected' : ''); ?>><?php echo e($value); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <span class="text-xs font-semibold" style="color:rgba(255,255,255,0.4);">entries</span>
                    <?php if(request('search')): ?><input type="hidden" name="search" value="<?php echo e(request('search')); ?>"><?php endif; ?>
                </form>
                <form action="<?php echo e(route('user.index')); ?>" method="GET" class="flex items-center gap-2">
                    <span class="text-xs font-semibold" style="color:rgba(255,255,255,0.4);">Search:</span>
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>" class="form-input" style="width:200px;">
                    <?php if(request('entries')): ?><input type="hidden" name="entries" value="<?php echo e(request('entries')); ?>"><?php endif; ?>
                    <button type="submit" class="btn-primary" style="padding:8px 12px;"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <div style="overflow-x:auto;">
                <table class="tbl text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>E-Mail</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($index + $users->firstItem()); ?></td>
                            <td><?php echo e($user->nama_lengkap); ?></td>
                            <td><?php echo e($user->username); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td>
                                <?php if($user->role === 'admin'): ?>
                                <span class="badge-admin"><?php echo e(ucfirst($user->role)); ?></span>
                                <?php else: ?>
                                <span class="badge-active"><?php echo e(ucfirst($user->role)); ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($user->status === 'Active'): ?>
                                <span class="badge-active"><?php echo e($user->status); ?></span>
                                <?php else: ?>
                                <span class="badge-inactive"><?php echo e($user->status); ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    <a href="<?php echo e(route('user.show', $user->id_user)); ?>" class="btn-primary" style="padding:6px 10px; background:rgba(39,142,165,0.2); color:#278EA5; border:1px solid rgba(39,142,165,0.3);" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?php echo e(route('user.edit', $user->id_user)); ?>" class="btn-secondary" style="padding:6px 10px;" title="Edit Data">
                                        <i class="fas fa-pen-to-square"></i>
                                    </a>
                                    <button class="btn-danger" style="padding:6px 10px;" onclick="confirmDelete('<?php echo e($user->id_user); ?>', '<?php echo e($user->nama_lengkap); ?>')" title="Hapus Data">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <form id="delete-form-<?php echo e($user->id_user); ?>" action="<?php echo e(route('user.destroy', $user->id_user)); ?>" method="POST" class="hidden">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" style="color:rgba(255,255,255,0.35); font-style:italic; padding:24px;">
                                <?php if(request('search')): ?>
                                Tidak ada user yang cocok dengan "<?php echo e(request('search')); ?>"
                                <?php else: ?>
                                Belum ada data user
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="flex items-center justify-between">
                <p class="text-xs font-semibold" style="color:rgba(255,255,255,0.4);">
                    Showing <?php echo e($users->firstItem() ?? 0); ?> to <?php echo e($users->lastItem() ?? 0); ?> of <?php echo e($users->total()); ?> entries
                    <?php if(request('search')): ?>(filtered)<?php endif; ?>
                </p>
                <div><?php echo e($users->appends(request()->query())->links('pagination.custom')); ?></div>
            </div>
        </div>
    </div>
</div>

<div id="deleteModal" class="fixed inset-0 hidden items-center justify-center z-50" style="background:rgba(7,30,61,0.75); backdrop-filter:blur(6px);">
    <div class="max-w-md w-full mx-4" style="background:rgba(7,30,61,0.95); border:1px solid rgba(33,230,193,0.2); border-radius:16px; overflow:hidden;">
        <div class="px-6 py-5" style="border-bottom:1px solid rgba(33,230,193,0.1);">
            <h2 class="font-black text-lg" style="color:#fff;">Konfirmasi Penghapusan</h2>
        </div>
        <div class="px-6 py-5">
            <p class="text-sm font-semibold" style="color:rgba(255,255,255,0.6);">Apakah Anda yakin ingin menghapus user <span id="deleteItemName" class="font-black" style="color:#21E6C1;"></span>?</p>
            <p class="text-xs mt-2" style="color:#fca5a5;">Tindakan ini tidak dapat dibatalkan.</p>
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
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) closeDeleteModal();
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeDeleteModal();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\SPK_COPRAS\resources\views/user/index.blade.php ENDPATH**/ ?>