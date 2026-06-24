@extends('layouts.app')
@section('content')
<div class="space-y-5">
    <div>
        <h1 class="page-title"><i class="fas fa-user mr-2" style="color:#21E6C1;"></i>Data Profile</h1>
        <p class="page-subtitle">Kelola informasi akun Anda</p>
    </div>

    <div class="content-card overflow-hidden">
        <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid rgba(33,230,193,0.1);">
            <i class="fas fa-pen-to-square" style="color:#21E6C1;"></i>
            <h2 class="font-bold" style="color:rgba(255,255,255,0.8);">Edit Data Profile</h2>
        </div>

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf @method('PUT')
            <div class="px-6 py-6 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="{{ auth()->user()->nama_lengkap }}" class="form-input @error('nama_lengkap') border-red-500 @enderror">
                        @error('nama_lengkap')<p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Username</label>
                        <input type="text" name="username" value="{{ auth()->user()->username }}" class="form-input @error('username') border-red-500 @enderror">
                        @error('username')<p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">E-Mail</label>
                        <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-input @error('email') border-red-500 @enderror">
                        @error('email')<p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div style="border-top:1px solid rgba(33,230,193,0.1); padding-top:20px; margin-top:4px;">
                    <p class="text-xs font-bold mb-4" style="color:rgba(255,255,255,0.4); letter-spacing:0.05em;">UBAH PASSWORD <span style="font-weight:400; opacity:0.6;">(Kosongkan jika tidak ingin mengubah)</span></p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="password" placeholder="Masukkan password baru" class="form-input @error('password') border-red-500 @enderror">
                            @error('password')<p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" placeholder="Konfirmasi password baru" class="form-input">
                        </div>
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