@extends('layouts.app')
@section('content')
<div class="space-y-5">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="page-title"><i class="fas fa-users mr-2" style="color:#278EA5;"></i>Data Alternatif</h1>
            <p class="page-subtitle">Kelola data alternatif penilaian</p>
        </div>
        <a href="{{ route('alternatif.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>

    <div class="content-card overflow-hidden">
        <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid #E2E8F0;">
            <i class="fas fa-table" style="color:#278EA5;"></i>
            <h2 class="font-bold" style="color:#1E293B;">Daftar Data Alternatif</h2>
        </div>
        <div class="px-6 py-4 space-y-4">
            <div class="flex items-center justify-between gap-4">
                <form action="{{ route('alternatif.index') }}" method="GET" class="flex items-center gap-2">
                    <span class="text-xs font-semibold" style="color:#64748B;">Show</span>
                    <select name="entries" onchange="this.form.submit()" class="form-input" style="width:70px; padding:6px 10px;">
                        @foreach([5, 10, 15, 20] as $value)
                        <option value="{{ $value }}" {{ request('entries', 5) == $value ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    <span class="text-xs font-semibold" style="color:#64748B;">entries</span>
                </form>
                <form action="{{ route('alternatif.index') }}" method="GET" class="flex items-center gap-2">
                    <span class="text-xs font-semibold" style="color:#64748B;">Search:</span>
                    <input type="text" name="search" value="{{ request('search') }}" class="form-input" style="width:200px;">
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
                        @forelse($alternatifs as $index => $alternatif)
                        <tr>
                            <td>{{ $index + $alternatifs->firstItem() }}</td>
                            <td>{{ $alternatif->kode_alternatif }}</td>
                            <td>{{ $alternatif->nama_alternatif }}</td>
                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('alternatif.edit', $alternatif->id_alternatif) }}" class="btn-secondary" style="padding:6px 12px;">
                                        <i class="fas fa-pen-to-square"></i>
                                    </a>
                                    <button class="btn-danger" style="padding:6px 12px;" onclick="confirmDelete('{{ $alternatif->id_alternatif }}', '{{ $alternatif->nama_alternatif }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <form id="delete-form-{{ $alternatif->id_alternatif }}" action="{{ route('alternatif.destroy', $alternatif->id_alternatif) }}" method="POST" class="hidden">
                                        @csrf @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="color:#94A3B8; font-style:italic; padding:24px;">
                                @if(request('search'))
                                Tidak ada data yang cocok dengan "{{ request('search') }}"
                                @else
                                Belum ada data alternatif
                                @endif
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="flex items-center justify-between">
                <p class="text-xs font-semibold" style="color:#64748B;">
                    Showing {{ $alternatifs->firstItem() ?? 0 }} to {{ $alternatifs->lastItem() ?? 0 }} of {{ $alternatifs->total() }} entries
                </p>
                <div>{{ $alternatifs->appends(request()->query())->links('pagination.custom') }}</div>
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
            <p class="text-sm font-semibold" style="color:#475569;">Apakah Anda yakin ingin menghapus alternatif <span id="deleteItemName" class="font-black" style="color:#278EA5;"></span>?</p>
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
@endsection