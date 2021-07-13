@extends('layouts.admin')
@section('title','Registrar publicación')
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
            Registro de publicaciones
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Publicación</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de publicaciones</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de publicaciones</h4>
                    </div>
                    <form method="POST" files=true action="{{ route('posts.store') }}" enctype="multipart/form-data">
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
                   

                    <div class="card-body">
                        <h4 class="card-title d-flex">Imagen de la publicación
                          <small class="ml-auto align-self-end">
                            <a href="dropify.html" class="font-weight-light" target="_blank">Seleccionar Archivo</a>
                          </small>
                        </h4>
                        <input type="file"  name="picture" id="picture" class="dropify" />
                    </div>
                    <div class="form-group">
                      <label for="title">Titulo</label>
                      <input type="text" name="title" id="title" class="form-control" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                      <label for="excerpt">Resumen de publicación</label>
                      <textarea class="form-control" name="excerpt" id="excerpt" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="body">Contenido de la publicación</label>
                      <textarea class="form-control" name="body" id="body" rows="3"></textarea>
                    </div>
                    {{--  <div class="custom-file mb-4">
                        <input type="file" class="custom-file-input" name="picture" id="picture" lang="es">
                        <label class="custom-file-label" for="image">Seleccionar Archivo</label>
                    </div>  --}}

                     <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                     <a href="{{route('products.index')}}" class="btn btn-light">
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
<script src="{{ asset('melody/js/data-table.js') }}"></script>
<script src="{{ asset('melody/js/dropify.js') }}"></script>
@endsection
