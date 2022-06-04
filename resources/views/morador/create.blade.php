@extends('morador.master')
@section('content')
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Criar novo morador</h3>
	</div>
	<div class="col-12 col-md-2 text-end">
		<a class="btn btn-primary" href="{{route('morador.index')}}">Go Back to morador</a>
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
		<form method="POST" action="{{route('morador.store')}}">
			@csrf
			<div class="mb-3">
				<label for="nome" class="form-label">Nome</label>
				<input type="text" class="form-control" id="nome" name="nome" placeholder="nome">
			</div>
			<div class="mb-3">
				<label for="telefone" class="form-label">Telefone</label>
				<input type="text" id="telefone" name="telefone" placeholder="telefone">
			</div>

			<div class="mb-3">
				<label for="email" class="form-label">E-mail</label>
				<input type="email" id="email" name="email" placeholder="email">
			</div>

			<div class="mb-3">
				<label for="apartamento_id" class="form-label">Número do apartamento</label>
				<input type="number" id="apartamento_id" name="apartamento_id" placeholder="numero do apartamento Ex. 410">
			</div>
			<button type="submit" class="btn btn-primary">Criar</button>
		</form>
	</div>
</div>
@endsection