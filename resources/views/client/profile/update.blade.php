@extends('layouts.client.app')

@section('title', 'Edit Profile')

@section('content')
<div class="col-lg-12 col-lg-12 vh-100 d-flex justify-content-center flex-column" id="edit-user">
    <div class="card mx-lg-4" style="background-color: #AD48FA; color: #f1f1f1">
      <section class="nav-section py-3 px-4 d-flex align-items-center gap-1" style="font-size: 20px;">
        <a href="/member"><i class="fa-solid fa-arrow-left font-weight-bolder text-white"></i>
          <span class="fw-bolder px-2" style="color: #E2DFEB;">Edit Profile</span>
        </a>
      </section>
    <div class="card-body">
      @if(auth()->user()->roles_id == 3)
          <form method="POST" action="{{ route('member.profile.update', $user->id) }}" enctype='multipart/form-data'>
      @endif
      @csrf
      @method('PUT')
      <div class="d-flex flex-column justify-content-center align-items-center mb-3">
          <label for="gambar_user">
              @if ($user->gambar_user == Null)
                  <img src="{{ asset('assets/profile') }}/default.png" class="img-circle elevation-2" style="width:200px !important; height:200px !important;" alt="">
                  <input type="file" class="visually-hidden @error('gambar_user') is-invalid @enderror" accept="image/*" onchange="loadFile(event)" placeholder="gambar_user" name="gambar_user" id="gambar_user" enabled>
                  @error('gambar_user')
                      <span class="invalid-feedback text-center" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              @else
                  <img src="{{ asset('assets/profile') }}/{{ $user->gambar_user }}" style="width:200px !important; height:200px !important;" class="img-circle elevation-2" alt="">
                  <input type="file" class="visually-hidden @error('gambar_user') is-invalid @enderror" accept="image/*" onchange="loadFile(event)" placeholder="gambar_user" name="gambar_user" id="gambar_user" enabled>
                  @error('gambar_user')
                      <span class="invalid-feedback text-center" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              @endif
          </label>
          <img src="" id="output" style="width:200px; height:200px;" class="img-circle elevation-2 position-absolute visually-hidden" alt="">
        </div>
        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-9">
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name" name="name" id="name" value="{{$user->name}}" enabled>
            @error('name')
              <span class="invalid-feedback text-center" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-9">
            <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="email" name="email" id="email" value="{{$user->email}}" enabled>
            @error('email')
              <span class="invalid-feedback text-center" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">No Telepon</label>
          <div class="col-sm-9">
            <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" placeholder="no_telepon" name="no_telepon" id="no_telepon" value="{{$user->no_telepon}}" enabled>
            @error('no_telepon')
              <span class="invalid-feedback text-center" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">Password Baru</label>
          <div class="col-sm-9">
            <input type="text" class="form-control @error('password') is-invalid @enderror" placeholder="password" name="password" id="password" enabled>
            @error('password')
              <span class="invalid-feedback text-center" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="mb-3 row">
          <div class="col-sm-9">
            <button type="submit" class="btn" style="background-color: #D6C37E;">Simpan</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@section('script')
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
      output.classList.remove("visually-hidden");
    }
  };
</script>
@endsection