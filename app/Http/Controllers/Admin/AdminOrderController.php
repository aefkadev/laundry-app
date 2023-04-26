<?php

namespace App\Http\Controllers\Admin;

use App\Models\ListOrder;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = ListOrder::all();
        return view('admin.transaksi.index', compact('transaksis'));
    }

    public function indexLaporan()
    {
        $laporans = ListOrder::all();
        return view('admin.pembukuan.laporan', compact('laporans'));
    }

    public function indexChart()
    {
        $charts = ListOrder::all();
        return view('admin.pembukuan.index', compact('charts'));
    }

    public function create()
    {
        $transaksis = ListOrder::all();
        return view('admin.transaksi.create', compact('transaksis'));
    }

    public function store(Request $request)
    {
        ListOrder::create([
            'user_id' => $request->user_id,
            'jenis_transaksi' => $request->jenis_transaksi,
            'nominal_transaksi' => $request->nominal_transaksi
        ]);

        if (auth()->user()->roles_id == 1) {
            return redirect('super/order')->with('sukses', 'Berhasil Tambah Data!');
        } elseif (auth()->user()->roles_id == 2) {
            return redirect('admin/order')->with('sukses', 'Berhasil Tambah Data!');
        }
    }

    public function show(string $id)
    {
        $transaksi = ListOrder::where('id', $id)->first();
        return view('admin.transaksi.read', compact('transaksi'));
    }

    public function edit(string $id)
    {
        $transaksi = ListOrder::where('id', $id)->first();
        return view('admin.transaksi.update', compact('transaksi'));
    }

    public function update(Request $request, string $id)
    {
        $transaksi = ListOrder::where('id', $id)->first();
        $transaksi->update(
            [
                'user_id' => $request->user_id,
                'jenis_transaksi' => $request->jenis_transaksi,
                'nominal_transaksi' => $request->nominal_transaksi
            ]
        );
        if (auth()->user()->roles_id == 1) {
            return redirect('super/order')->with('sukses', 'Berhasil Edit Data!');
        } elseif (auth()->user()->roles_id == 2) {
            return redirect('admin/order')->with('sukses', 'Berhasil Edit Data!');
        }
    }

    public function destroy(string $id)
    {
        $data = ListOrder::where('id', $id)->first();
        $data->delete();

        if (auth()->user()->roles_id == 1) {
            return redirect('super/order')->with('sukses', 'Berhasil Hapus Data!');
        } elseif (auth()->user()->roles_id == 2) {
            return redirect('admin/order')->with('sukses', 'Berhasil Hapus Data!');
        }
    }
}
