@extends('layouts.master')

@section('title')
    Master Kehadiran
@endsection

@section('title_page')
    <h1>Master Kehadiran</h1>
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Master_Kehadiran</li>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body">
                <form action="" class="form-kode-kendaraan">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <label for="kode_produk" class="col-lg-2">Tanggal</label>
                        </div>
                        <div class="row">
                              <div class="input-group">
                                <input type="date" class="date1">
                              </div>
                              <div class="input-group">
                                  <input type="date" class="date2">
                                  <span class="input-group-btn">
                                      <button class="btn btn-info btn-flat" type="button" id="cari">Cari</button>
                                  </span>
                              </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
    <div class="card mt-3">
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-responsive">
            <thead>
            <tr>
              <th>No</th>
              <th width="500px">Nama</th>
              <th>Kehadiran</th>
              <th>Uang Makan</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->                    
</div><!-- /.container-fluid -->
@endsection

@push('script')
<script>
  let table;
    $(function () {
      table = $("#example1").DataTable({
            responsive: false,
            processing: true,
            serverSide: false,
            autoWidth: false,
            data:[],
            columns: [
                    {data: 'DT_RowIndex', searchable: false, sortable: false},
                    {data: 'name'},
                    {data: 'kehadiran'},
                    {data: 'uang_makan'},
                ],
            })
        
    });

    $('#cari').on("click", function(event){
      let tanggal_awal = $('.date1').val();
      let tanggal_akhir = $('.date2').val();
      table.ajax.url('makan/'+tanggal_awal+'/'+tanggal_akhir);
      table.ajax.reload();
    })
</script>
@endpush