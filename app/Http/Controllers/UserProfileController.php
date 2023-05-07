<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function edit(string $id)
    {
        $user = User::where('id', auth()->user()->id )->firstOrFail();
        if (auth()->user()->roles_id == 1) {
            return view('admin.profile.update', compact('user'));
        } else if (auth()->user()->roles_id == 2) {
            return view('admin.profile.update', compact('user'));
        } else if (auth()->user()->roles_id == 3) {
            return view('client.profile.update', compact('user'));
        }
    }

    public function update(Request $request, string $id)
    {
        $user = User::where('id', auth()->user()->id )->firstOrFail();
        if($request->password == null){
            $user->update(
                [
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'no_telepon' => $request->no_telepon,
                ],[
                    'nama.required' => 'Nama harus diisi!',
                    'email.required' => 'Email harus diisi!',
                    'no_telepon.required' => 'No Telepon harus diisi!',
                ]
            );
        } else {
            $user->update(
                [
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'no_telepon' => $request->no_telepon,
                    'password' => Hash::make($request->password)
                ],[
                    'nama.required' => 'Nama harus diisi!',
                    'email.required' => 'Email harus diisi!',
                    'no_telepon.required' => 'No Telepon harus diisi!',
                    'password.required' => 'Password harus diisi!',]
            );
        }
        $validasi = $request->validate(
            [
                'gambar_user' => 'mimes:jpg,bmp,png,svg,jpeg|max:2560 ',
            ],
            [
                'gambar_user.mimes' => 'Format gambar harus jpg, bmp, png, svg, jpeg!',
                'gambar_user.max' => 'Ukuran gambar maksimal 2,5 MB!',
            ]
        );

        $file = $validasi[('gambar_user')];
        $user->gambar_user = time().'_'.$file->getClientOriginalName();
        $user->update();
        $nama_file = time().'_'.$file->getClientOriginalName();

        $location = '../public/assets/profile/';

        $file->move($location,$nama_file);

        if (auth()->user()->roles_id == 1) {
            return redirect('super/profile/'.$id.'/edit')->with('sukses', 'Berhasil Edit Data!');
        } else if (auth()->user()->roles_id == 2) {
            return redirect('admin/profile/'.$id.'/edit')->with('sukses', 'Berhasil Edit Data!');
        } else if (auth()->user()->roles_id == 3) {
            return redirect('member/profile/'.$id.'/edit')->with('sukses', 'Berhasil Edit Data!');
        }
    }

}
