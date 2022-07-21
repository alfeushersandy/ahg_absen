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
                  <th>NIK</th>
                  <th>Email</th>
                  <th>Nama</th>
                  <th>Gender</th>
                  <th>Birthday</th>
                  <th>Nationality</th>
                  <th>National ID</th>
                  <th>Religion</th>
                  <th>Date Joined</th>
                  <th>Job Title</th>
                  <th>Departemen</th>
                  <th>Branch</th>
                  <th>Level</th>
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
    $(function () {
      $("#example1").DataTable({
            responsive: false,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                    url: '{{ route('karyawan.data') }}',
                },
            columns: [
                    {data: 'DT_RowIndex', searchable: false, sortable: false},
                    {data: 'nik'},
                    {data: 'email'},
                    {data: 'name'},
                    {data: 'gender'},
                    {data: 'birthday'},
                    {data: 'nationality'},
                    {data: 'national_id'},
                    {data: 'religion'},
                    {data: 'date_joined'},
                    {data: 'job_title'},
                    {data: 'departemen'},
                    {data: 'branch'},
                    {data: 'level'},
                    {data: 'nominal'},
                ],
            })
        
    });
</script>
@endpush