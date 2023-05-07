<?php

namespace App\Http\Controllers\Admin;

use App\Models\ListOrder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DetailOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listorders = ListOrder::all();
        $detailorders = DetailOrder::all();
        return view('admin.transaksi.index', compact('listorders', 'detailorders'));
    }

    public function indexLaporan()
    {
        $laporans = ListOrder::all();
        return view('admin.pembukuan.laporan', compact('laporans'));
    }

    public function indexChart()
    {
        $orders = DB::table('list_order')
                    ->select(DB::raw("MONTH(waktu_order) as month"), 'jenis_transaksi', DB::raw('SUM(harga_order) as total'))
                    ->where('status_order', 'Selesai')
                    ->groupBy('month', 'jenis_transaksi')
                    ->orderBy('month', 'asc')
                    ->get();

        $data = [];

        foreach ($orders as $order) {
            $data[$order->month][$order->jenis_transaksi] = $order->total;
        }
        
    return view('admin.pembukuan.index', compact('data'));
    
    }

    public function create()
    {
        return view('admin.transaksi.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'user_order' => 'required',
                'jenis_transaksi' => 'required',
                'keluhan' => 'required',
                'waktu_order' => 'required',
                'harga_order' => 'required|numeric'
            ],[
                'user_order.required' => 'Nama Pemesan tidak boleh kosong',
                'jenis_transaksi.required' => 'Jenis Transaksi tidak boleh kosong',
                'keluhan.required' => 'Keluhan tidak boleh kosong',
                'waktu_order.required' => 'Waktu Order tidak boleh kosong',
                'harga_order.required' => 'Harga Order tidak boleh kosong',
                'harga_order.numeric' => 'Harga Order harus berupa angka'
            ]
        );

        $token = "1324" . Time();
        $listorder = ListOrder::create([
            'token' => $token,
            'user_order' => $request->user_order,
            'jenis_transaksi' => $request->jenis_transaksi,
            'waktu_order' => $request->waktu_order,
            'harga_order' => $request->harga_order,
            'keluhan' => $request->keluhan,
            'status_order' => "Selesai"
        ]);

        DetailOrder::create([
            'list_id' => $listorder->id,
        ]);

        if (auth()->user()->roles_id == 1) {
            return redirect('super/laporan')->with('sukses', 'Berhasil Tambah Data!');
        } elseif (auth()->user()->roles_id == 2) {
            return redirect('admin/laporan')->with('sukses', 'Berhasil Tambah Data!');
        }
    }

    public function show(string $id)
    {
        $order = ListOrder::where('id', $id)->first();
        return view('admin.transaksi.read', compact('order'));
    }

    public function edit(string $id)
    {
        $order = ListOrder::where('id', $id)->first();
        $detail = DetailOrder::where('list_id', $id)->first();
        return view('admin.transaksi.update', compact('order', 'detail'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'user_order' => 'required',
                'jenis_transaksi' => 'required',
                'keluhan' => 'required',
                'waktu_order' => 'required',
                'harga_order' => 'required|numeric',
                'foto_keluhan' => 'mimes:jpg,jpeg,png|max:2048',
                'opsi_pengiriman' => 'required',
                'pembayaran' => 'required',
                'foto_pembayaran' => 'mimes:jpg,jpeg,png|max:2048',
                'no_rekening' => 'required'
            ],[
                'user_order.required' => 'Nama Pemesan tidak boleh kosong',
                'jenis_transaksi.required' => 'Jenis Transaksi tidak boleh kosong',
                'keluhan.required' => 'Keluhan tidak boleh kosong',
                'waktu_order.required' => 'Waktu Order tidak boleh kosong',
                'harga_order.required' => 'Harga Order tidak boleh kosong',
                'harga_order.numeric' => 'Harga Order harus berupa angka',
                'foto_keluhan.mimes' => 'Foto Keluhan harus berupa file gambar',
                'foto_keluhan.max' => 'Foto Keluhan maksimal 2MB',
                'opsi_pengiriman.required' => 'Opsi Pengiriman tidak boleh kosong',
                'pembayaran.required' => 'Pembayaran tidak boleh kosong',
                'foto_pembayaran.mimes' => 'Foto Pembayaran harus berupa file gambar',
                'foto_pembayaran.max' => 'Foto Pembayaran maksimal 2MB',
                'no_rekening.required' => 'No Rekening tidak boleh kosong'
            ]
        );

        $order = ListOrder::where('id', $id)->first();
        $detail = DetailOrder::where('list_id', $id)->first();
        $token = "1324" . Time();
        $order->update(
            [
                'token' => $token,
                'user_order' => $request->user_order,
                'jenis_pelayanan' => $request->jenis_pelayanan,
                'jenis_transaksi' => $request->jenis_transaksi,
                'waktu_order' => $request->waktu_order,
                'alamat_order' => $request->alamat_order,
                'harga_order' => $request->harga_order,
                'status_order' => $request->status_order,
                'keluhan' => $request->keluhan
                ]
            );
        $detail->update([
            'foto_keluhan' => $request->foto_keluhan,
            'opsi_pengiriman' => $request->opsi_pengiriman,
            'pembayaran' => $request->pembayaran,
            'foto_pembayaran' => $request->foto_pembayaran,
            'no_rekening' => $request->no_rekening
        ]);

        if (auth()->user()->roles_id == 1) {
            return redirect('super/transaksi')->with('sukses', 'Berhasil Edit Data!');
        } elseif (auth()->user()->roles_id == 2) {
            return redirect('admin/transaksi')->with('sukses', 'Berhasil Edit Data!');
        }
    }

    public function destroy(string $id)
    {
        $data = ListOrder::where('id', $id)->first();
        $data->delete();

        if (auth()->user()->roles_id == 1) {
            return redirect('super/transaksi')->with('sukses', 'Berhasil Hapus Data!');
        }
    }
}
