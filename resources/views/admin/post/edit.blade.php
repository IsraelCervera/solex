@extends('layouts.admin')
@section('title','Editar publicación')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Edición de publicaciones
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('posts.index')}}">Publicación</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de publicación</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edición de publicación</h4>
                    </div>

                    <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
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


                    <div class="form-group">
                      <label for="title">Titulo</label>
                      <input type="text" name="title" id="title" value="{{$post->title}}" class="form-control" aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                        <label for="excerpt">Resumen de la publicación</label>
                        <textarea class="form-control" name="excerpt" id="excerpt" rows="3">{{$post->excerpt}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="body">Contenido de la publicación</label>
                        <textarea class="form-control" name="body" id="body" rows="3">{{$post->body}}</textarea>
                    </div>
                   
                    <div class="card-body">
                        <h4 class="card-title d-flex">Imagen de publicación
                          <small class="ml-auto align-self-end">
                            <a href="dropify.html" class="font-weight-light" target="_blank">Seleccionar Archivo</a>
                          </small>
                        </h4>
                        <input type="file"  name="picture" id="picture" class="dropify" />
                    </div>

                     <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                     <a href="{{route('posts.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                     </form>
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$products->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('melody/js/dropify.js') }}"></script>
@endsection
