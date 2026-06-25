@extends('layouts.app')
@section('content')
<div class="space-y-5">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="page-title"><i class="fas fa-users-gear mr-2" style="color:#278EA5;"></i>Data User</h1>
            <p class="page-subtitle">Kelola akun pengguna sistem</p>
        </div>
        <a href="{{ route('user.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>

    <div class="content-card overflow-hidden">
        <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid #E2E8F0;">
            <i class="fas fa-table" style="color:#278EA5;"></i>
            <h2 class="font-bold" style="color:#1E293B;">Daftar Data User</h2>
        </div>
        <div class="px-6 py-4 space-y-4">
            <div class="flex items-center justify-between gap-4">
                <form action="{{ route('user.index') }}" method="GET" class="flex items-center gap-2">
                    <span class="text-xs font-semibold" style="color:#64748B;">Show</span>
                    <select name="entries" onchange="this.form.submit()" class="form-input" style="width:70px; padding:6px 10px;">
                        @foreach([5, 10, 15, 20] as $value)
                        <option value="{{ $value }}" {{ request('entries', 5) == $value ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    <span class="text-xs font-semibold" style="color:#64748B;">entries</span>
                    @if(request('search'))<input type="hidden" name="search" value="{{ request('search') }}">@endif
                </form>
                <form action="{{ route('user.index') }}" method="GET" class="flex items-center gap-2">
                    <span class="text-xs font-semibold" style="color:#64748B;">Search:</span>
                    <input type="text" name="search" value="{{ request('search') }}" class="form-input" style="width:200px;">
                    @if(request('entries'))<input type="hidden" name="entries" value="{{ request('entries') }}">@endif
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
                        @forelse($users as $index => $user)
                        <tr>
                            <td>{{ $index + $users->firstItem() }}</td>
                            <td>{{ $user->nama_lengkap }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->role === 'admin')
                                <span class="badge-admin">{{ ucfirst($user->role) }}</span>
                                @else
                                <span class="badge-active">{{ ucfirst($user->role) }}</span>
                                @endif
                            </td>
                            <td>
                                @if($user->status === 'Active')
                                <span class="badge-active">{{ $user->status }}</span>
                                @else
                                <span class="badge-inactive">{{ $user->status }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('user.show', $user->id_user) }}" class="btn-primary" style="padding:6px 10px; background:rgba(39,142,165,0.2); color:#278EA5; border:1px solid rgba(39,142,165,0.3);" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('user.edit', $user->id_user) }}" class="btn-secondary" style="padding:6px 10px;" title="Edit Data">
                                        <i class="fas fa-pen-to-square"></i>
                                    </a>
                                    <button class="btn-danger" style="padding:6px 10px;" onclick="confirmDelete('{{ $user->id_user }}', '{{ $user->nama_lengkap }}')" title="Hapus Data">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <form id="delete-form-{{ $user->id_user }}" action="{{ route('user.destroy', $user->id_user) }}" method="POST" class="hidden">
                                        @csrf @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" style="color:#94A3B8; font-style:italic; padding:24px;">
                                @if(request('search'))
                                Tidak ada user yang cocok dengan "{{ request('search') }}"
                                @else
                                Belum ada data user
                                @endif
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="flex items-center justify-between">
                <p class="text-xs font-semibold" style="color:#64748B;">
                    Showing {{ $users->firstItem() ?? 0 }} to {{ $users->lastItem() ?? 0 }} of {{ $users->total() }} entries
                    @if(request('search'))(filtered)@endif
                </p>
                <div>{{ $users->appends(request()->query())->links('pagination.custom') }}</div>
            </div>
        </div>
    </div>
</div>

<div id="deleteModal" class="fixed inset-0 hidden items-center justify-center z-50" style="background:rgba(0,0,0,0.35); backdrop-filter:blur(4px);">
    <div class="max-w-md w-full mx-4" style="background:#fff; border:1px solid #E2E8F0; border-radius:16px; overflow:hidden; box-shadow:0 20px 60px rgba(0,0,0,0.15);">
        <div class="px-6 py-5" style="border-bottom:1px solid #E2E8F0;">
            <h2 class="font-black text-lg" style="color:#071E3D;">Konfirmasi Penghapusan</h2>
        </div>
        <div class="px-6 py-5">
            <p class="text-sm font-semibold" style="color:#475569;">Apakah Anda yakin ingin menghapus user <span id="deleteItemName" class="font-black" style="color:#278EA5;"></span>?</p>
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
@endsection