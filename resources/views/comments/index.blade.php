@extends('layout')

@section('contenido')
<h1>Comentarios</h1>
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Comentario</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($comments as $comment)
		<tr>
			<td><a href="{{ route('comentarios.show', $comment->id) }}">
			{{ $comment->id }} </a></td>
			<td>{{ $comment->body }}</td>
			<td><button class="btn btn-info" onclick="location.href='{{ route('comentarios.edit', $comment->id) }}'">
			Editar</button>

			<form style="display:inline" method="POST" action="{{ 
				route('comentarios.destroy', $comment->id) }}">

                {{ csrf_field() }}
                {!! method_field('DELETE') !!}
					<button class="btn btn-danger" type="submit">Eliminar</button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop