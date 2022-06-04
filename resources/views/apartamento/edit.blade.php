@extends('apartamento.master')
@section('content')
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Editar Apartamento</h3>
	</div>
	<div class="col-12 col-md-2 text-end">
		<a class="btn btn-primary" href="{{route('apartamento.index')}}">Voltar para a listagem de apartamento</a>
	</div>
</div>
@if($errors->any())
<div class="row">
	<div class="col-12">
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Some error occured!</strong>
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  <ul>
		  	@foreach($errors->all() as $error)
		  	<li>{{$error}}</li>
		  	@endforeach
		  </ul>
		</div>
	</div>
</div>
@endif
<div class="row">
	<div class="col-12">
		<form method="POST" action="{{route('apartamento.update', $apartamento->id)}}">
			@csrf
			@method('PUT')
			<div class="mb-3">
			    <label for="post_title" class="form-label">Metros Quadrados</label>
			    <input type="text" class="form-control" id="metros_quadrados" name="metros_quadrados" value="{{$apartamento->metros_quadrados}}">
		  	</div>
		  	<div class="mb-3">
			    <label for="post_content" class="form-label">Número de Quartos</label>
			    <textarea class="form-control" id="numero_quartos" name="numero_quartos">{{$apartamento->numero_quartos}}</textarea>
		  	</div>
		  	<button type="submit" class="btn btn-primary">Editar</button>
		</form>
	</div>
</div>
@endsection