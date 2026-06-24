<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('entries', 5);

        $users = User::when($search, function ($query) use ($search) {
            $query->where('nama_lengkap', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('username', 'like', "%{$search}%")
                ->orWhere('role', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%");
        })
            ->orderBy('id_user')
            ->paginate($perPage);

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|max:100',
            'username'     => 'required|unique:users,username|max:50|alpha_dash',
            'email'        => 'required|email|unique:users,email|max:100|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
            'password'     => 'required|min:6|confirmed',
            'role'         => 'required|in:admin,user',
            'status'       => 'required|in:Active,Inactive',
        ], [
            'email.regex'          => 'Email harus menggunakan @gmail.com',
            'email.unique'         => 'Email sudah digunakan',
            'username.alpha_dash'  => 'Username hanya boleh mengandung huruf, angka, dash, dan underscore',
            'username.unique'      => 'Username sudah digunakan',
            'password.confirmed'   => 'Password dan Confirm Password harus sama',
        ]);

        // Hash the password before storing
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('user.index')
            ->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $user = User::findOrFail($id);

        $rules = [
            'nama_lengkap' => 'required|max:100',
            'username'     => ['required', 'max:50', 'alpha_dash', Rule::unique('users')->ignore($user->id_user, 'id_user')],
            'email'        => ['required', 'email', 'max:100', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/', Rule::unique('users')->ignore($user->id_user, 'id_user')],
            'role'         => 'required|in:admin,user',
            'status'       => 'required|in:Active,Inactive',
        ];

        // Only validate password if it's provided
        if ($request->filled('password')) {
            $rules['password'] = 'min:6|confirmed';
        }

        $validated = $request->validate($rules, [
            'email.regex'         => 'Email harus menggunakan @gmail.com',
            'email.unique'        => 'Email sudah digunakan',
            'username.alpha_dash' => 'Username hanya boleh mengandung huruf, angka, dash, dan underscore',
            'username.unique'     => 'Username sudah digunakan',
            'password.confirmed'  => 'Password dan Confirm Password harus sama',
        ]);

        // Only update password if it's provided
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('user.index')
            ->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
