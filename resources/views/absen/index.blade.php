@extends('layouts.master')

@section('title')
    Master Absensi
@endsection

@section('title_page')
    <h1>Master Absensi</h1>
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Master_Absensi</li>
@endsection

@section('content')
<div class="container-fluid">
    {{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif
 
		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $sukses }}</strong>
		</div>
		@endif
 
		<button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
			IMPORT EXCEL
		</button>
 
		<!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/absen/import" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import From Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>
 
    <div class="card mt-3">
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-responsive">
            <thead>
            <tr>
              <th>No</th>
              <th width="30%">Date</th>
              <th width=20%>ID</th>
              <th>Name</th>
              <th>Status</th>
              <th>First Check In</th>
              <th>Last Check Out</th>
              <th>Duration</th>
              <th>Actual</th>
              <th>Overtime</th>
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
            responsive: true,
            processing: true,
            serverSide: false,
            autoWidth: false,
            ajax: {
                    url: '{{ route('absen.data') }}',
                },
            columns: [
                    {data: 'DT_RowIndex', searchable: false, sortable: false},
                    {data: 'Date'},
                    {data: 'id'},
                    {data: 'name', sortable: false},
                    {data: 'status', sortable: false},
                    {data: 'check_in', sortable: false},
                    {data: 'last_check_out', sortable: false},
                    {data: 'duration'},
                    {data: 'actual'},
                    {data: 'overtime'}
                ],
            })
        
    });
</script>
@endpush