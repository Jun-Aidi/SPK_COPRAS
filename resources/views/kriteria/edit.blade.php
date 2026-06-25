@extends('layouts.app')
@section('content')
<div class="space-y-5">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="page-title"><i class="fas fa-cube mr-2" style="color:#278EA5;"></i>Data Kriteria</h1>
            <p class="page-subtitle">Edit data kriteria</p>
        </div>
        <a href="{{ route('kriteria.index') }}" class="btn-secondary">
            <i class="fas fa-angle-left"></i> Kembali
        </a>
    </div>

    <div class="content-card overflow-hidden">
        <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid #E2E8F0;">
            <i class="fas fa-pen-to-square" style="color:#278EA5;"></i>
            <h2 class="font-bold" style="color:#1E293B;">Edit Data Kriteria</h2>
        </div>
        <form action="{{ route('kriteria.update', $kriteria->id_kriteria) }}" method="POST">
            @csrf @method('PUT')
            <div class="px-6 py-6 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="form-label">Kode Kriteria</label>
                        <input type="text" name="kode" value="{{ old('kode', $kriteria->kode) }}" class="form-input @error('kode') border-red-500 @enderror" required>
                        @error('kode')<p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Nama Kriteria</label>
                        <input type="text" name="nama" value="{{ old('nama', $kriteria->nama) }}" class="form-input @error('nama') border-red-500 @enderror" required>
                        @error('nama')<p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Bobot Kriteria</label>
                        <input type="number" name="bobot" value="{{ old('bobot', $kriteria->bobot) }}" step="0.01" min="0" max="100" class="form-input @error('bobot') border-red-500 @enderror" required>
                        @error('bobot')<p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Jenis Kriteria</label>
                        <select name="jenis" class="form-input @error('jenis') border-red-500 @enderror" required>
                            <option value="" disabled>-- Pilih --</option>
                            <option value="Benefit" {{ old('jenis', $kriteria->jenis) == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                            <option value="Cost" {{ old('jenis', $kriteria->jenis) == 'Cost' ? 'selected' : '' }}>Cost</option>
                        </select>
                        @error('jenis')<p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>@enderror
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