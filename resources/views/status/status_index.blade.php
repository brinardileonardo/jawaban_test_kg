@extends('admin/layout')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
	  	<div class="row mb-2">
	    	<div class="col-sm-6">
	      		<h1 class="m-0">Status</h1>
	    	</div>
	    	
	    	<div class="col-sm-6">
	      		<ol class="breadcrumb float-sm-right">
	        		<li class="breadcrumb-item"><a href="/home">Home</a></li>
	        		<li class="breadcrumb-item active">Status</li>
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
								<th>Id</th>
								<th>Status Code</th>
								<th>Status Value</th>
							</tr>
							@foreach($status_data as $p)
							<tr>
								<td>{{ $p->status_id }}</td>
								<td>{{ $p->status_code }}</td>
								<td>{{ $p->status_value }}</td>
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