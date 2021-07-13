@extends('layout')

@section('contenido')

<h1>Usuario</h1>
<p>Registro de {{ $users->name }} - {{ $users->email }}</p>
<p>{{ $users->rol }}</p>
@stop