@extends('layouts.admin')
@section('title','Gestión de la empresa')
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
            Empresa
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Empresa</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Empresa</h4>
                        {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="{{route('businesses.create')}}" class="dropdown-item">Agregar Empresa</a>
                            </div>
                          </div>
                    </div>

                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Acerca de</th>
                                    <th>Descripción</th>
                                    <th>Correo</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($businesses as $business)
                                <tr>
                                    <th scope="row">{{$business->id}}</th>
                                    <td>
                                        <a href="{{route('businesses.show',$business)}}">{{$business->name}}</a>
                                    </td>
                                    <td>{{$business->description}}</td>
                                    <td>{{$business->description_long}}</td>
                                    <td>{{$business->mail}}</td>
                                    <td>{{$business->phone}}</td>
                                    <td>{{$business->address}}</td>
                                    <td style="width: 50px;">

                                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('businesses.edit', $business)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <form style="display:inline" method="POST" action="{{ route('businesses.destroy', $business) }}">
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
                    {{$businesses->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('melody/js/data-table.js') }}"></script>
@endsection
