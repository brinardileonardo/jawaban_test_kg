@extends('admin/layout')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
	  	<div class="row mb-2">
	    	<div class="col-sm-6">
	      		<h1 class="m-0">Edit Artikel</h1>
	    	</div>
	    	
	    	<div class="col-sm-6">
	      		<ol class="breadcrumb float-sm-right">
	        		<li class="breadcrumb-item"><a href="/home">Home</a></li>
	        		<li class="breadcrumb-item">Artikel</li>
	        		<li class="breadcrumb-item active">Edit</li>
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
						@foreach($artikel_data as $p)
	                	<form action="/artikel/update" method="POST" enctype="multipart/form-data">
	                		{{ csrf_field() }}
							<input type="hidden" name="id" value="{{ $p->artikel_id }}">

						  	<div class="form-group">
						    	<label>Judul Artikel :</label>
						    	<input type="text" class="form-control" name="judul" required="required" value="{{ $p->artikel_judul}}">
						  	</div>
						  
						  	<div class="form-group">
						    	<label>Isi Artikel :</label>
						    	<textarea name="isi_artikel" class="form-control" rows="4" cols="50" required="required">{{ $p->artikel_body }}</textarea>
						  	</div>

						  	<div class="form-group">
								<label>Gambar Headline Lama:</label><br/>
								<img width="300px" height="250px" src="{{ url($p->path_image) }}"/>
							</div>

							<div class="form-group">
								<label>Gambar Headline Baru:</label><br/>
								<input class="form-control" type="file" name="file_baru" accept="image/x-png,image/gif,image/jpeg" />
							</div>
						  
						  	<div class="form-group">
						    	<label>Nama Penulis :</label>
						    	<input type="text" class="form-control" value="{{$p->nama_penulis}}" readonly>
						  	</div>

						  	<div class="form-group">
						    	<label>Category :</label>
						    	<select name="category" class="form-control">
								    @foreach($category_data as $c)
								    	<option value="{{$c->category_id}}" 
								    		@if ($c->category_id == $p->category_id)
								    		 	selected
								    		@endif
								    		>
								    		{{$c->category_title}}
								    	</option>
								    @endforeach
								</select>
						  	</div>


						  	<div class="form-group">
						    	<label>Status Publish :</label>
						    	<select name="status_publish" class="form-control">
						    		@foreach($status_data as $status)
								    	<option value="{{$status->status_code}}" 
								    		@if ($status->status_code == $p->status_publish)
								    		 	selected
								    		@endif
								    		>
								    		{{$status->status_value}}
								    </option>
								    @endforeach
								</select>
						  	</div>

						  	<input type="submit" value="Simpan" class="btn btn-success pull-right">
						  	<a href="{{ URL::to('artikel') }}" class="btn btn-primary">Kembali</a>
						</form>
						@endforeach
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection