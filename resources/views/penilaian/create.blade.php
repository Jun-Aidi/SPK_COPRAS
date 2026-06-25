@extends('layouts.app')
@section('content')
<div class="space-y-5">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="page-title"><i class="fas fa-pen-to-square mr-2" style="color:#278EA5;"></i>Data Penilaian</h1>
            <p class="page-subtitle">Input penilaian untuk {{ $alternatif->nama_alternatif }}</p>
        </div>
        <a href="{{ route('penilaian.index') }}" class="btn-secondary">
            <i class="fas fa-angle-left"></i> Kembali
        </a>
    </div>

    <div class="content-card overflow-hidden">
        <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid #E2E8F0;">
            <i class="fas fa-pen-to-square" style="color:#278EA5;"></i>
            <h2 class="font-bold" style="color:#1E293B;">Input Penilaian: {{ $alternatif->nama_alternatif }}</h2>
        </div>
        <form action="{{ route('penilaian.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_alternatif" value="{{ $alternatif->id_alternatif }}">
            <div class="px-6 py-6 space-y-5">
                @foreach($kriterias as $kriteria)
                <div>
                    <label class="form-label">{{ $kriteria->nama }}</label>
                    <select name="nilai[{{ $kriteria->id_kriteria }}]" class="form-input" required>
                        <option value="" disabled selected>-- Pilih --</option>
                        @foreach($kriteria->subkriterias as $subkriteria)
                        <option value="{{ $subkriteria->id_subkriteria }}">
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