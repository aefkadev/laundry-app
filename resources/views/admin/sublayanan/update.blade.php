@extends('layouts.admin.app')

@section('title', 'Edit Sublayanan')

@section('content')

<!--edit sublayanan-->
<div class="col-lg-12 col-lg-12 form-wrapper" id="edit-sublayanan">
    @if(auth()->user()->roles_id == 1)
        <form method="POST" action="{{ route('super.sublayanan.update', $sublayanan->id) }}" enctype='multipart/form-data'>
    @elseif(auth()->user()->roles_id == 2)
        <form method="POST" action="{{ route('super.sublayanan.update', $sublayanan->id) }}" enctype='multipart/form-data'>
    @endif
    @csrf
    @method('PUT')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    @if(auth()->user()->roles_id == 1)
                        <a href="{{ back()->getTargetUrl() }}" class="pr-3 text-dark">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        </a>
                    @elseif(auth()->user()->roles_id == 2)
                        <a href="{{ back()->getTargetUrl() }}" class="pr-3 text-dark">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        </a>
                    @endif
                    <b>Edit Jenis Pelayanan</b>
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
                    @if ($sublayanan->ikon_sub == Null)
                        <i class="fa-solid fa-camera fa-2xl"></i>
                        <input type="file" class="visually-hidden" name="ikon_sub" id="ikon_sub" enabled>
                        @error('ikon_sub')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    @else
                        <img src="{{ asset('assets/ikon') }}/{{ $sublayanan->ikon_sub }}" style="width:200px !important; height:200px !important;" class="img-circle elevation-2" alt="">
                        <input type="file" class="visually-hidden" name="ikon_sub" id="ikon_sub" enabled>
                        @error('ikon_sub')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    @endif
                </label>
                </div>
                <input type="hidden" name="layanan_id" value="{{$sublayanan->layanan_id}}">
                <div class="mb-2 pb-2 row">
                    <label class="col-sm-3 col-form-label"
                        >Nama Jenis Pelayanan:
                    </label>
                    <div class="col-sm-9">
                        <input
                            type="text"
                            class="form-control @error('nama_sub') is-invalid @enderror"
                            name="nama_sub"
                            id="nama_sub"
                            value="{{$sublayanan->nama_sub}}"
                            enabled
                        />
                        @error('nama_sub')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-2 pb-2 row">
                    <label class="col-sm-3 col-form-label">Deskripsi : </label>
                    <div class="col-sm-9">
                        <textarea
                            class="form-control @error('deskripsi_sub') is-invalid @enderror"
                            name="deskripsi_sub"
                            id="deskripsi_sub"
                            enabled>{{$sublayanan->deskripsi_sub}}</textarea>
                    </div>
                    @error('deskripsi_sub')
                        <span class="invalid-feedback text-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-2 pb-2 row">
                    <label class="col-sm-3 col-form-label"
                        >Estimasi Waktu :
                    </label>
                    <div class="col-sm-9">
                        <input
                            type="text"
                            class="form-control @error('waktu_sub') is-invalid @enderror"
                            name="waktu_sub"
                            id="waktu_sub"
                            value="{{$sublayanan->waktu_sub}}"
                            enabled
                        />
                        @error('waktu_sub')
                            <span class="invalid-feedback text-center" role="alert">
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
                            class="form-control @error('harga_sub') is-invalid @enderror"
                            name="harga_sub"
                            id="harga_sub"
                            value="{{$sublayanan->harga_sub}}"
                            enabled
                        />
                        @error('harga_sub')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!--./edit sublayanan-->

@endsection
