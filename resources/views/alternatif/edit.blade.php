@extends('layouts.app')
@section('content')
<div class="space-y-5">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="page-title"><i class="fas fa-users mr-2" style="color:#278EA5;"></i>Data Alternatif</h1>
            <p class="page-subtitle">Edit data alternatif</p>
        </div>
        <a href="{{ route('alternatif.index') }}" class="btn-secondary">
            <i class="fas fa-angle-left"></i> Kembali
        </a>
    </div>

    <div class="content-card overflow-hidden">
        <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid #E2E8F0;">
            <i class="fas fa-pen-to-square" style="color:#278EA5;"></i>
            <h2 class="font-bold" style="color:#1E293B;">Edit Data Alternatif</h2>
        </div>
        <form action="{{ route('alternatif.update', $alternatif->id_alternatif) }}" method="POST">
            @csrf @method('PUT')
            <div class="px-6 py-6 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="form-label">Kode Alternatif</label>
                        <input type="text" name="kode_alternatif" value="{{ old('kode_alternatif', $alternatif->kode_alternatif) }}" class="form-input @error('kode_alternatif') border-red-500 @enderror" required>
                        @error('kode_alternatif')<p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Nama Alternatif</label>
                        <input type="text" name="nama_alternatif" value="{{ old('nama_alternatif', $alternatif->nama_alternatif) }}" class="form-input @error('nama_alternatif') border-red-500 @enderror" required>
                        @error('nama_alternatif')<p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>@enderror
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