@extends('layouts.app')

@section('title', 'Kelola user')

@section('content')

<!--Tabel user-->

<div class="col-lg-12col-lg-12 form-wrapper" id="kelola-user">

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Kelola Tabel user</h4>
        </div>
        <div class="card-body">
          @if (session('sukses'))
          <div class="alert alert-success">
            {{ session('sukses') }}
          </div>
          @elseif (session('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
          </div>
          @endif
          <div class="container">
            <div class="panel">
            <div class="panel-heading border">
            </div>
          <div class="panel-body">
            <table id="example1" class="table table-bordered table-striped fs-6">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>email </th>
                    <th>Roles ID</th>
                    <th>More</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles_id }}</td>
                    <td class="manage-row">
                    @if(auth()->user()->roles_id == 1)
                      <a href="{{ route('super.user.show',$user->id) }}" class="edit-button">
                        <i class="fa-solid fa-eye"></i>
                      </a>
                      <a href="{{ route('super.user.edit',$user->id) }}" class="edit-button">
                        <i class="fa-solid fa-marker"></i>
                      </a>
                      <!-- Button trigger modal -->
                      <a role="button"  class="delete-button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm{{$user->id}}">
                        <i class="fa-solid fa-trash-can"></i>
                      </a>
                      <!-- Modal -->
                      <div class="modal fade bd-example-modal-sm{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="false">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><strong>Hapus Data</strong></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body">Apakah anda yakin ingin menghapus data?</div>
                                <div class="modal-footer">
                                    <form action="{{route('super.user.destroy', $user->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-danger light" name="" id="" value="Hapus">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tidak</button>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
                {{-- link paginate --}}
            </table>
          </div>
          </div>
        </div>
        </div>
      </div>
    </div>
    <!--./Tabel user-->
@endsection