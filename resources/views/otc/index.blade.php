@extends('layouts.master')

@section('title')
    Master Karyawan
@endsection

@section('title_page')
    <h1>Master Data Karyawan</h1>
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Master_Karyawan</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-responsive">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Departemen</th>
                  <th>Name</th>
                  <th>email</th>
                  <th>username</th>
                  <th>Role</th>
                  <th>No Karyawan</th>
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
    $(function () {
      $("#example1").DataTable({
            responsive: false,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                    url: '{{ route('otc.data') }}',
                },
            columns: [
                    {data: 'DT_RowIndex', searchable: false, sortable: false},
                    {data: 'departemenName'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'username'},
                    {data: 'role'},
                    {data: 'employeeNo'}
                ],
            })
        
    });
</script>
@endpush