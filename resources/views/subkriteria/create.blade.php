@extends('layouts.app')
@section('content')
<div class="space-y-5">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="page-title"><i class="fas fa-cubes mr-2" style="color:#21E6C1;"></i>Data Sub Kriteria</h1>
            <p class="page-subtitle">Tambah data sub kriteria baru</p>
        </div>
        <a href="{{ route('subkriteria.index') }}" class="btn-secondary">
            <i class="fas fa-angle-left"></i> Kembali
        </a>
    </div>

    <div class="content-card overflow-hidden">
        <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid rgba(33,230,193,0.1);">
            <i class="fas fa-pen-to-square" style="color:#21E6C1;"></i>
            <h2 class="font-bold" style="color:rgba(255,255,255,0.8);">Tambah Sub Kriteria untuk {{ $kriteria->nama }} ({{ $kriteria->kode }})</h2>
        </div>
        <form action="{{ route('subkriteria.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_kriteria" value="{{ $kriteria->id_kriteria }}">
            <div class="px-6 py-6 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="form-label">Nama Sub Kriteria</label>
                        <input type="text" name="nama_subkriteria" value="{{ old('nama_subkriteria') }}" class="form-input @error('nama_subkriteria') border-red-500 @enderror">
                        @error('nama_subkriteria')<p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Nilai</label>
                        <input type="number" name="nilai" value="{{ old('nilai') }}" class="form-input @error('nilai') border-red-500 @enderror">
                        @error('nilai')<p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
            <div class="px-6 pb-6 flex justify-end gap-3">
                <button type="reset" class="btn-secondary"><i class="fas fa-rotate"></i> Reset</button>
                <button type="submit" class="btn-primary"><i class="fas fa-floppy-disk"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection