@extends('layouts.admin.app')

@section('title', 'Layanan')

@section('content')

<!--Layanan-->
<div class="col-lg-12 form-wrapper" id="layanan">
    <div class="container">
        <h4 class="card-title mb-4"><b>Service Pelayanan</b></h4>
        <div class="d-flex justify-content-end">
            @if(auth()->user()->roles_id == 1)
                <a href="{{ route('super.layanan.create') }}" class="btn btn-dark btn-sm mb-4">Tambah</a>
            @endif
        </div>
        @foreach ($layanans as $layanan)
        <div class="row mb-3">
            @if(auth()->user()->roles_id == 1)
                <a href="{{ route('super.layanan.show',$layanan->id) }}" class="col-2 bg-secondary text-white d-flex align-items-center rounded-start">
                    @if ($layanan->ikon_layanan == Null)
                        <img src="{{ asset('assets/ikon') }}/default.png" alt="ikon" height="40" width="40"/>
                    @else
                        <img src="{{ asset('assets/ikon') }}/{{ $layanan->ikon_layanan }}" alt="ikon" height="40" width="40"/>
                    @endif
                </a>
                <a href="{{ route('super.layanan.show',$layanan->id) }}" class="col-5 bg-secondary text-white d-flex align-items-center text-center rounded-end">
                    <b>{{ $layanan->nama_layanan }}</b>
                </a>
            @endif
            <div class="col-5 text-right">
                @if(auth()->user()->roles_id == 1)
                    <a href="{{ route('super.layanan.edit',$layanan->id) }}">
                    <button 
                        class="btn btn-dark btn-sm mb-3 ml-1 mt-1 p-1"
                    >
                        Edit
                    </button>
                </a>
                <button type="submit" class="btn btn-dark btn-sm mb-3 ml-1 mt-1 p-1" role="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm{{$layanan->id}}">
                    Hapus
                </button>
                <!-- Modal -->
                <div class="modal fade bd-example-modal-sm{{$layanan->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><strong>Hapus Layanan?</strong></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-footer">
                                <form action="{{route('super.layanan.destroy', $layanan->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-dark light" name="" id="" value="Ya">
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Tidak</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@include('menu')
<!--./Layanan-->

@endsection