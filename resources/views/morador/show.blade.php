@extends('morador.master')
@section('content')
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Detalhes do morador</h3>
	</div>
	<div class="col-12 col-md-2 text-end">
		<a class="btn btn-primary" href="{{route('morador.index')}}">Voltar para a listagem de moradores</a>
	</div>
</div>
<div class="row">
	<div class="col-12 mb-3">
		<strong>Nome: </strong>
		{!! $morador->nome !!}
	</div>
	<div class="col-12 mb-3">
		<strong>Telefone: </strong>
		{!! $morador->telefone !!}
	</div>
	<div class="col-12 mb-3">
		<strong>Email: </strong>
		{!! $morador->email !!}
	</div>
</div>
@endsection