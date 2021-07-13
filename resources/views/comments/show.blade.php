@extends('layout')

@section('contenido')
<h1>Comentario</h1>
<p>Comentario de {{ $comments->user->name }} {{ $comments->user->lastname }}</p>
<p>{{ $comments->body }}</p>
@stop