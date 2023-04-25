<?php

namespace App\Http\Controllers\Admin;

use App\Models\Layanan;
use App\Models\SubLayanan;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $layanans = Layanan::all();
        return view('admin.layanan.index', compact('layanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $layanan = Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'deskripsi_layanan' => $request->deskripsi_layanan
        ]);

        $validasi = $request->validate([
            'ikon_layanan' => 'required|mimes:jpg,bmp,png,svg,jpeg|max:2560 ',
        ]);

        $file = $validasi[('ikon_layanan')];
        $layanan->ikon_layanan = time().'_'.$file->getClientOriginalName();
        $layanan->update();
        $nama_file = time().'_'.$file->getClientOriginalName();

        $location = '../public/assets/ikon/';

        $file->move($location,$nama_file);

        if (auth()->user()->roles_id == 1) {
            return redirect('super/layanan')->with('sukses', 'Berhasil Tambah Data!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $layanan = SubLayanan::where('id', $id)->first();
        return view('admin.sublayanan.index', compact('layanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $layanan = Layanan::where('id', $id)->first();
        return view('admin.layanan.update', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $layanan = Layanan::where('id', $id)->first();
        $layanan->update(
            [
                'nama_layanan' => $request->nama_layanan,
                'deskripsi_layanan' => $request->deskripsi_layanan
            ]
        );

        $validasi = $request->validate([
            'ikon_layanan' => 'required|mimes:jpg,bmp,png,svg,jpeg|max:2560 ',
        ]);

        $file = $validasi[('ikon_layanan')];
        $layanan->ikon_layanan = time().'_'.$file->getClientOriginalName();
        $layanan->update();
        $nama_file = time().'_'.$file->getClientOriginalName();

        $location = '../public/assets/ikon/';

        $file->move($location,$nama_file);

        if (auth()->user()->roles_id == 1) {
            return redirect('super/layanan/'.$id.'/edit')->with('sukses', 'Berhasil Edit Data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Layanan::where('id', $id)->first();
        $data->delete();

        if (auth()->user()->roles_id == 1) {
            return redirect('super/layanan')->with('sukses', 'Berhasil Hapus Data!');
        }
    }
}
