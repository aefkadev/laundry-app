@extends('layouts.admin.app')

@section('title', 'Laporan')

@section('content')

<div class="col-lg-12 form-wrapper pb-5" id="laporan">
  <form action="">
    <div class="container">
        <div class="card">
            <div class="card-header">
              <h4 class="text-center">
                  <b>Laporan Pembukuan</b>
              </h4>
          </div>
              <div class="py-3 px-4 row">
                    <label class="col-sm-3 col-form-label"
                        >Bulan :
                    </label>
                    @if(auth()->user()->roles_id == 1)
                      <form action="{{route('super.transaksi.search')}}" method="POST" enctype='multipart/form-data'>
                    @elseif(auth()->user()->roles_id == 2)
                      <form action="{{route('admin.transaksi.search')}}" method="POST" enctype='multipart/form-data'>
                    @endif
                      <select class="col-sm-9 col-form-label rounded-2" name="bulan" id="bulan">
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                      </select>
                    </form>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped fs-6">
                  <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Transaksi</th>
                    <th>Nominal</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($laporans as $transaksi)
                    <tr>
                      <td>{{$transaksi->waktu_order}}</td>
                      <td>{{$transaksi->jenis_transaksi}}</td>
                      <td>{{$transaksi->harga_order}}</td>
                    </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Tanggal</th>
                    <th>Transaksi</th>
                    <th>Nominal</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            @include('admin.menu')
    </div>
  </form>
</div>

@endsection

@section('script')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
@endsection
