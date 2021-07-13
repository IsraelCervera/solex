@extends('layouts.admin')
@section('title','Información de la publicación')
@section('styles')
<link rel="stylesheet" href="{{ asset('estilos/estilos.css')}}">

@endsection
@section('create')

@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{$post->title}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @if (auth()->check())
                @if (auth()->user()->rol=='Administrador')
                <li class="breadcrumb-item"><a href="">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('posts.index')}}">Productos</a></li>
                @endif
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">

                                <img src="{{asset('slug/'.$post->slug)}}" style="max-height: 350px; max-width: 350px;" />
                                {{--  <p>Nombre de proveedor. </p>  --}}


                                <h3>{{$post->name}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información de la publicación</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">

                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Resumen de la publicación</strong>
                                        <p class="text-muted">
                                            {{$post->excerpt}}
                                        </p>
                                        <hr>
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Contenido de la publicación</strong>
                                        <p class="text-muted">
                                            {{$post->body}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-mobile mr-1"></i> iFrame</strong>
                                        <p class="text-muted">
                                            {{$post->iframe}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-mobile mr-1"></i> Fecha de publicación</strong>
                                        <p class="text-muted">
                                            {{$post->created_at}}
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    @if (auth()->check())
                    @if (auth()->user()->rol=='Administrador')
                    <a href="{{route('posts.index')}}" class="btn btn-primary float-right">Lista de Publicaciones</a>
                    @endif
                    @endif
                    <a href="{{route('home')}}" class="btn btn-primary float-right">Regresar al home</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
<script src="{{ asset('melody/js/profile-demo.js') }}"></script>
<script src="{{ asset('melody/js/data-table.js') }}"></script>
@endsection
