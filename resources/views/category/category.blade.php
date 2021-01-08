@extends('admin/layout')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
	  	<div class="row mb-2">
	    	<div class="col-sm-6">
	      		<h1 class="m-0">Category</h1>
	    	</div>
	    	
	    	<div class="col-sm-6">
	      		<ol class="breadcrumb float-sm-right">
	        		<li class="breadcrumb-item"><a href="/home">Home</a></li>
	        		<li class="breadcrumb-item active">Category</li>
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
		            <div class="card-header">
		            	<div style="float:right;padding-bottom: 20px;"><a href="/category/add"> + Tambah Category Baru</a></div>
		            </div>

		            <div class="card-body table-responsive p-0">
		                <table class="table table-striped table-bordered">
							<tr>
								<th>Id</th>
								<th>Category</th>
								<th>Penulis</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							@foreach($category_data as $p)
							<tr>
								<td>{{ $p->category_id }}</td>
								<td>{{ $p->category_title }}</td>
								<td>{{ $p->nama_penulis }}</td>
								<td>
									@if($p->category_status == '1')
										Aktif
									@else
										Tidak Aktif
									@endif
								</td>
								<td>
									<a href="/category/edit/{{ $p->category_id }}">Edit</a>
									|
									<a href="/category/hapus/{{ $p->category_id }}">Hapus</a>
								</td>
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