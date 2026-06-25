@extends('layouts.app')
@section('content')
<div class="space-y-5">
    <div>
        <h1 class="page-title"><i class="fas fa-chart-line mr-2" style="color:#278EA5;"></i>Data Hasil Akhir</h1>
        <p class="page-subtitle">Hasil perangkingan metode COPRAS</p>
    </div>

    @if($kriterias->isEmpty() || $alternatifs->isEmpty())
    <div class="flex items-center gap-3 px-5 py-4 rounded-xl" style="background:rgba(251,207,109,0.1); border:1px solid rgba(251,207,109,0.25);">
        <i class="fas fa-exclamation-triangle" style="color:#fbbf24;"></i>
        <p class="text-sm font-semibold" style="color:#374151;">Data Kriteria atau Alternatif masih kosong. Silahkan tambahkan data terlebih dahulu.</p>
    </div>
    @else
    <div class="content-card overflow-hidden">
        <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid #E2E8F0;">
            <i class="fas fa-trophy" style="color:#278EA5;"></i>
            <h2 class="font-bold" style="color:#1E293B;">Hasil Akhir Perangkingan</h2>
        </div>
        <div class="px-6 py-4" style="overflow-x:auto;">
            <table class="tbl text-center">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th style="text-align:left;">Nama Alternatif</th>
                        <th>Nilai Utilitas (%)</th>
                        <th>Peringkat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($finalRanking as $index => $row)
                    <tr>
                        <td>{{ $row['kode_alternatif'] }}</td>
                        <td style="text-align:left;">{{ $row['nama_alternatif'] }}</td>
                        <td>
                            <div class="flex items-center justify-center gap-3">
                                <div class="flex-1 rounded-full overflow-hidden" style="background:rgba(255,255,255,0.05); height:6px; max-width:120px;">
                                    <div style="width:{{ $row['nilai_u'] }}%; height:100%; background:linear-gradient(90deg,#278EA5,#21E6C1); border-radius:999px;"></div>
                                </div>
                                <span class="font-bold text-sm" style="color:#21E6C1; min-width:50px;">{{ $row['nilai_u'] }}%</span>
                            </div>
                        </td>
                        <td>
                            @if($row['rank'] == 1)
                            <span class="badge-active" style="background:rgba(255,215,0,0.15); color:#ffd700; border-color:rgba(255,215,0,0.3);">
                                <i class="fas fa-crown mr-1"></i>#{{ $row['rank'] }}
                            </span>
                            @elseif($row['rank'] <= 3)
                            <span class="badge-active">#{{ $row['rank'] }}</span>
                            @else
                            <span class="badge-admin">#{{ $row['rank'] }}</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection