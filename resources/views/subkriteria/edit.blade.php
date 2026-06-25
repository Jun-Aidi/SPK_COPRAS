@extends('layouts.app')
@section('content')
<div class="space-y-5">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="page-title"><i class="fas fa-cubes mr-2" style="color:#278EA5;"></i>Data Sub Kriteria</h1>
            <p class="page-subtitle">Edit data sub kriteria</p>
        </div>
        <a href="{{ route('subkriteria.index') }}" class="btn-secondary">
            <i class="fas fa-angle-left"></i> Kembali
        </a>
    </div>

    <div class="content-card overflow-hidden">
        <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid #E2E8F0;">
            <i class="fas fa-pen-to-square" style="color:#278EA5;"></i>
            <h2 class="font-bold" style="color:#1E293B;">Edit Sub Kriteria untuk {{ $kriteria->nama }} ({{ $kriteria->kode }})</h2>
        </div>
        <form action="{{ route('subkriteria.update', $subkriteria->id_subkriteria) }}" method="POST">
            @csrf @method('PUT')
            <div class="px-6 py-6 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="form-label">Nama Sub Kriteria</label>
                        <input type="text" name="nama_subkriteria" value="{{ old('nama_subkriteria', $subkriteria->nama_subkriteria) }}" class="form-input @error('nama_subkriteria') border-red-500 @enderror">
                        @error('nama_subkriteria')<p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Nilai</label>
                        <input type="number" name="nilai" value="{{ old('nilai', $subkriteria->nilai) }}" class="form-input @error('nilai') border-red-500 @enderror">
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