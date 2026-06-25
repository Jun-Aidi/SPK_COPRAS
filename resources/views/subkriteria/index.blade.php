@extends('layouts.app')
@section('content')
<div class="space-y-5">
    <div>
        <h1 class="page-title"><i class="fas fa-cubes mr-2" style="color:#278EA5;"></i>Data Sub Kriteria</h1>
        <p class="page-subtitle">Kelola data sub kriteria untuk setiap kriteria</p>
    </div>

    @if($kriterias->isEmpty())
    <div class="flex items-center gap-3 px-5 py-4 rounded-xl" style="background:rgba(251,207,109,0.1); border:1px solid rgba(251,207,109,0.25);">
        <i class="fas fa-exclamation-triangle" style="color:#fbbf24;"></i>
        <p class="text-sm font-semibold" style="color:#374151;">Data Kriteria masih kosong. Silahkan tambahkan data kriteria terlebih dahulu.</p>
    </div>
    @else
    <div class="space-y-5">
        @foreach($kriterias as $kriteria)
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center justify-between" style="border-bottom:1px solid #E2E8F0;">
                <div class="flex items-center gap-2">
                    <i class="fas fa-table" style="color:#278EA5;"></i>
                    <h2 class="font-bold" style="color:#1E293B;">{{ $kriteria->nama }} <span style="color:#64748B;">({{ $kriteria->kode }})</span></h2>
                </div>
                <a href="{{ route('subkriteria.create', ['kriteria_id' => $kriteria->id_kriteria]) }}" class="btn-primary">
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
                        @forelse($kriteria->subkriterias as $index => $subkriteria)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $subkriteria->nama_subkriteria }}</td>
                            <td>{{ $subkriteria->nilai }}</td>
                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('subkriteria.edit', $subkriteria->id_subkriteria) }}" class="btn-secondary" style="padding:6px 12px;">
                                        <i class="fas fa-pen-to-square"></i>
                                    </a>
                                    <button class="btn-danger" style="padding:6px 12px;" onclick="confirmDelete('{{ $subkriteria->id_subkriteria }}', '{{ $subkriteria->nama_subkriteria }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <form id="delete-form-{{ $subkriteria->id_subkriteria }}" action="{{ route('subkriteria.destroy', $subkriteria->id_subkriteria) }}" method="POST" class="hidden">
                                        @csrf @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="color:#94A3B8; font-style:italic; padding:24px;">Belum ada data sub kriteria untuk kriteria ini</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
    </div>
    @endif
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
@endsection