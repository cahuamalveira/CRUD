@extends('morador.master')
@section('content')
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Listagem de moradores</h3>
	</div>
	<div class="col-12 col-md-2 text-end">
		<a class="btn btn-primary" href="{{route('morador.create')}}">Criar novo morador</a>
	</div>
</div>
@if($message = Session::get('error'))
<div class="row">
	<div class="col-12">
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>{{$message}}!</strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	</div>
</div>
@endif
<div class="row">
	<div class="col-12">
		<table class="table table-primary">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nome</th>
					<th scope="col">Telefone</th>
					<th scope="col">Email</th>
					<th scope="col">Número apartamento</th>
					<th scope="col">Ações</th>
				</tr>
			</thead>
			<tbody>
				@if($morador->count() > 0)
				@foreach($morador as $mo)
				<tr>
					<td>{{$loop->index + 1}}</td>
					<td>{{$mo->nome}}</td>
					<td>{{$mo->telefone}}</td>
					<td>{{$mo->email}}</td>
					<td>{{$mo->apartamento_id}}</td>
					<td>
						<form action="{{ route('morador.destroy', $mo->id) }}" method="POST">
							<a class="btn btn-info" href="{{ route('morador.show', $mo->id) }}">Show</a>
							<a class="btn btn-primary" href="{{ route('morador.edit', $mo->id) }}">Edit</a>
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
				@else
				<tr>
					<td colspan="4">Record not found!</td>
				</tr>
				@endif
			</tbody>
		</table>
		{!! $morador->links() !!}
	</div>
</div>
@endsection