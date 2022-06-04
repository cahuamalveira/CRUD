@extends('morador.master')
@section('content')
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Editar morador</h3>
	</div>
	<div class="col-12 col-md-2 text-end">
		<a class="btn btn-primary" href="{{route('morador.index')}}">Voltar para a listagem de morador</a>
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
		<form method="POST" action="{{route('morador.update', $morador->id)}}">
			@csrf
			@method('PUT')
			<div class="mb-3">
				<label for="nome" class="form-label">Nome</label>
				<input type="text" class="form-control" value="{{$morador->nome}} id="nome" name="nome" placeholder="nome">
			</div>
			<div class="mb-3">
				<label for="telefone" class="form-label">Telefone</label>
				<input type="text" id="telefone" name="telefone" value="{{$morador->telefone}} placeholder="telefone"></textarea>
			</div>

			<div class="mb-3">
				<label for="email" class="form-label">E-mail</label>
				<input type="email" id="email" name="email" value="{{$morador->email}} placeholder="email"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Editar</button>
		</form>
	</div>
</div>
@endsection