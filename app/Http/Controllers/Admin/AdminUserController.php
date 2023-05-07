<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|max:255',
                'email' => 'required|max:255|unique:users,email',
                'no_telepon' => 'required',
                'password' => 'required',
                'roles_id' => 'required'
            ],
            [
                'nama.required' => 'Nama harus diisi!',
                'nama.max' => 'Nama maksimal 255 karakter!',
                'email.required' => 'Email harus diisi!',
                'email.max' => 'Email maksimal 255 karakter!',
                'email.unique' => 'Email sudah terdaftar!',
                'no_telepon.required' => 'No Telepon harus diisi!',
                'password.required' => 'Password harus diisi!',
                'roles_id.required' => 'Roles harus diisi!'
            ]
        );
        
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'password' => Hash::make($request->password),
            'roles_id' => $request->roles_id
        ]);

        if (auth()->user()->roles_id == 1) {
            return redirect('super/user')->with('sukses', 'Berhasil Tambah Data!');
        }
    }

    public function show(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.user.read', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.user.update', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama' => 'required|max:255',
                'email' => 'required|max:255',
                'no_telepon' => 'required',
                'roles_id' => 'required'
            ],
            [
                'nama.required' => 'Nama harus diisi!',
                'nama.max' => 'Nama maksimal 255 karakter!',
                'email.required' => 'Email harus diisi!',
                'email.max' => 'Email maksimal 255 karakter!',
                'no_telepon.required' => 'No Telepon harus diisi!',
                'roles_id.required' => 'Roles harus diisi!'
            ]
        );

        $user = User::where('id', $id)->first();
        $user->update(
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'no_telepon' => $request->no_telepon,
                'password' => Hash::make($request->password),
                'roles_id' => $request->roles_id
            ]
        );
        if (auth()->user()->roles_id == 1) {
            return redirect('super/user')->with('sukses', 'Berhasil Edit Data!');
        }
    }

    public function destroy(string $id)
    {
        $data = User::where('id', $id)->first();
        $data->delete();

        if (auth()->user()->roles_id == 1) {
            return redirect('super/user')->with('sukses', 'Berhasil Hapus Data!');
        }
    }
}
