@extends('layouts.app')
@section('content')
<div class="space-y-5">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="page-title"><i class="fas fa-users-gear mr-2" style="color:#21E6C1;"></i>Data User</h1>
            <p class="page-subtitle">Detail informasi pengguna</p>
        </div>
        <a href="{{ route('user.index') }}" class="btn-secondary">
            <i class="fas fa-angle-left"></i> Kembali
        </a>
    </div>

    <div class="content-card overflow-hidden">
        <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid rgba(33,230,193,0.1);">
            <i class="fas fa-eye" style="color:#21E6C1;"></i>
            <h2 class="font-bold" style="color:rgba(255,255,255,0.8);">Detail Data User</h2>
        </div>
        <div class="px-6 py-6 space-y-4">
            @php
            $fields = [
                'Nama Lengkap' => $user->nama_lengkap,
                'Username'     => $user->username,
                'E-Mail'       => $user->email,
                'Password'     => '*****',
                'Role'         => ucfirst($user->role),
                'Status'       => $user->status,
            ];
            @endphp
            @foreach($fields as $label => $value)
            <div class="flex items-center gap-4 py-3" style="border-bottom:1px solid rgba(255,255,255,0.05);">
                <span class="w-36 flex-shrink-0 text-xs font-bold" style="color:rgba(255,255,255,0.4);">{{ strtoupper($label) }}</span>
                @if($label == 'Status')
                    @if($value == 'Active')
                    <span class="badge-active">{{ $value }}</span>
                    @else
                    <span class="badge-inactive">{{ $value }}</span>
                    @endif
                @elseif($label == 'Role')
                    @if($user->role == 'admin')
                    <span class="badge-admin">{{ $value }}</span>
                    @else
                    <span class="badge-active">{{ $value }}</span>
                    @endif
                @else
                <span class="text-sm font-semibold" style="color:rgba(255,255,255,0.8);">{{ $value }}</span>
                @endif
            </div>
            @endforeach
        </div>
        <div class="px-6 pb-6 flex justify-end gap-3">
            <a href="{{ route('user.index') }}" class="btn-secondary"><i class="fas fa-list"></i> Daftar User</a>
            <a href="{{ route('user.edit', $user->id_user) }}" class="btn-primary"><i class="fas fa-pen-to-square"></i> Edit</a>
        </div>
    </div>
</div>
@endsection