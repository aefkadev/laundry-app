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
                      <select class="col-sm-9 col-form-label rounded-2" name="search-input" id="search-input">
                        <option value="jan">Januari</option>
                        <option value="feb">Februari</option>
                        <option value="mar">Maret</option>
                        <option value="apr">April</option>
                        <option value="may">Mei</option>
                        <option value="jun">Juni</option>
                        <option value="jul">Juli</option>
                        <option value="aug">Agustus</option>
                        <option value="sept">September</option>
                        <option value="oct">Oktober</option>
                        <option value="nov">November</option>
                        <option value="dec">Desember</option>
                      </select>
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

  const searchInput = document.getElementById('search-input');
  const table = document.getElementById('example1');

  searchInput.addEventListener('input', () => {
    const searchValue = searchInput.value.toLowerCase();
    const rows = table.querySelectorAll('tbody tr');

    rows.forEach((row) => {
      const dateCell = row.querySelector('td:first-child');
      const date = new Date(dateCell.textContent);

      if (date && date.toLocaleString('default', { month: 'long' }).toLowerCase().indexOf(searchValue) === -1) {
        row.classList.add('d-none');
      } else {
        row.classList.remove('d-none');
      }
    });
  });

</script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
@endsection
