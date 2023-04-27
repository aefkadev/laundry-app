@extends('layouts.admin.app')

@section('title', 'Detail Order')

@section('content')

<body class="">
    <div class="vh-100">
        @if(auth()->user()->roles_id == 1)
        <section class="nav-section py-3 px-4 d-flex align-items-center gap-1" style="font-size: 20px;">
            <a href="/super" style="color:black;"><i class="fa-solid fa-arrow-left font-weight-bolder"></i></a>
            <span class="fw-bolder px-2">Detail Transaksi</span>
        </section>
        @elseif(auth()->user()->roles_id == 2)
        <section class="nav-section py-3 px-4 d-flex align-items-center gap-1" style="font-size: 20px;">
            <a href="/admin" style="color:black;"><i class="fa-solid fa-arrow-left font-weight-bolder"></i></a>
            <span class="fw-bolder px-2">Detail Transaksi</span>
        </section>
        @endif
        <section class="px-4 bg-dark rounded-sm">
                <form action="" class="py-3 d-flex flex-column gap-3 justify-content-center align-items-center w-100">
                    <div class="d-flex flex-column w-100 align-items-center">
                        <div class="d-flex w-75">
                            <label class="fw-bold text-md text-white" for="nama">Nama</label>
                        </div>
                        <input class="border-0 rounded-3 py-2 px-3 w-75 bg-white bg-opacity-75" type="text" name="nama" id="nama" value="ayu" disabled>
                    </div>

                    <div class="d-flex flex-column w-100 align-items-center">
                        <div class="d-flex w-75">
                            <label class="fw-bold text-md text-white" for="tanggal">Tanggal Order</label>
                        </div>
                        <input class="border-0 rounded-3 py-2 px-3 w-75" type="date" name="tanggal" id="tanggal" placeholder="dummy__">
                    </div>

                    <div class="d-flex flex-column w-100 align-items-center">
                        <div class="d-flex w-75">
                            <label class="fw-bold text-md text-white" for="no_telepon">Nomor Whatsapp</label>
                        </div>
                        <input class="border-0 rounded-3 py-2 px-3 w-75 bg-white bg-opacity-75" type="text" name="no_telepon" id="no_telepon" value="08122131313" disabled>
                    </div>

                    <div class="d-flex flex-column w-100 align-items-center">
                        <div class="d-flex w-75">
                            <label class="fw-bold text-md text-white" for="alamat">Alamat</label>
                        </div>
                        <input class="border-0 rounded-3 py-2 px-3 w-75" type="text" name="alamat" id="alamat" placeholder="dummy__">
                    </div>

                    <div class="d-flex flex-column w-100 align-items-center">
                        <div class="d-flex w-75">
                            <label class="fw-bold text-md text-white" for="jenis_layanan">Jenis layanan</label>
                        </div>
                        <input class="border-0 rounded-3 py-2 px-3 w-75 bg-white bg-opacity-75" type="text" name="jenis_layanan" id="jenis_layanan" value="medium" disabled>
                    </div>

                    <div class="d-flex flex-column w-100 align-items-center">
                        <div class="d-flex w-75">
                            <label class="fw-bold text-md text-white" for="harga">Harga</label>
                        </div>
                        <input class="border-0 rounded-3 py-2 px-3 w-75 bg-white bg-opacity-75" type="number" name="harga" id="harga" value="50.0000" disabled>
                    </div>

                    <div class="d-flex flex-column w-100 align-items-center">
                        <div class="d-flex w-75">
                            <label class="fw-bold text-md text-white" for="Keluhan">Keluhan</label>
                        </div>
                        <input class="border-0 rounded-3 py-2 px-3 w-75" type="text" name="Keluhan" id="Keluhan" placeholder="dummy__">
                    </div>

                    <div class="d-flex flex-column w-100 align-items-center">
                        <div class="d-flex w-75">
                            <label class="fw-bold text-md text-white" for="foto-keluhan">Foto Keluhan</label>
                        </div>
                        <input class="border-0 rounded-3 py-2 px-3 w-75 bg-white" type="file" name="foto-keluhan" id="foto-keluhan" placeholder="dummy__">
                    </div>

                    <!-- Modal -->
                    <div class="modal fade show" id="exampleModalFullscreen" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-modal="false" role="dialog">
                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="d-flex px-3 pt-4">
                                    <button type="button" class="border-0" data-bs-dismiss="modal" aria-label="Close color: #E2DFEB; font-size: 20px;">
                                        <i class="fa-solid fa-arrow-left font-weight-bolder"></i>
                                    </button>
                                    <span class="font-weight-bolder px-2" style="color: #E2DFEB; font-size: 20px;">Pembayaran</span>
                                </div>
                            <div class="d-flex justify-content-center gap-3 align-items-center flex-column w-100">
                                <div class="input-group d-flex flex-column justify-content-center w-75">
                                    <label class="fw-bold text-md text-white border-0" for="pembayaran">Metode Pembayaran</label>
                                    <select class="custom-select border-0 rounded-3 py-2 px-3 w-100" id="pembayaran">
                                        <option selected value="tunai">Tunai</option>
                                        <option value="QRIS">QRIS</option>
                                        <option value="BCA">Transfer BCA</option>
                                    </select>
                                </div>

                                <div class="input-group d-flex flex-column justify-content-center w-75">
                                    <label class="fw-bold text-md text-white border-0" for="opsi_pengiriman">Opsi Pengiriman</label>
                                    <select class="custom-select border-0 rounded-3 py-2 px-3 w-100" id="opsi_pengiriman">
                                        <option selected value="pickup">Pick Up</option>
                                        <option value="delivery">Delivery</option>
                                    </select>
                                </div>
                                
                                <div class="d-flex flex-column w-100 align-items-center">
                                    <div class="d-flex w-75">
                                        <label class="fw-bold text-md text-white" for="no_rekening">No. Rekening (optional)</label>
                                    </div>
                                    <input class="border-0 rounded-3 py-2 px-3 w-75" type="text" name="no_rekening" id="Keluhan" placeholder="12131">
                                </div>

                                <div class="d-flex flex-column w-100 align-items-center">
                                    <div class="d-flex w-75">
                                        <label class="fw-bold text-md text-white" for="foto-keluhan">Foto Keluhan</label>
                                    </div>
                                    <input class="border-0 rounded-3 py-2 px-3 w-75 bg-white" type="file" name="foto-keluhan" id="foto-keluhan" placeholder="dummy__">
                                </div>
                                <button type="submit" class="btn w-25 mt-2">Order</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </form>
            <div class="pb-5 d-flex justify-content-center align-items-center w-100">
                <button data-bs-target="#exampleModalFullscreen" data-bs-toggle="modal" data-bs-dismiss="modal" class="btn w-50 bg-white mt-4">Next</button>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

@endsection
