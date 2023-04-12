@extends('layouts.admin.app')

@section('title', 'Deskripsi')

@section('content')

<!--Detail jenislayanan-->
<div class="col-lg-12 col-lg-12 form-wrapper" id="detail-jenislayanan">

    <div class="card">
    <div class="card-header">
    <h4 class="card-title">Detail</h4>
    </div>
    <div class="card-body">
    @if(auth()->user()->roles_id == 1)
        <form method="POST" action="{{ route('super.jenislayanan.show',$jenislayanan->id) }}" enctype='multipart/form-data'>
    @elseif(auth()->user()->roles_id == 2)
        <form method="POST" action="{{ route('admin.jenislayanan.show',$jenislayanan->id) }}" enctype='multipart/form-data'>
    @endif
      @method('PUT')
      @csrf
      <input type="hidden" value="$jenislayanan->id" name="id">
        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">Judul</label>
          <div class="col-sm-9">
            <textarea class="form-control custom-txt-area" placeholder="Judul..." name="judul" id="judul" value="{{  $jenislayanan->judul  }}" disabled>{{ $jenislayanan->judul }}</textarea>
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">Deskripsi</label>
          <div class="col-sm-9">
            <textarea class="form-control custom-txt-area" placeholder="Deskripsi" name="deskripsi" id="deskripsi" value="{{  $jenislayanan->deskripsi  }}" disabled>{{ $jenislayanan->deskripsi }}</textarea>
          </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-9">
              <a>
                @if(auth()->user()->roles_id == 1)
                    <a class="btn btn-primary" href="{{ route('super.jenislayanan.index') }}">Kembali</a>
                @elseif(auth()->user()->roles_id == 2)
                    <a class="btn btn-primary" href="{{ route('admin.jenislayanan.index') }}">Kembali</a>
                @endif
              </a>
            </div>
        </div><br><br><br>
        </form>
      </div>
    </div>
  </div>
  <!--./Detail jenislayanan-->

@endsection

