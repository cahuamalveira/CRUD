@extends('apartamento.master')
@section('content')
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Detalhes do apartamento</h3>
	</div>
	<div class="col-12 col-md-2 text-end">
		<a class="btn btn-primary" href="{{route('apartamento.index')}}">Voltar para a listagem de apartamentos</a>
	</div>
</div>
<div class="row">
	<div class="col-12 mb-3">
		<strong>Metros quadrados: </strong>
		{!! $apartamento->metros_quadrados !!}
	</div>
	<div class="col-12 mb-3">
		<strong>Número de quartos: </strong>
		{!! $apartamento->numero_quartos !!}
	</div>
</div>
@endsection