@extends('admin/layout')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
	  	<div class="row mb-2">
	    	<div class="col-sm-6">
	      		<h1 class="m-0">Artikel</h1>
	    	</div>
	    	
	    	<div class="col-sm-6">
	      		<ol class="breadcrumb float-sm-right">
	        		<li class="breadcrumb-item"><a href="/home">Home</a></li>
	        		<li class="breadcrumb-item active">Artikel</li>
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
		            	<div style="float:right;padding-bottom: 20px;"><a href="/artikel/add"> + Tambah Artikel Baru</a></div>
		            </div>

		            <div class="card-body table-responsive p-0">
		                <table class="table table-striped table-bordered">
							<tr>
								<th>Id</th>
								<th>Judul Artikel</th>
								<th>Isi Artikel</th>
								<th>Penulis</th>
								<th>Status Publish</th>
								<th>Action</th>
							</tr>
							@foreach($artikel_data as $p)
							<tr>
								<td>{{ $p->artikel_id }}</td>
								<td>{{ $p->artikel_judul }}</td>
								<td>{{ $p->artikel_body }}</td>
								<td>{{ $p->nama_penulis }}</td>
								<td>{{ $p->status_value }}</td>
								<td>
									@if($p->author_id == Auth::user()->id)
										<a href="/artikel/edit/{{ $p->artikel_id }}">Edit</a>
										|
										<a href="/artikel/hapus/{{ $p->artikel_id }}">Hapus</a>
									@endif
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