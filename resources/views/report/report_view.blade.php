@extends('admin/layout')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
	  	<div class="row mb-2">
	    	<div class="col-sm-6">
	      		<h1 class="m-0">Report</h1>
	    	</div>
	    	
	    	<div class="col-sm-6">
	      		<ol class="breadcrumb float-sm-right">
	        		<li class="breadcrumb-item"><a href="/home">Home</a></li>
	        		<li class="breadcrumb-item active">Report</li>
	      		</ol>
	    	</div>
	  	</div>
	  	<hr/>
	</div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
		    <div class="col-12">
		        <div class="card">
		            <div class="card-body table-responsive p-0">
		                <table class="table table-striped table-bordered">
							<tr>
								<th>Nama Penulis</th>
								<th>Jumlah Artikel</th>
							</tr>
							@foreach($report_data as $p)
							<tr>
								<td>{{ $p->nama_penulis }}</td>
								<td>{{ $p->jumlah_artikel }}</td>
							</tr>
							@endforeach
						</table>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection