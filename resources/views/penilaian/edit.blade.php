@extends('layouts.app')
@section('content')
<div class="space-y-5">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="page-title"><i class="fas fa-pen-to-square mr-2" style="color:#21E6C1;"></i>Data Penilaian</h1>
            <p class="page-subtitle">Edit penilaian untuk {{ $alternatif->nama_alternatif }}</p>
        </div>
        <a href="{{ route('penilaian.index') }}" class="btn-secondary">
            <i class="fas fa-angle-left"></i> Kembali
        </a>
    </div>

    <div class="content-card overflow-hidden">
        <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid rgba(33,230,193,0.1);">
            <i class="fas fa-pen-to-square" style="color:#21E6C1;"></i>
            <h2 class="font-bold" style="color:rgba(255,255,255,0.8);">Edit Penilaian: {{ $alternatif->nama_alternatif }}</h2>
        </div>
        <form action="{{ route('penilaian.update') }}" method="POST">
            @csrf @method('PUT')
            <input type="hidden" name="id_alternatif" value="{{ $alternatif->id_alternatif }}">
            <div class="px-6 py-6 space-y-5">
                @foreach($kriterias as $kriteria)
                <div>
                    <label class="form-label">{{ $kriteria->nama }}</label>
                    <select name="nilai[{{ $kriteria->id_kriteria }}]" class="form-input" required>
                        <option value="" disabled>-- Pilih --</option>
                        @foreach($kriteria->subkriterias as $subkriteria)
                        <option value="{{ $subkriteria->id_subkriteria }}" {{ isset($kriteria->selected_subkriteria) && $kriteria->selected_subkriteria == $subkriteria->id_subkriteria ? 'selected' : '' }}>
                            {{ $subkriteria->nama_subkriteria }} (Nilai: {{ $subkriteria->nilai }})
                        </option>
                        @endforeach
                    </select>
                </div>
                @endforeach
            </div>
            <div class="px-6 pb-6 flex justify-end gap-3">
                <button type="reset" class="btn-secondary"><i class="fas fa-rotate"></i> Reset</button>
                <button type="submit" class="btn-primary"><i class="fas fa-floppy-disk"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection