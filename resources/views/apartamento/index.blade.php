@extends('apartamento.master')
@section('content')
<div class="row">
	<div class="col-12 col-md-10">
		<h3>Listagem de apartamento</h3>
	</div>
	<div class="col-12 col-md-2 text-end">
		<a class="btn btn-primary" href="{{route('apartamento.create')}}">Criar novo apartamento</a>
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
		      <th scope="col">Metros Quadrados</th>
		      <th scope="col">Numero de quartos</th>
		      <th scope="col">Ações</th>
		    </tr>
		  	</thead>
		  	<tbody>
	  		@if($apartamento->count() > 0)
			  	@foreach($apartamento as $ap)
			    <tr>
			      <td>{{$loop->index + 1}}</td>
			      <td>{{$ap->metros_quadrados}}</td>
			      <td>{{$ap->numero_quartos}}</td>
			      <td>
  	                <form action="{{ route('apartamento.destroy', $ap->id) }}" method="POST">
                    	<a class="btn btn-info" href="{{ route('apartamento.show', $ap->id) }}">Show</a>
                    	<a class="btn btn-primary" href="{{ route('apartamento.edit', $ap->id) }}">Edit</a>
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
		{!! $apartamento->links() !!}
	</div>
</div>
@endsection