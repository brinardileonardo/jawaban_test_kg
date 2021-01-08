@extends('admin/layout')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
	  	<div class="row mb-2">
	    	<div class="col-sm-6">
	      		<h1 class="m-0">Add Artikel</h1>
	    	</div>
	    	
	    	<div class="col-sm-6">
	      		<ol class="breadcrumb float-sm-right">
	        		<li class="breadcrumb-item"><a href="/home">Home</a></li>
	        		<li class="breadcrumb-item">Artikel</li>
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
                		<form action="/artikel/save" method="POST" enctype="multipart/form-data">
	                		{{ csrf_field() }}
						  	<div class="form-group">
						    	<label>Judul Artikel :</label>
						    	<input type="text" class="form-control" name="judul" required="required">
						  	</div>
						  
						  	<div class="form-group">
						    	<label>Isi Artikel :</label>
						    	<textarea name="isi_artikel" class="form-control" rows="4" cols="50" required="required"></textarea>
						  	</div>

						  	<div class="form-group">
								<label>Gambar Headline :</label> <font color="red">*Max 2MB</font>
								<input class="form-control" type="file" name="file" accept="image/x-png,image/gif,image/jpeg" required=""/>
							</div>
						  
						  	<div class="form-group">
						    	<label>Nama Penulis :</label>
						    	<input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
						    	<input type="hidden" class="form-control" name="id_penulis" value="{{ Auth::user()->id }}" readonly>
						  	</div>

						  	<div class="form-group">
						    	<label>Category :</label>
						    	<select name="category" class="form-control">
								    @foreach($category_data as $c)
								    	<option value="{{$c->category_id}}">{{$c->category_title}}</option>
								    @endforeach
								</select>
						  	</div>


						  	<div class="form-group">
						    	<label>Status Publish :</label>
						    	<select name="status_publish" class="form-control">
						    		@foreach($status_data as $status)
								    	<option value="{{$status->status_code}}">{{$status->status_value}}</option>
								    @endforeach
								</select>
						  	</div>

						  	<input type="submit" value="Simpan" class="btn btn-success pull-right">
						  	<a href="{{ URL::to('artikel') }}" class="btn btn-primary">Kembali</a>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection