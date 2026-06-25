@extends('layouts.app')
@section('content')
<div class="space-y-5">
    <div>
        <h1 class="page-title"><i class="fas fa-calculator mr-2" style="color:#278EA5;"></i>Data Perhitungan</h1>
        <p class="page-subtitle">Langkah-langkah perhitungan metode COPRAS</p>
    </div>

    @if($kriterias->isEmpty() || $alternatifs->isEmpty())
    <div class="flex items-center gap-3 px-5 py-4 rounded-xl" style="background:rgba(251,207,109,0.1); border:1px solid rgba(251,207,109,0.25);">
        <i class="fas fa-exclamation-triangle" style="color:#fbbf24;"></i>
        <p class="text-sm font-semibold" style="color:#374151;">Data Kriteria atau Alternatif masih kosong. Silahkan tambahkan data terlebih dahulu.</p>
    </div>
    @else
    <div class="space-y-5">

        {{-- Matriks Keputusan --}}
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid #E2E8F0;">
                <i class="fas fa-table" style="color:#278EA5;"></i>
                <h2 class="font-bold" style="color:#1E293B;">Matriks Keputusan</h2>
            </div>
            <div class="px-6 py-4" style="overflow-x:auto;">
                <table class="tbl text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="text-align:left;">Alternatif</th>
                            @foreach($kriterias as $k)<th>{{ $k->kode }}</th>@endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matriksKeputusan['matriks'] as $i => $alt)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td style="text-align:left;">{{ $alt['nama_alternatif'] }}</td>
                            @foreach($kriterias as $k)<td>{{ $alt['nilai'][$k->id_kriteria] }}</td>@endforeach
                        </tr>
                        @endforeach
                        <tr style="background:rgba(33,230,193,0.06);">
                            <td colspan="2" class="font-bold" style="color:#278EA5;">Total</td>
                            @foreach($kriterias as $k)<td class="font-bold" style="color:#278EA5;">{{ $matriksKeputusan['total'][$k->id_kriteria] }}</td>@endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Normalisasi Matriks --}}
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid #E2E8F0;">
                <i class="fas fa-table" style="color:#278EA5;"></i>
                <h2 class="font-bold" style="color:#1E293B;">Normalisasi Matriks</h2>
            </div>
            <div class="px-6 py-4" style="overflow-x:auto;">
                <table class="tbl text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="text-align:left;">Alternatif</th>
                            @foreach($kriterias as $k)<th>{{ $k->kode }}</th>@endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($normalisasiMatriks as $i => $alt)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td style="text-align:left;">{{ $alt['nama_alternatif'] }}</td>
                            @foreach($kriterias as $k)<td>{{ $alt['nilai'][$k->id_kriteria] }}</td>@endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Bobot Kriteria --}}
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid #E2E8F0;">
                <i class="fas fa-table" style="color:#278EA5;"></i>
                <h2 class="font-bold" style="color:#1E293B;">Bobot Kriteria</h2>
            </div>
            <div class="px-6 py-4" style="overflow-x:auto;">
                <table class="tbl text-center">
                    <thead>
                        <tr>
                            @foreach($kriterias as $k)<th>{{ $k->kode }}</th>@endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($kriterias as $k)<td>{{ $bobotKriteria[$k->id_kriteria] }}</td>@endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Matriks Ternormalisasi Terbobot --}}
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid #E2E8F0;">
                <i class="fas fa-table" style="color:#278EA5;"></i>
                <h2 class="font-bold" style="color:#1E293B;">Matriks Ternormalisasi Terbobot</h2>
            </div>
            <div class="px-6 py-4" style="overflow-x:auto;">
                <table class="tbl text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="text-align:left;">Alternatif</th>
                            @foreach($kriterias as $k)<th>{{ $k->kode }}</th>@endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matriksTernormalisasiTerbobot as $i => $alt)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td style="text-align:left;">{{ $alt['nama_alternatif'] }}</td>
                            @foreach($kriterias as $k)<td>{{ $alt['nilai'][$k->id_kriteria] }}</td>@endforeach
                        </tr>
                        @endforeach
                        <tr style="background:rgba(33,230,193,0.06);">
                            <td colspan="2" class="font-bold" style="color:#278EA5;">Jenis</td>
                            @foreach($kriterias as $k)<td class="font-bold" style="color:{{ strtolower($k->jenis)=='benefit'?'#21E6C1':'#fca5a5' }};">{{ strtolower($k->jenis) == 'benefit' ? 'MAX' : 'MIN' }}</td>@endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Nilai S+ --}}
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid #E2E8F0;">
                <i class="fas fa-table" style="color:#278EA5;"></i>
                <h2 class="font-bold" style="color:#1E293B;">Nilai S+ (MAX)</h2>
            </div>
            <div class="px-6 py-4" style="overflow-x:auto;">
                <table class="tbl text-center">
                    <thead><tr><th>No</th><th style="text-align:left;">Alternatif</th><th>Nilai S+</th></tr></thead>
                    <tbody>
                        @foreach($sPlus as $i => $row)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td style="text-align:left;">{{ $row['nama_alternatif'] }}</td>
                            <td>{{ $row['nilai'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Nilai S- --}}
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid #E2E8F0;">
                <i class="fas fa-table" style="color:#278EA5;"></i>
                <h2 class="font-bold" style="color:#1E293B;">Nilai S- (MIN)</h2>
            </div>
            <div class="px-6 py-4" style="overflow-x:auto;">
                <table class="tbl text-center">
                    <thead><tr><th>No</th><th style="text-align:left;">Alternatif</th><th>Nilai S-</th></tr></thead>
                    <tbody>
                        @foreach($sMinusData['sMinus'] as $i => $row)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td style="text-align:left;">{{ $row['nama_alternatif'] }}</td>
                            <td>{{ $row['nilai'] }}</td>
                        </tr>
                        @endforeach
                        <tr style="background:rgba(33,230,193,0.06);">
                            <td colspan="2" class="font-bold" style="color:#278EA5;">Total</td>
                            <td class="font-bold" style="color:#278EA5;">{{ $sMinusData['total'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Bobot Relatif --}}
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid #E2E8F0;">
                <i class="fas fa-table" style="color:#278EA5;"></i>
                <h2 class="font-bold" style="color:#1E293B;">Bobot Relatif Tiap Kriteria</h2>
            </div>
            <div class="px-6 py-4" style="overflow-x:auto;">
                <table class="tbl text-center">
                    <thead><tr><th>No</th><th style="text-align:left;">Alternatif</th><th>1/S-</th><th>S- × Total 1/S-</th></tr></thead>
                    <tbody>
                        @foreach($relativeWeightData['weights'] as $i => $row)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td style="text-align:left;">{{ $row['nama_alternatif'] }}</td>
                            <td>{{ $row['inverse'] }}</td>
                            <td>@php echo round($sMinusData['sMinus'][$i]['nilai'] * $relativeWeightData['sumInverse'], 4); @endphp</td>
                        </tr>
                        @endforeach
                        <tr style="background:rgba(33,230,193,0.06);">
                            <td colspan="2" class="font-bold" style="color:#278EA5;">Total</td>
                            <td class="font-bold" style="color:#278EA5;">{{ $relativeWeightData['sumInverse'] }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Nilai Qi --}}
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid #E2E8F0;">
                <i class="fas fa-table" style="color:#278EA5;"></i>
                <h2 class="font-bold" style="color:#1E293B;">Nilai Signifikasi Prioritas Relatif (Qi)</h2>
            </div>
            <div class="px-6 py-4 space-y-4" style="overflow-x:auto;">
                <table class="tbl text-center">
                    <thead><tr><th>No</th><th style="text-align:left;">Alternatif</th><th>Nilai Qi</th></tr></thead>
                    <tbody>
                        @foreach($relativeWeightData['weights'] as $i => $row)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td style="text-align:left;">{{ $row['nama_alternatif'] }}</td>
                            <td>{{ $row['nilai'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex items-center gap-3 px-5 py-3 rounded-xl" style="background:rgba(33,230,193,0.08); border:1px solid rgba(33,230,193,0.2);">
                    <i class="fas fa-info-circle" style="color:#278EA5;"></i>
                    <p class="text-sm font-bold" style="color:#278EA5;">Nilai Max Qi = {{ $utilityDegreeData['maxQ'] }}</p>
                </div>
            </div>
        </div>

        {{-- Nilai Ui --}}
        <div class="content-card overflow-hidden">
            <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid #E2E8F0;">
                <i class="fas fa-table" style="color:#278EA5;"></i>
                <h2 class="font-bold" style="color:#1E293B;">Nilai Utilitas Kuantitatif (Ui)</h2>
            </div>
            <div class="px-6 py-4" style="overflow-x:auto;">
                @php
                $utilityDegreesUnsorted = [];
                foreach($utilityDegreeData['utility'] as $item) {
                    $utilityDegreesUnsorted[] = $item;
                }
                usort($utilityDegreesUnsorted, function ($a, $b) {
                    return $a['id_alternatif'] <=> $b['id_alternatif'];
                });
                @endphp
                <table class="tbl text-center">
                    <thead><tr><th>No</th><th style="text-align:left;">Alternatif</th><th>Nilai Ui (%)</th></tr></thead>
                    <tbody>
                        @foreach($utilityDegreesUnsorted as $i => $row)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td style="text-align:left;">{{ $row['nama_alternatif'] }}</td>
                            <td class="font-bold" style="color:#278EA5;">{{ $row['nilai_u'] }}%</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    @endif
</div>
@endsection