@extends('apartamento.master')
@section('content')
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Criar novo apartamento</h3>
	</div>
	<div class="col-12 col-md-2 text-end">
		<a class="btn btn-primary" href="{{route('apartamento.index')}}">voltar para a listagem de apartamentos</a>
	</div>
</div>
@if($errors->any())
<div class="row">
	<div class="col-12">
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>ocorreram erros ao enviar o formulário:</strong>
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
		<form method="POST" action="{{route('apartamento.store')}}">
			@csrf
			<div class="mb-3">
			    <label for="metros_quadrados" class="form-label">Metros Quadrados</label>
			    <input type="number" class="form-control" id="metros_quadrados" name="metros_quadrados" placeholder="metros quadrados">
		  	</div>
		  	<div class="mb-3">
			    <label for="numero_quartos" class="form-label">Número de Quartos</label>
			    <input type="number" class="form-control" id="numero_quartos" name="numero_quartos" placeholder="numero de quartos"></textarea>
		  	</div>
		  	<button type="submit" class="btn btn-primary">Criar</button>
		</form>
	</div>
</div>
@endsection