@extends('layouts.admin.app')

@section('title', 'Layanan')

@section('content')

  <!--Layanan-->
  <div class="col-lg-12 col-lg-12 form-wrapper" id="layanan">
      <div class="card">
      <div class="card-header">
      <h4 class="card-title"><b>Service Pelayanan</b></h4>
      <div class="d-flex justify-content-end"><button type="submit" class="btn btn-dark btn-sm">Tambah</button></div>
      <div class="card-body">
        <h4 class="card-title mb-2 p-2 bg-secondary text-white rounded-3">
          <img src="assets/img/splash1.png" alt="" height="40" width="40">
          <b>Premium Deep Clean</b> 
        </h4>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-dark btn-sm mb-3 ml-1 mt-2 p-2 ">Edit</button>
          <button type="submit" class="btn btn-dark btn-sm mb-3 ml-1 mt-2 p-2 ">Hapus</button>
        </div>
        <h4 class="card-title mb-2 p-2 bg-secondary text-white rounded-3">
          <img src="assets/img/splash1.png" alt="" height="40" width="40">
          <b>Repaint</b> 
        </h4>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-dark btn-sm mb-3 ml-1 mt-2 p-2 ">Edit</button>
          <button type="submit" class="btn btn-dark btn-sm mb-3 ml-1 mt-2 p-2 ">Hapus</button>
        </div>
      </div>
      </div>
    </div>
    <!--./Layanan-->

@endsection