@extends('layouts.admin.app')

@section('title', 'Tambah Sublayanan')

@section('content')

<!--tambah sublayanan-->
<div class="col-lg-12 col-lg-12 form-wrapper" id="tambah-sublayanan">
    @if(auth()->user()->roles_id == 1)
        <form method="POST" action="{{ route('super.sublayanan.store') }}" enctype='multipart/form-data'>
    @elseif(auth()->user()->roles_id == 2)
        <form method="POST" action="{{ route('admin.sublayanan.store') }}" enctype='multipart/form-data'>
    @endif
    @csrf
    <input type="hidden" name="layanan_id" id="layanan_id" value="{{$layanan->id}}">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    @if(auth()->user()->roles_id == 1)
                        <a class="pr-3 text-dark" href="{{ route('super.layanan.show',$layanan->id) }}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    @elseif(auth()->user()->roles_id == 2)
                        <a class="pr-3 text-dark" href="{{ route('admin.layanan.show',$layanan->id) }}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    @endif
                    <b>Tambah Jenis Pelayanan</b>
                </h4>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-dark btn-sm">
                        Simpan
                    </button>
                </div>
            </div>
            <div class="card-body p-3 mb-2 bg-secondary text-white">
                @csrf
                <div class="d-flex justify-content-center m-4">
                    <label for="ikon_sub" style="cursor: pointer">
                        <i class="fa-solid fa-camera fa-2xl"></i>
                        <input type="file" class="visually-hidden" placeholder="ikon_sub" name="ikon_sub" id="ikon_sub" enabled>
                    </label>
                </div>
                <div class="mb-2 pb-2 row">
                    <label class="col-sm-3 col-form-label"
                        >Nama Jenis Pelayanan :
                    </label>
                    <div class="col-sm-9">
                        <input
                            type="text"
                            class="form-control @error('nama_sub') is-invalid @enderror" value="{{ old('nama_sub') }}"
                            name="nama_sub"
                            id="nama_sub"
                            placeholder="Nama Jenis Pelayanan"
                            required
                        />
                        @error('nama_sub')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2 pb-2 row">
                    <label class="col-sm-3 col-form-label">Deskripsi : </label>
                    <div class="col-sm-9">
                        <textarea
                            class="form-control @error('deskripsi_sub') is-invalid @enderror" value="{{ old('deskripsi_sub') }}"
                            name="deskripsi_sub"
                            id="deskripsi_sub"
                            placeholder="Deskripsi"
                            required>
                        </textarea>
                        @error('deskripsi_sub')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2 pb-2 row">
                    <label class="col-sm-3 col-form-label"
                        >Estimasi Waktu :
                    </label>
                    <div class="col-sm-9">
                        <input
                            type="text"
                            class="form-control @error('waktu_sub') is-invalid @enderror" value="{{ old('waktu_sub') }}"
                            name="waktu_sub"
                            id="waktu_sub"
                            placeholder="2"
                            required
                        />
                        @error('waktu_sub')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2 pb-2 row">
                    <label class="col-sm-3 col-form-label">Harga : </label>
                    <div class="col-sm-9">
                        <input
                            type="text"
                            class="form-control @error('harga_sub') is-invalid @enderror" value="{{ old('harga_sub') }}"
                            name="harga_sub"
                            id="harga_sub"
                            placeholder="50000"
                            required
                        />
                        @error('harga_sub')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!--./tambah sublayanan-->

@endsection