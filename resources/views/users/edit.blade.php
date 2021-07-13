@extends('layout')

@section('contenido')

        <link rel="stylesheet" href="{{ asset('estilos/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('estilos/estilos.css')}}">
        <link rel="stylesheet" href="{{ asset('estilos/plugins/sweetalert2/sweetalert2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('estilos/fuentes/iconic/css/material-design-iconic-font.min.css')}}"> 

<h1>Editar Usuario</h1>

<form class="form-inline" method="POST" action="{{ route('users.update', $users->id) }}">

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

<label for="name">
	Nombre
	<input class="form-control" type="text" name="name" value="{{ $users->name }}">
</label>
<br><br>
<label for="lastname">
	Apellido
	<input class="form-control" type="text" name="lastname" value="{{ $users->lastname }}">
</label><br><br>
<label for="email">
	Email
	<input class="form-control" type="text" name="email" value="{{ $users->email }}">
</label><br><br>
<label for="phone">
	Teléfono
	<input class="form-control" type="number" name="phone" value="{{ $users->phone }}">
</label><br><br>
<label for="address">
	Dirección
	<input class="form-control" type="address" name="address" value="{{ $users->address }}">
</label><br><br>
<label for="state">
	Dirección
	<input class="form-control" type="state" name="state" value="{{ $users->state }}">
</label><br><br>
<label for="cp">
	Dirección
	<input class="form-control" type="cp" name="cp" value="{{ $users->cp }}">
</label><br><br>
<label for="rol">
	Rol
	<input class="form-control" type="text" name="rol" value="{{ $users->rol }}">
</label><br><br>
<label for="password">
	Contraseña
	<input class="form-control" type="text" name="password" value="{{ $users->password}}">
</label><br><br>
<input class="btn btn-primary" type="submit" value="Enviar">
	
</form>

@stop