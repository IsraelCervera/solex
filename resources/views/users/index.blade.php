@extends('layout')

@section('contenido')
<h1>Usuarios</h1>

        <link rel="stylesheet" href="{{ asset('estilos/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('estilos/estilos.css')}}">
        <link rel="stylesheet" href="{{ asset('estilos/plugins/sweetalert2/sweetalert2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('estilos/fuentes/iconic/css/material-design-iconic-font.min.css')}}"> 

<button class="btn btn-info" onclick="location.href='{{ route('users.create') }}'">Agregar</button>
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Rol</th>
			<td>Contraseña</td>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($users as $user)
		<tr>
			<td><a href="{{ route('users.show', $user->id) }}">
			{{ $user->id }} </a></td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->lastname }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->phone }}</td>
			<td>{{ $user->rol }}</td>
			<td>{{ $user->password }}</td>
			<td><button class="btn btn-info" onclick="location.href='{{ route('users.edit', $user->id) }}'">
			Editar</button>

			<form style="display:inline" method="POST" action="{{ 
				route('users.destroy', $user->id) }}">

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