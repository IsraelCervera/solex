@extends('layout')

@section('contenido')
<h1>Editar Comentario</h1>

<form class="form-inline" method="POST" action="{{ route('comentarios.update', $comments->id) }}">

{!! method_field('PUT') !!}
{{ csrf_field() }}
@if ($errors->any())
    <div class="alert alert-danger">
     	<ul>
	        @foreach ($errors->all() as $error)
	        <li>{{ $error }}</li>
	        @endforeach
	    </ul>
	</div>
@endif

<label for="body">
	Comentario<br>
	<textarea class="form-control" name="body">{{ $comments->body }}</textarea>
</label><br><br>
<input class="btn btn-primary" type="submit" value="Enviar">
	
</form>
@stop