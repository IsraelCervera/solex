@extends('layouts.admin')
@section('title','Gestión de publicaciones')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
      }
</style>

@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Publicaciones
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Publicaciones</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Publicaciones</h4>
                        {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="{{route('posts.create')}}" class="dropdown-item">Agregar Publicación</a> 
                            </div>
                          </div>
                    </div>

                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Titulo</th>
                                    <th>Extracto</th>
                                    <th>Texto</th>
                                    <th>Publicado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <th scope="row">{{$post->id}}</th>
                                    <td>
                                        <a href="{{route('posts.show',$post)}}">{{$post->title}}</a>
                                    </td>
                                    <td>{{$post->excerpt}}</td>
                                    <td>{{$post->body}}</td>
                                    <td>{{$post->created_at}}</td>
                                    <td style="width: 50px;">

                                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('posts.edit', $post)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <form style="display:inline" method="POST" action="{{ route('posts.destroy', $post) }}">
                                        {{ csrf_field() }}
                                        {!! method_field('DELETE') !!}
                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
@endsection
