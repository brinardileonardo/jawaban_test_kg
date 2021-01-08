@extends('admin/layout')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
	  	<div class="row mb-2">
	    	<div class="col-sm-6">
	      		<h1 class="m-0">Add Category</h1>
	    	</div>
	    	
	    	<div class="col-sm-6">
	      		<ol class="breadcrumb float-sm-right">
	        		<li class="breadcrumb-item"><a href="/home">Home</a></li>
	        		<li class="breadcrumb-item">Category</li>
	        		<li class="breadcrumb-item active">Add</li>
	      		</ol>
	    	</div>
	  	</div>
	  	<hr/>
	</div>
</div>
<!-- /.content-header -->

<div class="content">
	<div class="container-fluid">
		<div class="row">
		    <div class="col-12">
		        <div class="card">
		            <div class="card-header">
                		<form action="/category/save" method="POST">
	                		{{ csrf_field() }}
						  	<div class="form-group">
						    	<label>Judul Category :</label>
						    	<input type="text" class="form-control" name="category" required="required">
						  	</div>
						  
						  	<div class="form-group">
						    	<label>Nama Penulis :</label>
						    	<input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
						    	<input type="hidden" class="form-control" name="id_penulis" value="{{ Auth::user()->id }}" readonly>
						  	</div>

						  	<input type="submit" value="Simpan" class="btn btn-success pull-right">
						  	<a href="{{ URL::to('category') }}" class="btn btn-primary">Kembali</a>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection