@extends('layouts.app')
@section('content')
<div class="space-y-5">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="page-title"><i class="fas fa-users-gear mr-2" style="color:#21E6C1;"></i>Data User</h1>
            <p class="page-subtitle">Edit data pengguna</p>
        </div>
        <a href="{{ route('user.index') }}" class="btn-secondary">
            <i class="fas fa-angle-left"></i> Kembali
        </a>
    </div>

    <div class="content-card overflow-hidden">
        <div class="px-6 py-4 flex items-center gap-2" style="border-bottom:1px solid rgba(33,230,193,0.1);">
            <i class="fas fa-pen-to-square" style="color:#21E6C1;"></i>
            <h2 class="font-bold" style="color:rgba(255,255,255,0.8);">Edit Data User</h2>
        </div>
        <form action="{{ route('user.update', $user->id_user) }}" method="POST">
            @csrf @method('PUT')
            <div class="px-6 py-6 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $user->nama_lengkap) }}" class="form-input @error('nama_lengkap') border-red-500 @enderror" required>
                        @error('nama_lengkap')<p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Username</label>
                        <input type="text" name="username" value="{{ old('username', $user->username) }}" class="form-input @error('username') border-red-500 @enderror" required>
                        @error('username')<p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-input @error('email') border-red-500 @enderror" required>
                        @error('email')<p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Role</label>
                        <select name="role" class="form-input @error('role') border-red-500 @enderror" required>
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                        @error('role')<p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Password <span style="font-weight:400; color:rgba(255,255,255,0.35);">(Kosongkan jika tidak ingin mengubah)</span></label>
                        <input type="password" name="password" placeholder="Password baru" class="form-input @error('password') border-red-500 @enderror">
                        @error('password')<p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" placeholder="Konfirmasi password baru" class="form-input">
                    </div>
                    <div>
                        <label class="form-label">Status</label>
                        <select name="status" class="form-input @error('status') border-red-500 @enderror" required>
                            <option value="Active" {{ old('status', $user->status) == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('status', $user->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')<p class="mt-1 text-xs font-semibold" style="color:#fca5a5;">{{ $message }}</p>@enderror
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