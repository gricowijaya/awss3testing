@extends('layout.index')

@section('body')

	@if ($message = Session::get('Success'))
		<div class="alert alert-success" role="alert">
			{{$message}}
		</div>
		<img src="{{Session::get('image')}}"
	@endif

	@if (count($errors) > 0)
		<div class="alert alert-danger" role="alert">
			@foreach ($errors->all() as $msg)
				<p>{{$msg}}	</p> <br>
			@endforeach
		</div>
	@endif

	<form action="{{route('upload-image')}}" method="POST" enctype="multipart/form-data">
	@csrf
		<div class="mb-3">
			<label for="formFile" class="form-label">Masukkan Gambar</label>
			<input class="form-control" type="file" name="image" id="image">
		</div>
		<div class="mb-3">
			<button type="submit" class="btn btn-success">Upload</button>
		</div>
	</form>

@endsection
