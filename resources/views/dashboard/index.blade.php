@extends('layouts.app')
@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div>
        <h1 class="page-title"><i class="fas fa-house-chimney mr-2" style="color:#278EA5;"></i>Dashboard</h1>
        <p class="page-subtitle">Selamat datang kembali, <span style="color:#278EA5; font-weight:700;">{{ auth()->user()->username }}</span>!</p>
    </div>

    <!-- Welcome Banner -->
    <div id="welcomeAlert" class="flex justify-between items-center px-5 py-4 rounded-xl"
         style="background:#EFF8FF; border:1px solid rgba(39,142,165,0.25);">
        <div class="flex items-center gap-3">
            <i class="fas fa-circle-info" style="color:#278EA5;"></i>
            <p class="text-sm font-semibold" style="color:#1E293B;">
                Silakan gunakan menu di sidebar untuk mengakses fitur yang tersedia.
            </p>
        </div>
        <i class="fas fa-xmark cursor-pointer" style="color:#94A3B8;"
           onclick="document.getElementById('welcomeAlert').remove()"
           onmouseover="this.style.color='#1E293B'" onmouseout="this.style.color='#94A3B8'"></i>
    </div>

    <!-- Menu Cards -->
    @if(auth()->user()->isAdmin())
    <!-- Admin cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="{{ route('kriteria.index') }}" class="content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left:3px solid #21E6C1; text-decoration:none;"
           onmouseover="this.style.boxShadow='0 4px 20px rgba(39,142,165,0.15)'; this.style.transform='translateY(-2px)';"
           onmouseout="this.style.boxShadow=''; this.style.transform='';">
            <div>
                <p class="text-xs font-bold mb-1" style="color:#94A3B8; letter-spacing:0.06em;">MASTER DATA</p>
                <h2 class="text-base font-black" style="color:#071E3D;">Data Kriteria</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(33,230,193,0.1);">
                <i class="fas fa-cube text-xl" style="color:#278EA5;"></i>
            </div>
        </a>
        <a href="{{ route('subkriteria.index') }}" class="content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left:3px solid #278EA5; text-decoration:none;"
           onmouseover="this.style.boxShadow='0 4px 20px rgba(39,142,165,0.15)'; this.style.transform='translateY(-2px)';"
           onmouseout="this.style.boxShadow=''; this.style.transform='';">
            <div>
                <p class="text-xs font-bold mb-1" style="color:#94A3B8; letter-spacing:0.06em;">MASTER DATA</p>
                <h2 class="text-base font-black" style="color:#071E3D;">Data Sub Kriteria</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(39,142,165,0.1);">
                <i class="fas fa-cubes text-xl" style="color:#278EA5;"></i>
            </div>
        </a>
        <a href="{{ route('alternatif.index') }}" class="content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left:3px solid #1F4287; text-decoration:none;"
           onmouseover="this.style.boxShadow='0 4px 20px rgba(31,66,135,0.12)'; this.style.transform='translateY(-2px)';"
           onmouseout="this.style.boxShadow=''; this.style.transform='';">
            <div>
                <p class="text-xs font-bold mb-1" style="color:#94A3B8; letter-spacing:0.06em;">MASTER DATA</p>
                <h2 class="text-base font-black" style="color:#071E3D;">Data Alternatif</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(31,66,135,0.08);">
                <i class="fas fa-users text-xl" style="color:#1F4287;"></i>
            </div>
        </a>
        <a href="{{ route('penilaian.index') }}" class="content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left:3px solid #278EA5; text-decoration:none;"
           onmouseover="this.style.boxShadow='0 4px 20px rgba(39,142,165,0.15)'; this.style.transform='translateY(-2px)';"
           onmouseout="this.style.boxShadow=''; this.style.transform='';">
            <div>
                <p class="text-xs font-bold mb-1" style="color:#94A3B8; letter-spacing:0.06em;">MASTER DATA</p>
                <h2 class="text-base font-black" style="color:#071E3D;">Data Penilaian</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(39,142,165,0.1);">
                <i class="fas fa-pen-to-square text-xl" style="color:#278EA5;"></i>
            </div>
        </a>
        <a href="{{ route('perhitungan.index') }}" class="content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left:3px solid #21E6C1; text-decoration:none;"
           onmouseover="this.style.boxShadow='0 4px 20px rgba(33,230,193,0.15)'; this.style.transform='translateY(-2px)';"
           onmouseout="this.style.boxShadow=''; this.style.transform='';">
            <div>
                <p class="text-xs font-bold mb-1" style="color:#94A3B8; letter-spacing:0.06em;">PROSES</p>
                <h2 class="text-base font-black" style="color:#071E3D;">Data Perhitungan</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(33,230,193,0.1);">
                <i class="fas fa-calculator text-xl" style="color:#278EA5;"></i>
            </div>
        </a>
        <a href="{{ route('hasilakhir.index') }}" class="content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left:3px solid #21E6C1; text-decoration:none;"
           onmouseover="this.style.boxShadow='0 4px 20px rgba(33,230,193,0.15)'; this.style.transform='translateY(-2px)';"
           onmouseout="this.style.boxShadow=''; this.style.transform='';">
            <div>
                <p class="text-xs font-bold mb-1" style="color:#94A3B8; letter-spacing:0.06em;">OUTPUT</p>
                <h2 class="text-base font-black" style="color:#071E3D;">Data Hasil Akhir</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(33,230,193,0.1);">
                <i class="fas fa-chart-line text-xl" style="color:#278EA5;"></i>
            </div>
        </a>
    </div>
    @else
    <!-- User cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="{{ route('hasilakhir.index') }}" class="content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left:3px solid #21E6C1; text-decoration:none;"
           onmouseover="this.style.boxShadow='0 4px 20px rgba(33,230,193,0.15)'; this.style.transform='translateY(-2px)';"
           onmouseout="this.style.boxShadow=''; this.style.transform='';">
            <div>
                <p class="text-xs font-bold mb-1" style="color:#94A3B8; letter-spacing:0.06em;">OUTPUT</p>
                <h2 class="text-base font-black" style="color:#071E3D;">Data Hasil Akhir</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(33,230,193,0.1);">
                <i class="fas fa-chart-line text-xl" style="color:#278EA5;"></i>
            </div>
        </a>
        <a href="{{ route('profile.index') }}" class="content-card p-6 flex items-center justify-between transition-all duration-200"
           style="border-left:3px solid #278EA5; text-decoration:none;"
           onmouseover="this.style.boxShadow='0 4px 20px rgba(39,142,165,0.15)'; this.style.transform='translateY(-2px)';"
           onmouseout="this.style.boxShadow=''; this.style.transform='';">
            <div>
                <p class="text-xs font-bold mb-1" style="color:#94A3B8; letter-spacing:0.06em;">AKUN</p>
                <h2 class="text-base font-black" style="color:#071E3D;">Data Profile</h2>
            </div>
            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background:rgba(39,142,165,0.1);">
                <i class="fas fa-user text-xl" style="color:#278EA5;"></i>
            </div>
        </a>
    </div>
    @endif
</div>
@endsection